<?php

namespace App\Controllers;

use App\Models\BerandaModel;

class Home extends BaseController
{
    protected $berandaModel;

    public function __construct()
    {
        $this->berandaModel = new BerandaModel();
    }

    public function index(): string
    {
        $data['prestasi'] = $this->berandaModel
            ->where('status', 'publish')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('index', $data);
    }

    public function tentang(): string
    {
        $data['prestasi'] = $this->berandaModel
            ->where('status', 'publish')
            ->orderBy('created_at', 'DESC')
            ->findAll();

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
        return view('tugas');
    }

    public function pjlp(): string
    {
        return view('pjlp');
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
        return view('berita');
    }

    public function detail_berita(): string
    {
        return view('detail-berita');
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
