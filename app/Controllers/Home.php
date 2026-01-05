<?php

namespace App\Controllers;

use App\Models\BerandaModel;
use App\Models\HalamanModel;
use App\Models\BeritaModel;
use App\Models\TugasModel;
use App\Models\PjlpModel;

class Home extends BaseController
{
    protected $berandaModel;
    protected $halamanModel;
    
    /** @var BeritaModel */
    protected $beritaModel;
    
    protected $tugasModel;
    protected $pjlpModel;

    public function __construct()
    {
        $this->berandaModel = new BerandaModel();
        $this->halamanModel = new HalamanModel();
        $this->beritaModel = new BeritaModel();
        $this->tugasModel = new TugasModel();
        $this->pjlpModel = new PjlpModel();
    }

    public function index(): string
    {
        $data['prestasi'] = $this->berandaModel
            ->where('status', 'publish')
            ->orderBy('created_at', 'DESC')
            ->findAll();
        
        $data['halaman'] = $this->halamanModel->first();
        
        // SEO Meta Data
        $data['meta_title'] = 'Beranda';
        $data['meta_description'] = 'Website Resmi Kelurahan Jagakarsa Jakarta Selatan. Informasi layanan publik, berita terkini, prestasi, dan kegiatan kelurahan. Melayani masyarakat dengan cepat, tepat, dan transparan.';
        $data['meta_keywords'] = 'Kelurahan Jagakarsa, Jakarta Selatan, Layanan Kelurahan, Berita Kelurahan, Prestasi Kelurahan, Administrasi Kependudukan, Pelayanan Publik';
        $data['canonical_url'] = base_url('/');
        $data['og_type'] = 'website';
        $data['og_image'] = base_url('images/features/hero-beranda.jpg');
        
        // Breadcrumb Schema
        $data['breadcrumb_json'] = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Beranda',
                    'item' => base_url('/')
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('index', $data);
    }

    public function tentang(): string
    {
        $data['prestasi'] = $this->berandaModel
            ->where('status', 'publish')
            ->orderBy('created_at', 'DESC')
            ->findAll();
        
        $data['halaman'] = $this->halamanModel->first();
        
        // SEO Meta Data
        $data['meta_title'] = 'Tentang Kelurahan Jagakarsa';
        $data['meta_description'] = 'Profil lengkap Kelurahan Jagakarsa Jakarta Selatan. Informasi sejarah, wilayah, batas wilayah, dan prestasi kelurahan. Komitmen melayani masyarakat dengan profesional.';
        $data['meta_keywords'] = 'Tentang Kelurahan Jagakarsa, Profil Kelurahan, Sejarah Jagakarsa, Wilayah Kelurahan, Batas Wilayah, Prestasi Kelurahan';
        $data['canonical_url'] = base_url('/tentang');
        $data['og_type'] = 'website';
        
        // Breadcrumb Schema
        $data['breadcrumb_json'] = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Beranda',
                    'item' => base_url('/')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Tentang',
                    'item' => base_url('/tentang')
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('tentang', $data);
    }

    public function visi(): string
    {
        $data['halaman'] = $this->halamanModel->first();
        
        // SEO Meta Data
        $data['meta_title'] = 'Visi & Misi Kelurahan Jagakarsa';
        $data['meta_description'] = 'Visi dan Misi Kelurahan Jagakarsa Jakarta Selatan. Komitmen mewujudkan pelayanan publik yang berkualitas, transparan, dan berorientasi pada kepuasan masyarakat.';
        $data['meta_keywords'] = 'Visi Kelurahan Jagakarsa, Misi Kelurahan, Tujuan Kelurahan, Program Kelurahan, Pelayanan Publik';
        $data['canonical_url'] = base_url('/visi');
        $data['og_type'] = 'website';
        
        // Breadcrumb Schema
        $data['breadcrumb_json'] = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Beranda',
                    'item' => base_url('/')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Visi & Misi',
                    'item' => base_url('/visi')
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        
        return view('visi', $data);
    }

    public function struktur(): string
    {
        $data['halaman'] = $this->halamanModel->first();
        
        // SEO Meta Data
        $data['meta_title'] = 'Struktur Organisasi Kelurahan Jagakarsa';
        $data['meta_description'] = 'Struktur Organisasi Kelurahan Jagakarsa Jakarta Selatan. Informasi lengkap tentang susunan organisasi, jabatan, dan tupoksi masing-masing bagian dalam pelayanan kepada masyarakat.';
        $data['meta_keywords'] = 'Struktur Organisasi Kelurahan, Susunan Organisasi, Jabatan Kelurahan, Lurah Jagakarsa, Sekretaris Kelurahan';
        $data['canonical_url'] = base_url('/struktur');
        $data['og_type'] = 'website';
        
        // Breadcrumb Schema
        $data['breadcrumb_json'] = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Beranda',
                    'item' => base_url('/')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Struktur Organisasi',
                    'item' => base_url('/struktur')
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        
        return view('struktur', $data);
    }

