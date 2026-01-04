<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Berita extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $data['berita'] = $this->beritaModel
            ->where('status', 'publish')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        
        $data['pager'] = $this->beritaModel->pager;

        return view('berita', $data);
    }

    public function detail($slug)
    {
        $data['berita'] = $this->beritaModel
            ->where('slug', $slug)
            ->first();

        if (!$data['berita']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan');
        }

        // Get related news (excluding current)
        $data['berita_terkait'] = $this->beritaModel
            ->where('status', 'publish')
            ->where('slug !=', $slug)
            ->orderBy('created_at', 'DESC')
            ->findAll(5);

        return view('detail-berita', $data);
    }
}
