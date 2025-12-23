<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function tentang(): string
    {
        return view('tentang');
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
