<?php

namespace App\Controllers;

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
        $data['berita'] = $this->beritaModel
            ->where('status', 'publish')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        
        $data['pager'] = $this->beritaModel->pager;
        
        // SEO Meta Data
        $data['meta_title'] = 'Berita Terkini Kelurahan Jagakarsa';
        $data['meta_description'] = 'Informasi berita terbaru dan terkini dari Kelurahan Jagakarsa Jakarta Selatan. Update kegiatan, program, pengumuman, dan peristiwa penting di lingkungan kelurahan.';
        $data['meta_keywords'] = 'Berita Kelurahan Jagakarsa, Informasi Kelurahan, Kegiatan Kelurahan, Pengumuman Kelurahan, News Update Jagakarsa';
        $data['canonical_url'] = base_url('/berita');
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
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Berita',
                    'item' => base_url('/berita')
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('berita', $data);
    }

    public function detail($slug)
    {
        $data['berita'] = $this->beritaModel
            ->where('slug', $slug)
            ->first();

        if (!$data['berita']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan');
        }

        // Get related news (excluding current)
        $data['berita_terkait'] = $this->beritaModel
            ->where('status', 'publish')
            ->where('slug !=', $slug)
            ->orderBy('created_at', 'DESC')
            ->findAll(5);
        
        // SEO Meta Data
        $berita = $data['berita'];
        $data['meta_title'] = esc($berita['title']) . ' - Berita Kelurahan Jagakarsa';
        $data['meta_description'] = esc(strip_tags(substr($berita['content'], 0, 160))) . '...';
        $data['meta_keywords'] = 'Berita Jagakarsa, ' . esc($berita['title']) . ', Informasi Kelurahan, Jakarta Selatan';
        $data['canonical_url'] = base_url('/berita/' . $slug);
        $data['og_type'] = 'article';
        $data['og_image'] = $berita['image'] ? base_url('uploads/berita/' . $berita['image']) : base_url('images/features/hero-beranda.jpg');
        
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
                    'name' => 'Berita',
                    'item' => base_url('/berita')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => esc($berita['title']),
                    'item' => base_url('/berita/' . $slug)
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        
        // Article Schema (NewsArticle)
        $data['article_json'] = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'NewsArticle',
            'headline' => esc($berita['title']),
            'description' => esc(strip_tags(substr($berita['content'], 0, 200))),
            'image' => $berita['image'] ? base_url('uploads/berita/' . $berita['image']) : base_url('images/features/hero-beranda.jpg'),
            'datePublished' => date('c', strtotime($berita['created_at'])),
            'dateModified' => date('c', strtotime($berita['updated_at'] ?? $berita['created_at'])),
            'author' => [
                '@type' => 'Organization',
                'name' => 'Kelurahan Jagakarsa',
                'url' => base_url('/')
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Kelurahan Jagakarsa',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => base_url('images/logo.png')
                ]
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => base_url('/berita/' . $slug)
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('detail-berita', $data);
    }
}
