<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Dashboard
    public function index()
    {
        $id = session()->get('id');
        if (!$id) return redirect()->to('/login'); // Double check

        // Data user tidak harus dikirim ke view index jika view tidak butuh, 
        // tapi bagus untuk menampilkan "Halo, [Nama]"
        $user = $this->userModel->find($id); 
        
        $visitorModel = new \App\Models\VisitorModel();
        $beritaModel = new \App\Models\BeritaModel();
        $prestasiModel = new \App\Models\BerandaModel(); // Maps to 'prestasi' table

        $stats = $visitorModel->getStats();
        
        return view('admin/index', [
            'user' => $user,
            'stats' => $stats,
            'total_berita' => $beritaModel->countAllResults(),
            'total_prestasi' => $prestasiModel->countAllResults()
        ]);
    }

    // Page Management Listing
    public function halaman(): string
    {
        return view('admin/halaman');
    }

    // Berita Management Listing
    public function berita(): string
    {
        return view('admin/berita');
    }

    // Settings Page
    public function pengaturan()
    {
        $id = session()->get('id');
        if (!$id) return redirect()->to('/login');

        $user = $this->userModel->find($id);

        if (!$user) {
            // Jika user di session tidak ada di DB (misal dihapus saat sesi aktif)
            session()->destroy();
            return redirect()->to('/login');
        }

        $visitorModel = new \App\Models\VisitorModel();
        $stats = $visitorModel->getStats();

        return view('admin/pengaturan', [
            'user' => $user,
            'stats' => $stats
        ]);
    }

    // Update Profile
    public function update()
    {
        $id = session()->get('id');
        if (!$id) return redirect()->to('/login');

        $user = $this->userModel->find($id);
        if (!$user) return redirect()->to('/login');

        $data = [
            'nama'     => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            // Email tidak diupdate untuk keamanan, atau butuh verifikasi khusus
            'email'    => $user['email'], 
            'notelp'   => $this->request->getPost('notelp')
        ];

        // Validasi Password Opsional
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            // Jika password diisi, hash dan update
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/admin/pengaturan')
            ->with('success', 'Profil admin berhasil diperbarui');
    }
}
