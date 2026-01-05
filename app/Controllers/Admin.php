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
            log_message('warning', 'User ID in session not found in database: ' . $id);
            session()->destroy();
            return redirect()->to('/login')->with('msg', 'Akun tidak ditemukan. Silakan login kembali.');
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
        if (!$user) {
            session()->destroy();
            return redirect()->to('/login');
        }

        // Validasi input
        $rules = [
            'nama'     => 'required|min_length[3]|max_length[100]',
            'username' => 'required|min_length[3]|max_length[50]|alpha_numeric',
            'notelp'   => 'permit_empty|numeric|min_length[10]|max_length[15]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama'     => trim($this->request->getPost('nama')),
            'username' => trim($this->request->getPost('username')),
            'email'    => $user['email'], // Email tidak diupdate untuk keamanan
            'notelp'   => trim($this->request->getPost('notelp'))
        ];

        // Validasi Password Opsional
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            // Validasi password strength
            if (strlen($password) < 8) {
                return redirect()->back()->withInput()
                    ->with('error', 'Password minimal 8 karakter');
            }
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        try {
            $this->userModel->update($id, $data);
            
            // Update session data
            session()->set([
                'username' => $data['username'],
                'nama'     => $data['nama']
            ]);
            
            return redirect()->to('/admin/pengaturan')
                ->with('success', 'Profil admin berhasil diperbarui');
        } catch (\Exception $e) {
            log_message('error', 'Failed to update user profile: ' . $e->getMessage());
            return redirect()->back()->withInput()
                ->with('error', 'Gagal memperbarui profil. Silakan coba lagi.');
        }
    }
}
