<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Berita Model
 * 
 * @property \CodeIgniter\Pager\Pager $pager
 */
class BeritaModel extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'status'
    ];
    protected $useTimestamps = true;
}
