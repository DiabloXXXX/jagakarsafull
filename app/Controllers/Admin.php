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

        // Get user data
        $user = $this->userModel->find($id);
        
        // Debug: Log user data to check what's being retrieved
        log_message('debug', 'User data: ' . json_encode($user));
        
        // Ensure we have user data
        if (!$user) {
            session()->destroy();
            return redirect()->to('/login')->with('error', 'User tidak ditemukan');
        }
        
        $visitorModel = new \App\Models\VisitorModel();
        $beritaModel = new \App\Models\BeritaModel();
        $prestasiModel = new \App\Models\BerandaModel(); // Maps to 'prestasi' table
        $halamanModel = new \App\Models\HalamanModel();
        $tugasModel = new \App\Models\TugasModel();
        $pjlpModel = new \App\Models\PjlpModel();
        $chatbotModel = new \App\Models\ChatbotFaqModel();

        // Get visitor statistics
        $stats = $visitorModel->getStats();
        
        // Count all content
        $total_berita = $beritaModel->countAllResults(false);
        $total_prestasi = $prestasiModel->countAllResults(false);
        $total_tugas = $tugasModel->countAllResults(false);
        $total_pjlp = $pjlpModel->countAllResults(false);
        $total_faq = $chatbotModel->countAllResults(false);
        
        // Total halaman = berita + prestasi + tugas + pjlp + faq + static pages
        $total_halaman = $total_berita + $total_prestasi + $total_tugas + $total_pjlp + $total_faq + 10; // 10 static pages
        
        // Get recent berita for dashboard
        $recent_berita = $beritaModel
            ->orderBy('created_at', 'DESC')
            ->findAll(5);
        
        return view('admin/index', [
            'user' => $user,
            'stats' => $stats,
            'total_berita' => $total_berita,
            'total_prestasi' => $total_prestasi,
            'total_halaman' => $total_halaman,
            'recent_berita' => $recent_berita
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
        // Validate CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Invalid CSRF token');
        }

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
            'email'    => 'required|valid_email|max_length[100]',
            'notelp'   => 'permit_empty|numeric|min_length[10]|max_length[15]',
            'jabatan'  => 'permit_empty|max_length[100]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal: ' . implode(', ', $this->validator->getErrors()));
        }

        $data = [
            'nama'     => trim($this->request->getPost('nama')),
            'username' => trim($this->request->getPost('username')),
            'email'    => trim($this->request->getPost('email')),
            'notelp'   => trim($this->request->getPost('notelp') ?? ''),
            'jabatan'  => trim($this->request->getPost('jabatan') ?? '')
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
                'nama'     => $data['nama'],
                'email'    => $data['email']
            ]);
            
            return redirect()->to('/admin/pengaturan')
                ->with('success', 'Profil berhasil diperbarui');
        } catch (\Exception $e) {
            log_message('error', 'Failed to update user profile: ' . $e->getMessage());
            return redirect()->back()->withInput()
                ->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
        }
    }

    // Update Password
    public function password()
    {
        // Validate CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Invalid CSRF token');
        }

        $id = session()->get('id');
        if (!$id) return redirect()->to('/login');

        $user = $this->userModel->find($id);
        if (!$user) {
            session()->destroy();
            return redirect()->to('/login');
        }

        // Validasi input
        $rules = [
            'old_password'     => 'required',
            'new_password'     => 'required|min_length[8]',
            'confirm_password' => 'required|matches[new_password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Validasi gagal: ' . implode(', ', $this->validator->getErrors()));
        }

        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');

        // Verify old password
        if (!password_verify($oldPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai');
        }

        try {
            $this->userModel->update($id, [
                'password' => password_hash($newPassword, PASSWORD_DEFAULT)
            ]);

            return redirect()->to('/admin/pengaturan')
                ->with('success', 'Password berhasil diubah');
        } catch (\Exception $e) {
            log_message('error', 'Failed to update password: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Gagal mengubah password: ' . $e->getMessage());
        }
    }
}
