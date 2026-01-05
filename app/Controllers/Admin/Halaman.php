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
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Token keamanan tidak valid');
        }
        
        // Validasi input
        $rules = [
            'visi' => 'required|min_length[10]',
            'misi' => 'required|min_length[10]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'visi'  => trim($this->request->getPost('visi')),
            'misi'  => trim($this->request->getPost('misi')),
            'misi2' => trim($this->request->getPost('misi2')),
            'misi3' => trim($this->request->getPost('misi3')),
            'misi4' => trim($this->request->getPost('misi4'))
        ];

        try {
            $this->halamanModel->update(1, $data);
            return redirect()->back()->with('success', 'Visi & Misi berhasil diperbarui');
        } catch (\Exception $e) {
            log_message('error', 'Failed to update visi misi: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui Visi & Misi');
        }
    }

    public function struktur()
    {
        return view('admin/struktur', [
            'h' => $this->halamanModel->first()
        ]);
    }
    public function strukturupdate()
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Token keamanan tidak valid');
        }
        
        $file = $this->request->getFile('gambar_struktur');
        $data = [];

        // Upload dan resize gambar jika ada
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validasi file
            if (!in_array($file->getMimeType(), ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'])) {
                return redirect()->back()->with('error', 'File harus berupa gambar (JPG, PNG, atau WebP)');
            }
            
            $result = upload_and_resize_image($file, 'uploads/halaman', 1920, 1080, 85);
            if (!$result['success']) {
                return redirect()->back()->with('error', $result['error']);
            }

            // Hapus gambar lama
            $old = $this->halamanModel->find(1);
            if (!empty($old['gambar_struktur']) && file_exists(FCPATH . 'uploads/halaman/' . $old['gambar_struktur'])) {
                @unlink(FCPATH . 'uploads/halaman/' . $old['gambar_struktur']);
            }

            $data['gambar_struktur'] = $result['filename'];
        }

        if (!empty($data)) {
            try {
                $this->halamanModel->update(1, $data);
                return redirect()->back()->with('success', 'Struktur berhasil diperbarui');
            } catch (\Exception $e) {
                log_message('error', 'Failed to update struktur: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal memperbarui struktur');
            }
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
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Token keamanan tidak valid');
        }
        
        // Validasi input
        $rules = [
            'fdkm' => 'permit_empty|numeric',
            'lmk' => 'permit_empty|numeric',
            'rw' => 'permit_empty|numeric',
            'rt' => 'permit_empty|numeric',
            'pkk' => 'permit_empty|numeric',
            'jumantik' => 'permit_empty|numeric',
            'dasawisma' => 'permit_empty|numeric',
            'posyandu_bal' => 'permit_empty|numeric',
            'posyandu_lan' => 'permit_empty|numeric',
            'total_organ' => 'permit_empty|numeric',
            'total_anggota' => 'permit_empty|numeric',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'fdkm'  => $this->request->getPost('fdkm') ?? 0,
            'lmk' => $this->request->getPost('lmk') ?? 0,
            'rw' => $this->request->getPost('rw') ?? 0,
            'rt' => $this->request->getPost('rt') ?? 0,
            'pkk' => $this->request->getPost('pkk') ?? 0,
            'jumantik' => $this->request->getPost('jumantik') ?? 0,
            'dasawisma' => $this->request->getPost('dasawisma') ?? 0,
            'posyandu_bal' => $this->request->getPost('posyandu_bal') ?? 0,
            'posyandu_lan' => $this->request->getPost('posyandu_lan') ?? 0,
            'total_organ' => $this->request->getPost('total_organ') ?? 0,
            'total_anggota' => $this->request->getPost('total_anggota') ?? 0,
        ];

        try {
            $this->halamanModel->update(1, $data);
            return redirect()->back()->with('success', 'Anggota Lembaga berhasil diperbarui');
        } catch (\Exception $e) {
            log_message('error', 'Failed to update lembaga: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data lembaga');
        }
    }

    public function layanan()
    {
        return view('admin/layanan', [
            'h' => $this->halamanModel->first()
        ]);
    }
    public function layananupdate()
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Token keamanan tidak valid');
        }
        
        // Validasi input
        $rules = [
            'link' => 'permit_empty|valid_url',
            'notelp' => 'permit_empty|numeric|min_length[10]|max_length[15]',
            'email' => 'permit_empty|valid_email',
            'alamat' => 'required|min_length[10]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'link'  => trim($this->request->getPost('link')),
            'notelp' => trim($this->request->getPost('notelp')),
            'email' => trim($this->request->getPost('email')),
            'alamat' => trim($this->request->getPost('alamat'))
        ];

        try {
            $this->halamanModel->update(1, $data);
            return redirect()->back()->with('success', 'Detail Layanan berhasil diperbarui');
        } catch (\Exception $e) {
            log_message('error', 'Failed to update layanan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui detail layanan');
        }
    }

    public function banjir()
    {
        return view('admin/banjir', [
            'h' => $this->halamanModel->first()
        ]);
    }
    public function banjirupdate()
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Token keamanan tidak valid');
        }
        
        $data = [
            'peringatan_banjir'  => trim($this->request->getPost('peringatan_banjir')),
            'tips1' => trim($this->request->getPost('tips1')),
            'tips2' => trim($this->request->getPost('tips2')),
            'tips3' => trim($this->request->getPost('tips3')),
            'tips4' => trim($this->request->getPost('tips4')),
            'area1' => trim($this->request->getPost('area1')),
            'area2' => trim($this->request->getPost('area2')),
            'area3' => trim($this->request->getPost('area3')),
            'desk1' => trim($this->request->getPost('desk1')),
            'desk2' => trim($this->request->getPost('desk2')),
            'desk3' => trim($this->request->getPost('desk3')),
        ];

        $file = $this->request->getFile('peta_banjir');

        // Upload dan resize gambar jika ada
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validasi file type
            if (!in_array($file->getMimeType(), ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'])) {
                return redirect()->back()->with('error', 'File harus berupa gambar (JPG, PNG, atau WebP)');
            }
            
            $result = upload_and_resize_image($file, 'uploads/halaman', 1920, 1080, 85);
            if (!$result['success']) {
                return redirect()->back()->with('error', $result['error']);
            }

            // Hapus gambar lama
            $old = $this->halamanModel->find(1);
            if (!empty($old['peta_banjir'])) {
                $oldPath = FCPATH . 'uploads/halaman/' . $old['peta_banjir'];
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $data['peta_banjir'] = $result['filename'];
        }

        try {
            if (!empty($data)) {
                $this->halamanModel->update(1, $data);
            }
            return redirect()->back()->with('success', 'Detail Area Rawan Banjir berhasil diperbarui');
        } catch (\Exception $e) {
            log_message('error', 'Failed to update banjir: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data banjir');
        }
    }

    public function beranda()
    {
        return view('admin/beranda', [
            'h' => $this->halamanModel->first()
        ]);
    }

    public function berandaupdate()
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Token keamanan tidak valid');
        }
        
        // Validasi input
        $rules = [
            'hero_title' => 'required|min_length[5]|max_length[255]',
            'tentang_title' => 'required|min_length[5]|max_length[255]',
            'tentang_text1' => 'required|min_length[10]',
            'luas_wilayah' => 'permit_empty|max_length[100]',
            'jumlah_rw' => 'permit_empty|numeric',
            'jumlah_rt' => 'permit_empty|numeric',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'hero_title'     => trim($this->request->getPost('hero_title')),
            'hero_subtitle'  => trim($this->request->getPost('hero_subtitle')),
            'tentang_title'  => trim($this->request->getPost('tentang_title')),
            'tentang_text1'  => trim($this->request->getPost('tentang_text1')),
            'tentang_text2'  => trim($this->request->getPost('tentang_text2')),
            'luas_wilayah'   => trim($this->request->getPost('luas_wilayah')),
            'jumlah_rw'      => $this->request->getPost('jumlah_rw') ?? 0,
            'jumlah_rt'      => $this->request->getPost('jumlah_rt') ?? 0,
            'batas_utara'    => trim($this->request->getPost('batas_utara')),
            'batas_selatan'  => trim($this->request->getPost('batas_selatan')),
            'batas_timur'    => trim($this->request->getPost('batas_timur')),
            'batas_barat'    => trim($this->request->getPost('batas_barat')),
        ];

        // Upload Hero Image
        $heroImage = $this->request->getFile('hero_image');
        if ($heroImage && $heroImage->isValid() && !$heroImage->hasMoved()) {
            // Validasi file type
            if (!in_array($heroImage->getMimeType(), ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'])) {
                return redirect()->back()->with('error', 'Hero image harus berupa gambar (JPG, PNG, atau WebP)');
            }
            
            $result = upload_and_resize_image($heroImage, 'uploads/halaman', 1920, 1080, 85);
            if (!$result['success']) {
                return redirect()->back()->with('error', $result['error']);
            }

            // Hapus gambar lama
            $old = $this->halamanModel->find(1);
            if (!empty($old['hero_image'])) {
                $oldPath = FCPATH . 'uploads/halaman/' . $old['hero_image'];
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $data['hero_image'] = $result['filename'];
        }

        // Upload Gambar Peta
        $petaImage = $this->request->getFile('gambar_peta');
        if ($petaImage && $petaImage->isValid() && !$petaImage->hasMoved()) {
            // Validasi file type
            if (!in_array($petaImage->getMimeType(), ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'])) {
                return redirect()->back()->with('error', 'Gambar peta harus berupa gambar (JPG, PNG, atau WebP)');
            }
            
            $result = upload_and_resize_image($petaImage, 'uploads/halaman', 1200, 900, 85);
            if (!$result['success']) {
                return redirect()->back()->with('error', $result['error']);
            }

            // Hapus gambar lama
            $old = $this->halamanModel->find(1);
            if (!empty($old['gambar_peta'])) {
                $oldPath = FCPATH . 'uploads/halaman/' . $old['gambar_peta'];
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $data['gambar_peta'] = $result['filename'];
        }

        try {
            $this->halamanModel->update(1, $data);
            return redirect()->back()->with('success', 'Konten Beranda & Tentang berhasil diperbarui');
        } catch (\Exception $e) {
            log_message('error', 'Failed to update beranda: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui konten beranda');
        }
    }
}
