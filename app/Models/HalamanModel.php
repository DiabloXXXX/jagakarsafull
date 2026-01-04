<?php

namespace App\Models;

use CodeIgniter\Model;

class HalamanModel extends Model
{
    protected $table = 'halaman';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        // Beranda & Tentang
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'tentang_title',
        'tentang_text1',
        'tentang_text2',
        'luas_wilayah',
        'jumlah_rw',
        'jumlah_rt',
        'gambar_peta',
        'batas_utara',
        'batas_selatan',
        'batas_timur',
        'batas_barat',
        // Visi Misi
        'visi',
        'misi',
        'misi2',
        'misi3',
        'misi4',
        // Struktur
        'gambar_struktur',
        // Lembaga
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
        // Layanan
        'link',
        'notelp',
        'email',
        'alamat',
        // Banjir
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
