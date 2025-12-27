<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            // Verifikasi password (menggunakan password_verify)
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'id'       => $user['id'],
                    'username' => $user['username'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/dasbor/' . $user['id']);
            } else {
                $session->setFlashdata('msg', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    // Tambahkan di dalam class Auth

    public function register()
    {
        // Menampilkan halaman registrasi
        return view('auth/register');
    }

    public function save()
    {
        $model = new UserModel();

        // Validasi input
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $data = [
                'username' => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                // HASHING PASSWORD (Sangat Penting!)
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'jabatan' => 'admin',
                'notelp' => ''
            ];

            $model->save($data);
            return redirect()->to('/login')->with('msg', 'Registrasi Berhasil! Silakan Login.');
        } else {
            // Jika validasi gagal, kembali ke form dengan pesan error
            return view('auth/register', [
                'validation' => $this->validator
            ]);
        }
    }
}
