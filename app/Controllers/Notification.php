<?php

namespace App\Controllers;

use App\Models\PushSubscriptionModel;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Push Notification Controller
 * 
 * @property \CodeIgniter\HTTP\Response $response
 */
class Notification extends BaseController
{
    protected $subscriptionModel;

    public function __construct()
    {
        $this->subscriptionModel = new PushSubscriptionModel();
    }

    /**
     * Get VAPID public key for client
     */
    public function getVapidKey(): ResponseInterface
    {
        $publicKey = env('VAPID_PUBLIC_KEY', '');
        
        return $this->response->setJSON([
            'success' => true,
            'publicKey' => $publicKey
        ]);
    }

    /**
     * Subscribe to push notifications
     */
    public function subscribe(): ResponseInterface
    {
        $json = $this->request->getJSON(true);
        
        if (empty($json['endpoint']) || empty($json['keys'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid subscription data'
            ])->setStatusCode(400);
        }

        try {
            $userAgent = $this->request->getUserAgent()->getAgentString();
            $ipAddress = $this->request->getIPAddress();
            
            $saved = $this->subscriptionModel->saveSubscription($json, $userAgent, $ipAddress);
            
            if ($saved) {
                log_message('info', 'Push subscription saved from IP: ' . $ipAddress);
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Berhasil berlangganan notifikasi'
                ]);
            }
            
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menyimpan subscription'
            ])->setStatusCode(500);
            
        } catch (\Exception $e) {
            log_message('error', 'Push subscription error: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan'
            ])->setStatusCode(500);
        }
    }

    /**
     * Unsubscribe from push notifications
     */
    public function unsubscribe(): ResponseInterface
    {
        $json = $this->request->getJSON(true);
        
        if (empty($json['endpoint'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid endpoint'
            ])->setStatusCode(400);
        }

        try {
            $removed = $this->subscriptionModel->deactivateSubscription($json['endpoint']);
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Berhasil berhenti berlangganan'
            ]);
            
        } catch (\Exception $e) {
            log_message('error', 'Push unsubscribe error: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan'
            ])->setStatusCode(500);
        }
    }

    /**
     * Send push notification to all subscribers (admin only)
     */
    public function sendToAll(): ResponseInterface
    {
        // Verify admin session
        if (!session()->get('logged_in')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Unauthorized'
            ])->setStatusCode(401);
        }

        $json = $this->request->getJSON(true);
        
        $title = $json['title'] ?? 'Kelurahan Jagakarsa';
        $body = $json['body'] ?? 'Ada informasi baru!';
        $url = $json['url'] ?? '/';
        $icon = $json['icon'] ?? '/images/icons/icon-192x192.png';
        $image = $json['image'] ?? null;

        $subscriptions = $this->subscriptionModel->getActiveSubscriptions();
        
        if (empty($subscriptions)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Tidak ada subscriber'
            ]);
        }

        $payload = json_encode([
            'title' => $title,
            'body' => $body,
            'url' => $url,
            'icon' => $icon,
            'image' => $image,
            'tag' => 'jagakarsa-' . time()
        ]);

        $sent = 0;
        $failed = 0;
        $invalidEndpoints = [];

        foreach ($subscriptions as $subscription) {
            $result = $this->sendPushNotification($subscription, $payload);
            if ($result['success']) {
                $sent++;
            } else {
                $failed++;
                if ($result['code'] === 410 || $result['code'] === 404) {
                    // Subscription expired or not found, mark as inactive
                    $invalidEndpoints[] = $subscription['endpoint'];
                }
            }
        }

        // Clean up invalid subscriptions
        foreach ($invalidEndpoints as $endpoint) {
            $this->subscriptionModel->deactivateSubscription($endpoint);
        }

        return $this->response->setJSON([
            'success' => true,
            'sent' => $sent,
            'failed' => $failed,
            'cleaned' => count($invalidEndpoints)
        ]);
    }

    /**
     * Send push notification for new content
     */
    public static function sendNewContentNotification(string $type, string $title, string $url, ?string $image = null): array
    {
        $subscriptionModel = new PushSubscriptionModel();
        $subscriptions = $subscriptionModel->getActiveSubscriptions();
        
        if (empty($subscriptions)) {
            return ['sent' => 0, 'total' => 0];
        }

        $typeLabels = [
            'berita' => '📰 Berita Baru',
            'prestasi' => '🏆 Prestasi Baru'
        ];

        $payload = json_encode([
            'title' => $typeLabels[$type] ?? 'Kelurahan Jagakarsa',
            'body' => $title,
            'url' => $url,
            'icon' => '/images/icons/icon-192x192.png',
            'image' => $image,
            'tag' => $type . '-' . time()
        ]);

        $sent = 0;
        $instance = new self();
        
        foreach ($subscriptions as $subscription) {
            $result = $instance->sendPushNotification($subscription, $payload);
            if ($result['success']) {
                $sent++;
            } elseif ($result['code'] === 410 || $result['code'] === 404) {
                $subscriptionModel->deactivateSubscription($subscription['endpoint']);
            }
        }

        log_message('info', "Push notifications sent: {$sent}/" . count($subscriptions) . " for {$type}: {$title}");

        return ['sent' => $sent, 'total' => count($subscriptions)];
    }

    /**
     * Send push notification via Web Push protocol
     */
    private function sendPushNotification(array $subscription, string $payload): array
    {
        $publicKey = env('VAPID_PUBLIC_KEY', '');
        $privateKey = env('VAPID_PRIVATE_KEY', '');
        $subject = env('VAPID_SUBJECT', 'mailto:admin@jagakarsa.jakarta.go.id');

        if (empty($publicKey) || empty($privateKey)) {
            return ['success' => false, 'code' => 500, 'message' => 'VAPID keys not configured'];
        }

        try {
            // Create JWT token for VAPID
            $endpoint = $subscription['endpoint'];
            $audience = parse_url($endpoint, PHP_URL_SCHEME) . '://' . parse_url($endpoint, PHP_URL_HOST);
            
            $header = json_encode(['typ' => 'JWT', 'alg' => 'ES256']);
            $jwtPayload = json_encode([
                'aud' => $audience,
                'exp' => time() + 86400,
                'sub' => $subject
            ]);

            // For proper Web Push, you'd need to implement ES256 signing
            // For now, we'll use a simple HTTP request approach
            // In production, use a library like minishlink/web-push
            
            $headers = [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload),
                'TTL: 86400'
            ];

            $ch = curl_init($endpoint);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            // 201 = success, 410 = subscription expired, 404 = not found
            if ($httpCode >= 200 && $httpCode < 300) {
                return ['success' => true, 'code' => $httpCode];
            }

            return ['success' => false, 'code' => $httpCode, 'message' => $response];

        } catch (\Exception $e) {
            return ['success' => false, 'code' => 500, 'message' => $e->getMessage()];
        }
    }
}
