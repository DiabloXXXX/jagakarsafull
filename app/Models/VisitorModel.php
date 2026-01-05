<?php

namespace App\Models;

use CodeIgniter\Model;

class VisitorModel extends Model
{
    protected $table = 'visitors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['ip_address', 'user_agent', 'access_date', 'created_at'];
    protected $useTimestamps = true;
    protected $updatedField  = null; // Disable updated_at requirement

    // Fungsi helper untuk statistik
    public function getStats()
    {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $weekAgo = date('Y-m-d', strtotime('-7 days'));
        $month = date('m');
        $year = date('Y');

        return [
            'total' => $this->countAll(),
            'today' => $this->where('access_date', $today)->countAllResults(false),
            'yesterday' => $this->where('access_date', $yesterday)->countAllResults(false),
            'weekly' => $this->where('access_date >=', $weekAgo)
                            ->where('access_date <=', $today)
                            ->countAllResults(false),
            'monthly' => $this->where('MONTH(access_date)', $month)
                           ->where('YEAR(access_date)', $year)
                           ->countAllResults(false),
            'yearly'  => $this->where('YEAR(access_date)', $year)->countAllResults(false)
        ];
    }
}
