<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityLogModel extends Model
{
    protected $table = 'activity_log';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'username',
        'action',
        'module',
        'description',
        'ip_address',
        'user_agent'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = '';

    /**
     * Log an activity
     */
    public static function log($action, $module, $description = '')
    {
        $model = new self();
        $session = session();
        
        $model->insert([
            'user_id' => $session->get('user_id') ?? 0,
            'username' => $session->get('username') ?? 'System',
            'action' => $action,
            'module' => $module,
            'description' => $description,
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? ''
        ]);
    }

    /**
     * Get recent activities
     */
    public function getRecent($limit = 10)
    {
        return $this->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->find();
    }
}
