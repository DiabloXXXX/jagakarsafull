<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BerandaModel;

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
        $file = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($file && $file->isValid()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/prestasi', $namaGambar);
        }

        $slug = url_title($this->request->getPost('judul'), '-', true);

        $this->berandaModel->save([
            'judul'  => $this->request->getPost('judul'),
            'slug'   => $slug,
            'status' => $this->request->getPost('status'),
            'gambar' => $namaGambar
        ]);

        return redirect()->back()->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function update($id)
    {
        $data = [
            'judul'  => $this->request->getPost('judul'),
            'slug'   => url_title($this->request->getPost('judul'), '-', true),
            'status' => $this->request->getPost('status')
        ];

        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid()) {
            $nama = $file->getRandomName();
            $file->move('uploads/prestasi', $nama);
            $data['gambar'] = $nama;
        }

        $this->berandaModel->update($id, $data);

        return redirect()->back()->with('success', 'Prestasi diperbarui');
    }

    public function delete($id)
    {
        $this->berandaModel->delete($id);
        return redirect()->back()->with('success', 'Prestasi berhasil dihapus');
    }
}
