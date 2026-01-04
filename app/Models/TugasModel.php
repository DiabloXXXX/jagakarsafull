<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $table = 'tugas';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'short_description',
        'full_description',
        'sort_order',
        'status'
    ];
    protected $useTimestamps = true;

    /**
     * Get full description as array
     */
    public function getDescriptionArray($json)
    {
        if (empty($json)) return [];
        $decoded = json_decode($json, true);
        return is_array($decoded) ? $decoded : [];
    }
}
