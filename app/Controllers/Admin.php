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
    public function index(): string
    {
        $id = session()->get('id');
        $user = $this->userModel->find($id);
        return view('admin/index');
    }
    public function halaman(): string
    {
        return view('admin/halaman');
    }
    public function berita(): string
    {
        return view('admin/berita');
    }
    public function pengaturan($id): string
    {
        $user = $this->userModel->find($id);

        return view('admin/pengaturan', [
            'user' => $user
        ]);
    }
    public function update($id)
    {
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'notelp'    => $this->request->getPost('notelp')
        ];

        // Password opsional
        // if ($this->request->getPost('password')) {
        //     $data['password'] = password_hash(
        //         $this->request->getPost('password'),
        //         PASSWORD_DEFAULT
        //     );
        // }

        $this->userModel->update($id, $data);

        return redirect()->to('/pengaturan/' . session()->get('id'))
            ->with('success', 'Data admin berhasil diperbarui');
    }
}
