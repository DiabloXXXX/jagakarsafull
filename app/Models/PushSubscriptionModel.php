<?php

namespace App\Models;

use CodeIgniter\Model;

class PushSubscriptionModel extends Model
{
    protected $table            = 'push_subscriptions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'endpoint',
        'p256dh_key',
        'auth_key',
        'user_agent',
        'ip_address',
        'is_active',
        'created_at',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Save or update a subscription
     */
    public function saveSubscription(array $subscription, string $userAgent, string $ipAddress): bool
    {
        $existing = $this->where('endpoint', $subscription['endpoint'])->first();
        
        $data = [
            'endpoint'   => $subscription['endpoint'],
            'p256dh_key' => $subscription['keys']['p256dh'] ?? '',
            'auth_key'   => $subscription['keys']['auth'] ?? '',
            'user_agent' => $userAgent,
            'ip_address' => $ipAddress,
            'is_active'  => 1
        ];
        
        if ($existing) {
            return $this->update($existing['id'], $data);
        }
        
        return $this->insert($data) !== false;
    }

    /**
     * Remove a subscription by endpoint
     */
    public function removeSubscription(string $endpoint): bool
    {
        return $this->where('endpoint', $endpoint)->delete();
    }

    /**
     * Get all active subscriptions
     */
    public function getActiveSubscriptions(): array
    {
        return $this->where('is_active', 1)->findAll();
    }

    /**
     * Deactivate a subscription (instead of delete)
     */
    public function deactivateSubscription(string $endpoint): bool
    {
        return $this->where('endpoint', $endpoint)->set(['is_active' => 0])->update();
    }

    /**
     * Get subscription count
     */
    public function getSubscriptionCount(): int
    {
        return $this->where('is_active', 1)->countAllResults();
    }
}
