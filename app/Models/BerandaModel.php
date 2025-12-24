<?php

namespace App\Models;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    protected $table = 'prestasi';
    protected $allowedFields = [
        'judul',
        'slug',
        'gambar',
        'status'
    ];
    protected $useTimestamps = true;
}
