<?php

namespace App\Models;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    protected $table = 'prestasi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'status'
    ];
    protected $useTimestamps = true;
}
