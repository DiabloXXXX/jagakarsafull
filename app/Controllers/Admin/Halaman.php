<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HalamanModel;

class Halaman extends BaseController
{
    protected $halamanModel;

    public function __construct()
    {
        $this->halamanModel = new HalamanModel();
    }

    public function visi()
    {
        return view('admin/visi', [
            'h' => $this->halamanModel->first()
        ]);
    }
    public function visiupdate()
    {
        $data = [
            'visi'  => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
            'misi2' => $this->request->getPost('misi2'),
            'misi3' => $this->request->getPost('misi3'),
            'misi4' => $this->request->getPost('misi4')
        ];

        $this->halamanModel->update(1, $data);

        return redirect()->back()->with('success', 'Visi & Misi diperbarui');
    }

    public function struktur()
    {
        return view('admin/struktur', [
            'h' => $this->halamanModel->first()
        ]);
    }
    public function strukturupdate()
    {
        $file = $this->request->getFile('gambar_struktur');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            $newName = $file->getRandomName();
            $file->move('uploads/halaman', $newName);

            // ambil gambar lama
            $old = $this->halamanModel->find(1);

            // hapus gambar lama
            if (!empty($old['gambar_struktur']) && file_exists('uploads/halaman/' . $old['gambar_struktur'])) {
                unlink('uploads/halaman/' . $old['gambar_struktur']);
            }

            $data['gambar_struktur'] = $newName;
        }

        $this->halamanModel->update(1, $data);

        return redirect()->back()->with('success', 'Struktur berhasil diperbarui');
    }
}
