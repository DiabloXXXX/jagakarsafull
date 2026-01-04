<?php

namespace App\Models;

use CodeIgniter\Model;

class PjlpModel extends Model
{
    protected $table = 'pjlp';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'description',
        'personil_count',
        'main_tasks',
        'sort_order',
        'status'
    ];
    protected $useTimestamps = true;

    /**
     * Get main tasks as array
     */
    public function getTasksArray($json)
    {
        if (empty($json)) return [];
        $decoded = json_decode($json, true);
        return is_array($decoded) ? $decoded : [];
    }
}
