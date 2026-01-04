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

        return redirect()->back()->with('success', 'Visi & Misi Diperbarui');
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
        $data = [];

        // Upload dan resize gambar jika ada
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $result = upload_and_resize_image($file, 'uploads/halaman', 1920, 1080, 85);
            if (!$result['success']) {
                return redirect()->back()->with('error', $result['error']);
            }

            // hapus gambar lama
            $old = $this->halamanModel->find(1);
            if (!empty($old['gambar_struktur']) && file_exists(FCPATH . 'uploads/halaman/' . $old['gambar_struktur'])) {
                unlink(FCPATH . 'uploads/halaman/' . $old['gambar_struktur']);
            }

            $data['gambar_struktur'] = $result['filename'];
        }

        if (!empty($data)) {
            $this->halamanModel->update(1, $data);
            return redirect()->back()->with('success', 'Struktur berhasil Diperbarui');
        }

        return redirect()->back()->with('info', 'Tidak ada perubahan yang disimpan');
    }

    public function lembaga()
    {
        return view('admin/lembaga', [
            'h' => $this->halamanModel->first()
        ]);
    }
    public function lembagaupdate()
    {
        $data = [
            'fdkm'  => $this->request->getPost('fdkm'),
            'lmk' => $this->request->getPost('lmk'),
            'rw' => $this->request->getPost('rw'),
            'rt' => $this->request->getPost('rt'),
            'pkk' => $this->request->getPost('pkk'),
            'jumantik' => $this->request->getPost('jumantik'),
            'dasawisma' => $this->request->getPost('dasawisma'),
            'posyandu_bal' => $this->request->getPost('posyandu_bal'),
            'posyandu_lan' => $this->request->getPost('posyandu_lan'),
            'total_organ' => $this->request->getPost('total_organ'),
            'total_anggota' => $this->request->getPost('total_anggota'),
        ];

        $this->halamanModel->update(1, $data);

        return redirect()->back()->with('success', 'Anggota Lembaga Diperbarui');
    }

    public function layanan()
    {
        return view('admin/layanan', [
            'h' => $this->halamanModel->first()
        ]);
    }
    public function layananupdate()
    {
        $data = [
            'link'  => $this->request->getPost('link'),
            'notelp' => $this->request->getPost('notelp'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat')
        ];

        $this->halamanModel->update(1, $data);

        return redirect()->back()->with('success', 'Detail Layanan Diperbarui');
    }

    public function banjir()
    {
        return view('admin/banjir', [
            'h' => $this->halamanModel->first()
        ]);
    }
    public function banjirupdate()
    {
        $data = [
            'peringatan_banjir'  => $this->request->getPost('peringatan_banjir'),
            'tips1' => $this->request->getPost('tips1'),
            'tips2' => $this->request->getPost('tips2'),
            'tips3' => $this->request->getPost('tips3'),
            'tips4' => $this->request->getPost('tips4'),
            'area1' => $this->request->getPost('area1'),
            'area2' => $this->request->getPost('area2'),
            'area3' => $this->request->getPost('area3'),
            'desk1' => $this->request->getPost('desk1'),
            'desk2' => $this->request->getPost('desk2'),
            'desk3' => $this->request->getPost('desk3'),
        ];

        $file = $this->request->getFile('peta_banjir');

        // Upload dan resize gambar jika ada
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $result = upload_and_resize_image($file, 'uploads/halaman', 1920, 1080, 85);
            if (!$result['success']) {
                return redirect()->back()->with('error', $result['error']);
            }

            // hapus gambar lama
            $old = $this->halamanModel->find(1);
            if (!empty($old['peta_banjir'])) {
                $oldPath = FCPATH . 'uploads/halaman/' . $old['peta_banjir'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $data['peta_banjir'] = $result['filename'];
        }

        if (!empty($data)) {
            $this->halamanModel->update(1, $data);
        }

        return redirect()->back()->with('success', 'Detail Area Rawan Banjir Diperbarui');
    }

    public function beranda()
    {
        return view('admin/beranda', [
            'h' => $this->halamanModel->first()
        ]);
    }

    public function berandaupdate()
    {
        $data = [
            'hero_title'     => $this->request->getPost('hero_title'),
            'hero_subtitle'  => $this->request->getPost('hero_subtitle'),
            'tentang_title'  => $this->request->getPost('tentang_title'),
            'tentang_text1'  => $this->request->getPost('tentang_text1'),
            'tentang_text2'  => $this->request->getPost('tentang_text2'),
            'luas_wilayah'   => $this->request->getPost('luas_wilayah'),
            'jumlah_rw'      => $this->request->getPost('jumlah_rw'),
            'jumlah_rt'      => $this->request->getPost('jumlah_rt'),
            'batas_utara'    => $this->request->getPost('batas_utara'),
            'batas_selatan'  => $this->request->getPost('batas_selatan'),
            'batas_timur'    => $this->request->getPost('batas_timur'),
            'batas_barat'    => $this->request->getPost('batas_barat'),
        ];

        // Upload Hero Image
        $heroImage = $this->request->getFile('hero_image');
        if ($heroImage && $heroImage->isValid() && !$heroImage->hasMoved()) {
            $result = upload_and_resize_image($heroImage, 'uploads/halaman', 1920, 1080, 85);
            if (!$result['success']) {
                return redirect()->back()->with('error', $result['error']);
            }

            // hapus gambar lama
            $old = $this->halamanModel->find(1);
            if (!empty($old['hero_image'])) {
                $oldPath = FCPATH . 'uploads/halaman/' . $old['hero_image'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $data['hero_image'] = $result['filename'];
        }

        // Upload Gambar Peta
        $petaImage = $this->request->getFile('gambar_peta');
        if ($petaImage && $petaImage->isValid() && !$petaImage->hasMoved()) {
            $result = upload_and_resize_image($petaImage, 'uploads/halaman', 1200, 900, 85);
            if (!$result['success']) {
                return redirect()->back()->with('error', $result['error']);
            }

            // hapus gambar lama
            $old = $this->halamanModel->find(1);
            if (!empty($old['gambar_peta'])) {
                $oldPath = FCPATH . 'uploads/halaman/' . $old['gambar_peta'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $data['gambar_peta'] = $result['filename'];
        }

        $this->halamanModel->update(1, $data);

        return redirect()->back()->with('success', 'Konten Beranda & Tentang berhasil diperbarui');
    }
}
