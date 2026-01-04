<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\ActivityLogModel;
use App\Controllers\Notification;

class Berita extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $berita = $this->beritaModel->orderBy('created_at', 'DESC')->findAll();
        
        return view('admin/berita', [
            'berita' => $berita,
            'total_berita' => count($berita),
            'published' => count(array_filter($berita, fn($b) => ($b['status'] ?? 'publish') === 'publish')),
            'draft' => count(array_filter($berita, fn($b) => ($b['status'] ?? '') === 'draft')),
            'total_views' => array_sum(array_column($berita, 'views'))
        ]);
    }

    public function create()
    {
        return view('admin/berita_form', [
            'title' => 'Tambah Berita Baru',
            'berita' => null
        ]);
    }

    public function edit($id)
    {
        $berita = $this->beritaModel->find($id);
        
        if (!$berita) {
            return redirect()->to('/admin/berita')->with('error', 'Berita tidak ditemukan');
        }
        
        return view('admin/berita_form', [
            'title' => 'Edit Berita',
            'berita' => $berita
        ]);
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'judul' => 'required|min_length[3]|max_length[255]',
            'konten' => 'required|min_length[10]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $file = $this->request->getFile('gambar');
        $namaGambar = null;

        // Upload dan resize gambar jika ada
        if ($file && $file->isValid()) {
            $result = upload_and_resize_image($file, 'uploads/berita', 1200, 800, 85);
            if (!$result['success']) {
                return redirect()->back()->withInput()->with('error', $result['error']);
            }
            $namaGambar = $result['filename'];
        }

        $slug = url_title($this->request->getPost('judul'), '-', true);

        try {
            $this->beritaModel->save([
                'judul'  => $this->request->getPost('judul'),
                'slug'   => $slug,
                'konten' => $this->request->getPost('konten'),
                'status' => $this->request->getPost('status') ?? 'publish',
                'gambar' => $namaGambar
            ]);
            
            ActivityLogModel::log('create', 'berita', 'Menambahkan berita: ' . $this->request->getPost('judul'));
            
            // Send push notification if published
            $status = $this->request->getPost('status') ?? 'publish';
            if ($status === 'publish') {
                $imageUrl = $namaGambar ? base_url('uploads/berita/' . $namaGambar) : null;
                Notification::sendNewContentNotification(
                    'berita',
                    $this->request->getPost('judul'),
                    base_url('berita/' . $slug),
                    $imageUrl
                );
            }
            
            return redirect()->to('/admin/berita')->with('success', 'Berita berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan berita: ' . $e->getMessage());
        }
    }


    public function update($id)
    {
        // Validasi input
        $rules = [
            'judul' => 'required|min_length[3]|max_length[255]',
            'konten' => 'required|min_length[10]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'judul'  => $this->request->getPost('judul'),
            'slug'   => url_title($this->request->getPost('judul'), '-', true),
            'konten' => $this->request->getPost('konten'),
            'status' => $this->request->getPost('status') ?? 'publish'
        ];

        $file = $this->request->getFile('gambar');

        // Upload dan resize gambar jika ada
        if ($file && $file->isValid()) {
            $result = upload_and_resize_image($file, 'uploads/berita', 1200, 800, 85);
            if (!$result['success']) {
                return redirect()->back()->withInput()->with('error', $result['error']);
            }
            $data['gambar'] = $result['filename'];
        }

        try {
            $this->beritaModel->update($id, $data);
            ActivityLogModel::log('update', 'berita', 'Mengupdate berita: ' . $data['judul']);
            return redirect()->back()->with('success', 'Berita berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan berita: ' . $e->getMessage());
        }
    }


    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);
        if (!$berita) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan');
        }
        $this->beritaModel->delete($id);
        ActivityLogModel::log('delete', 'berita', 'Menghapus berita: ' . ($berita['judul'] ?? 'ID ' . $id));
        return redirect()->back()->with('success', 'Berita berhasil dihapus');
    }
}
