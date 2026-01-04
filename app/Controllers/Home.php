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

        return view('index', $data);
    }

    public function tentang(): string
    {
        $data['prestasi'] = $this->berandaModel
            ->where('status', 'publish')
            ->orderBy('created_at', 'DESC')
            ->findAll();
        
        $data['halaman'] = $this->halamanModel->first();

        return view('tentang', $data);
    }

    public function visi(): string
    {
        return view('visi');
    }

    public function struktur(): string
    {
        return view('struktur');
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
        
        return view('tugas', ['tasks' => $tasks]);
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
