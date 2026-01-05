<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BerandaModel;
use App\Models\ActivityLogModel;
use App\Controllers\Notification;

class Beranda extends BaseController
{
    protected $berandaModel;

    public function __construct()
    {
        $this->berandaModel = new BerandaModel();
    }

    public function index()
    {
        return view('admin/prestasi', [
            'prestasi' => $this->berandaModel->orderBy('created_at', 'DESC')->findAll()
        ]);
    }

    public function store()
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Token keamanan tidak valid');
        }
        
        // Validasi input
        $rules = [
            'judul' => 'required|min_length[3]|max_length[255]',
            'status' => 'permit_empty|in_list[publish,draft]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $file = $this->request->getFile('gambar');
        $namaGambar = null;

        // Upload dan resize gambar jika ada
        if ($file && $file->isValid()) {
            $result = upload_and_resize_image($file, 'uploads/prestasi', 800, 600, 85);
            if (!$result['success']) {
                return redirect()->back()->withInput()->with('error', $result['error']);
            }
            $namaGambar = $result['filename'];
        }

        $slug = url_title($this->request->getPost('judul'), '-', true);

        try {
            $this->berandaModel->save([
                'judul'     => $this->request->getPost('judul'),
                'slug'      => $slug,
                'deskripsi' => $this->request->getPost('deskripsi'),
                'status'    => $this->request->getPost('status') ?? 'publish',
                'gambar'    => $namaGambar
            ]);

            ActivityLogModel::log('create', 'prestasi', 'Menambahkan prestasi: ' . $this->request->getPost('judul'));

            // Send push notification if published
            $status = $this->request->getPost('status') ?? 'publish';
            if ($status === 'publish') {
                $imageUrl = $namaGambar ? base_url('uploads/prestasi/' . $namaGambar) : null;
                Notification::sendNewContentNotification(
                    'prestasi',
                    $this->request->getPost('judul'),
                    base_url('/'),
                    $imageUrl
                );
            }

            return redirect()->back()->with('success', 'Prestasi berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan prestasi: ' . $e->getMessage());
        }
    }

    public function update($id)
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Token keamanan tidak valid');
        }
        
        // Cek apakah prestasi exists
        $prestasi = $this->berandaModel->find($id);
        if (!$prestasi) {
            return redirect()->back()->with('error', 'Prestasi tidak ditemukan');
        }
        
        // Validasi input
        $rules = [
            'judul' => 'required|min_length[3]|max_length[255]',
            'status' => 'permit_empty|in_list[publish,draft]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'judul'     => $this->request->getPost('judul'),
            'slug'      => url_title($this->request->getPost('judul'), '-', true),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status'    => $this->request->getPost('status') ?? 'publish'
        ];

        $file = $this->request->getFile('gambar');

        // Upload dan resize gambar jika ada
        if ($file && $file->isValid()) {
            $result = upload_and_resize_image($file, 'uploads/prestasi', 800, 600, 85);
            if (!$result['success']) {
                return redirect()->back()->withInput()->with('error', $result['error']);
            }
            $data['gambar'] = $result['filename'];
        }

        try {
            $this->berandaModel->update($id, $data);
            ActivityLogModel::log('update', 'prestasi', 'Mengupdate prestasi: ' . $data['judul']);
            return redirect()->back()->with('success', 'Prestasi berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan prestasi: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Token keamanan tidak valid');
        }
        
        $prestasi = $this->berandaModel->find($id);
        if (!$prestasi) {
            return redirect()->back()->with('error', 'Prestasi tidak ditemukan');
        }
        
        try {
            // Hapus gambar jika ada
            if (!empty($prestasi['gambar'])) {
                $filePath = FCPATH . 'uploads/prestasi/' . $prestasi['gambar'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            
            $this->berandaModel->delete($id);
            ActivityLogModel::log('delete', 'prestasi', 'Menghapus prestasi: ' . ($prestasi['judul'] ?? 'ID ' . $id));
            
            return redirect()->back()->with('success', 'Prestasi berhasil dihapus');
        } catch (\Exception $e) {
            log_message('error', 'Failed to delete prestasi: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus prestasi');
        }
    }
}
