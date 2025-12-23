<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
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
        return view('admin/berita', [
            'berita' => $this->beritaModel->orderBy('created_at', 'DESC')->findAll()
        ]);
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($file && $file->isValid()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/berita', $namaGambar);
        }

        $slug = url_title($this->request->getPost('judul'), '-', true);

        $this->beritaModel->save([
            'judul'  => $this->request->getPost('judul'),
            'slug'   => $slug,
            'konten' => $this->request->getPost('konten'),
            'status' => $this->request->getPost('status'),
            'gambar' => $namaGambar
        ]);

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan');
    }


    public function update($id)
    {
        $data = [
            'judul'  => $this->request->getPost('judul'),
            'slug'   => url_title($this->request->getPost('judul'), '-', true),
            'konten' => $this->request->getPost('konten'),
            'status' => $this->request->getPost('status')
        ];

        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid()) {
            $nama = $file->getRandomName();
            $file->move('uploads/berita', $nama);
            $data['gambar'] = $nama;
        }

        $this->beritaModel->update($id, $data);

        return redirect()->back()->with('success', 'Berita diperbarui');
    }


    public function delete($id)
    {
        $this->beritaModel->delete($id);
        return redirect()->back()->with('success', 'Berita berhasil dihapus');
    }
}