    public function tugas(): string
    {
        $tugasData = $this->tugasModel
            ->where('status', 'publish')
            ->orderBy('sort_order', 'ASC')
            ->findAll();
        
        // Transform data for view
        $tasks = [];
        foreach ($tugasData as $t) {
            $tasks[] = [
                'id' => $t['id'],
                'title' => $t['title'],
                'shortDescription' => $t['short_description'] ?? '',
                'fullDescription' => json_decode($t['full_description'] ?? '[]', true) ?: []
            ];
        }
        
        // SEO Meta Data
        $data['meta_title'] = 'Tugas & Fungsi Kelurahan Jagakarsa';
        $data['meta_description'] = 'Tugas pokok dan fungsi Kelurahan Jagakarsa Jakarta Selatan. Penyelenggaraan pemerintahan, pembangunan, pembinaan kemasyarakatan, pemberdayaan masyarakat, dan pelayanan administrasi.';
        $data['meta_keywords'] = 'Tugas Kelurahan, Fungsi Kelurahan, Tupoksi Kelurahan, Pelayanan Administrasi, Pemberdayaan Masyarakat';
        $data['canonical_url'] = base_url('/tugas');
        $data['og_type'] = 'website';
        
        // Breadcrumb Schema
        $data['breadcrumb_json'] = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Beranda',
                    'item' => base_url('/')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Tugas & Fungsi',
                    'item' => base_url('/tugas')
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        
        $data['tasks'] = $tasks;
        return view('tugas', $data);
    }

    public function pjlp(): string
    {
        $pjlpData = $this->pjlpModel
            ->where('status', 'publish')
            ->orderBy('sort_order', 'ASC')
            ->findAll();
        
        // Transform data for view
        $pjlpCategories = [];
        foreach ($pjlpData as $p) {
            $pjlpCategories[] = [
                'id' => $p['id'],
                'title' => $p['title'],
                'description' => $p['description'] ?? '',
                'count' => $p['personil_count'],
                'countLabel' => 'Jumlah Personil',
                'mainTasks' => json_decode($p['main_tasks'] ?? '[]', true) ?: []
            ];
        }
        
        return view('pjlp', ['pjlpCategories' => $pjlpCategories]);
    }

    public function lembaga(): string
    {
        return view('lembaga');
    }

    public function layanan(): string
    {
        return view('layanan');
    }

    public function berita(): string
    {
        $data = [
            'berita' => $this->beritaModel->where('status', 'publish')->orderBy('created_at', 'DESC')->paginate(9),
            'pager' => $this->beritaModel->pager
        ];
        return view('berita', $data);
    }

    public function detail_berita($slug = null)
    {
        $berita = $this->beritaModel->where('slug', $slug)->first();

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('detail-berita', ['berita' => $berita]);
    }

    public function detail_prestasi($slug = null)
    {
        $prestasi = $this->berandaModel->where('slug', $slug)->first();

        if (!$prestasi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Get related prestasi (excluding current)
        $data['prestasi_terkait'] = $this->berandaModel
            ->where('status', 'publish')
            ->where('slug !=', $slug)
            ->orderBy('created_at', 'DESC')
            ->findAll(3);

        // SEO Meta Data
        $data['prestasi'] = $prestasi;
        $data['meta_title'] = esc($prestasi['judul']) . ' - Prestasi Kelurahan Jagakarsa';
        $data['meta_description'] = 'Prestasi Kelurahan Jagakarsa: ' . esc($prestasi['judul']) . '. Pencapaian dan penghargaan yang diraih Kelurahan Jagakarsa Jakarta Selatan.';
        $data['meta_keywords'] = 'Prestasi Kelurahan Jagakarsa, ' . esc($prestasi['judul']) . ', Penghargaan Kelurahan, Jakarta Selatan';
        $data['canonical_url'] = base_url('/prestasi/' . $slug);
        $data['og_type'] = 'article';
        $data['og_image'] = base_url('uploads/prestasi/' . $prestasi['gambar']);
        
        // Breadcrumb Schema
        $data['breadcrumb_json'] = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Beranda',
                    'item' => base_url('/')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Prestasi',
                    'item' => base_url('/')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => esc($prestasi['judul']),
                    'item' => base_url('/prestasi/' . $slug)
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('detail-prestasi', $data);
    }

    public function peta(): string
    {
        return view('peta');
    }

    public function banjir(): string
    {
        return view('banjir');
    }

    public function chatbot(): string
    {
        return view('chatbot');
    }
}
