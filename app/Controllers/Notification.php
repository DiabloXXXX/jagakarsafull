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
     * Admin view for sending notifications
     */
    public function adminIndex(): string
    {
        return view('admin/notification', [
            'subscriber_count' => $this->subscriptionModel->getSubscriptionCount()
        ]);
    }

    /**
     * Send push notification to all subscribers (admin manual)
     */
    public function sendToAll(): ResponseInterface
    {
        // Verify admin session
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Unauthorized'
            ])->setStatusCode(401);
        }

        $title = $this->request->getPost('title') ?? 'Kelurahan Jagakarsa';
        $body = $this->request->getPost('body') ?? 'Ada informasi baru!';
        $url = $this->request->getPost('url') ?? base_url();
        $icon = base_url('/images/icons/icon-192x192.png');

        $subscriptions = $this->subscriptionModel->getActiveSubscriptions();
        
        if (empty($subscriptions)) {
            return redirect()->back()->with('error', 'Tidak ada subscriber aktif');
        }

        $payload = json_encode([
            'title' => $title,
            'body' => $body,
            'url' => $url,
            'icon' => $icon,
            'tag' => 'jagakarsa-' . time()
        ]);

        $sent = 0;
        $failed = 0;
        
        foreach ($subscriptions as $subscription) {
            $result = $this->sendPushNotification($subscription, $payload);
            if ($result['success']) {
                $sent++;
            } else {
                $failed++;
                if ($result['code'] === 410 || $result['code'] === 404) {
                    $this->subscriptionModel->deactivateSubscription($subscription['endpoint']);
                }
            }
        }

        return redirect()->back()->with('success', "Berhasil mengirim {$sent} notifikasi. (Gagal: {$failed})");
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
            log_message('error', 'Push notification failed: VAPID keys not configured');
            return ['success' => false, 'code' => 500, 'message' => 'VAPID keys not configured'];
        }

        try {
            $auth = [
                'VAPID' => [
                    'subject' => $subject,
                    'publicKey' => $publicKey,
                    'privateKey' => $privateKey,
                ],
            ];

            $webPush = new \Minishlink\WebPush\WebPush($auth);
            
            $sub = \Minishlink\WebPush\Subscription::create([
                'endpoint' => $subscription['endpoint'],
                'publicKey' => $subscription['p256dh_key'],
                'authToken' => $subscription['auth_key'],
            ]);

            $report = $webPush->sendOneNotification($sub, $payload);
            
            if ($report->isSuccess()) {
                return ['success' => true, 'code' => 200];
            } else {
                return [
                    'success' => false, 
                    'code' => $report->getResponse()->getStatusCode(), 
                    'message' => $report->getReason()
                ];
            }

        } catch (\Exception $e) {
            log_message('error', 'Push notification error: ' . $e->getMessage());
            return ['success' => false, 'code' => 500, 'message' => $e->getMessage()];
        }
    }
}
