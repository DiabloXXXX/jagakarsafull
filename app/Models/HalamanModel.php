<?php

namespace App\Models;

use CodeIgniter\Model;

class HalamanModel extends Model
{
    protected $table = 'halaman';
    protected $allowedFields = [
        'visi',
        'misi',
        'misi2',
        'misi3',
        'misi4',
        'gambar_struktur',
        'fdkm',
        'lmk',
        'rw',
        'rt',
        'pkk',
        'jumantik',
        'dasawisma',
        'posyandu_bal',
        'posyandu_lan',
        'total_organ',
        'total_anggota',
        'link',
        'notelp',
        'email',
        'alamat',
        'peta_banjir',
        'peringatan_banjir',
        'tips1',
        'tips2',
        'tips3',
        'tips4',
        'area1',
        'area2',
        'area3',
        'desk1',
        'desk2',
        'desk3',
        'status'
    ];
    protected $useTimestamps = true;
}
