<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">Kelola Halaman</h1>
        <p class="text-muted mb-0">Edit dan perbarui konten setiap halaman website</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2" style="border-radius: 20px;">
            <i class="bi bi-check-circle me-1"></i> 11 Halaman Aktif
        </span>
    </div>
</div>

<!-- Search -->
<div class="card mb-4">
    <div class="card-body py-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="position-relative">
                    <i class="bi bi-search position-absolute" style="left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                    <input type="text" class="form-control ps-5" placeholder="Cari halaman..." id="searchPages">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page Cards Grid -->
<div class="row g-4" id="pagesGrid">
    
    <!-- Card Beranda & Tentang -->
    <div class="col-md-6 col-lg-4 page-card" data-name="beranda tentang hero peta wilayah">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #14b8a6 0%, #5eead4 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-house-door text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">Beranda & Tentang</h5>
                        </div>
                        <span class="badge bg-white px-2 py-1" style="border-radius: 8px; color: #14b8a6 !important;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Edit hero, tentang kelurahan, peta wilayah.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-map me-1"></i>Konten Utama</small>
                        <a href="<?= base_url('/admin/halaman/editberanda-content') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Beranda / Prestasi -->
    <div class="col-md-6 col-lg-4 page-card" data-name="beranda tentang prestasi">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #518123 0%, #99BD49 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-trophy text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">Prestasi</h5>
                        </div>
                        <span class="badge bg-white text-success px-2 py-1" style="border-radius: 8px;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Kelola daftar prestasi Kelurahan Jagakarsa.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-trophy me-1"></i>Prestasi</small>
                        <a href="<?= base_url('/admin/prestasi') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Kelola
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card Visi Misi -->
    <div class="col-md-6 col-lg-4 page-card" data-name="visi misi">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-flag text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">Visi & Misi</h5>
                        </div>
                        <span class="badge bg-white text-warning px-2 py-1" style="border-radius: 8px;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Edit visi dan misi Kelurahan Jagakarsa.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-file-text me-1"></i>Konten</small>
                        <a href="<?= base_url('/admin/halaman/editvisi') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card Struktur Organisasi -->
    <div class="col-md-6 col-lg-4 page-card" data-name="struktur organisasi">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #0ea5e9 0%, #38bdf8 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-diagram-3 text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">Struktur Organisasi</h5>
                        </div>
                        <span class="badge bg-white text-info px-2 py-1" style="border-radius: 8px;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Upload gambar struktur organisasi kelurahan.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-image me-1"></i>Gambar</small>
                        <a href="<?= base_url('/admin/halaman/editstruktur') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card Tugas Pokok -->
    <div class="col-md-6 col-lg-4 page-card" data-name="tugas pokok fungsi">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-list-task text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">Tugas Pokok</h5>
                        </div>
                        <span class="badge bg-white px-2 py-1" style="border-radius: 8px; color: #8b5cf6 !important;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Kelola tugas pokok dan fungsi kelurahan.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-list-check me-1"></i>Daftar</small>
                        <a href="<?= base_url('/admin/tugas') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Kelola
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card Lembaga -->
    <div class="col-md-6 col-lg-4 page-card" data-name="lembaga kemasyarakatan">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #ec4899 0%, #f472b6 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-people text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">Lembaga</h5>
                        </div>
                        <span class="badge bg-white px-2 py-1" style="border-radius: 8px; color: #ec4899 !important;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Kelola data lembaga kemasyarakatan.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-building me-1"></i>Data</small>
                        <a href="<?= base_url('/admin/halaman/editlembaga') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card Layanan -->
    <div class="col-md-6 col-lg-4 page-card" data-name="layanan publik">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #10b981 0%, #34d399 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-headset text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">Layanan</h5>
                        </div>
                        <span class="badge bg-white text-success px-2 py-1" style="border-radius: 8px;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Edit informasi layanan publik kelurahan.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-info-circle me-1"></i>Kontak</small>
                        <a href="<?= base_url('/admin/halaman/editlayanan') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card PJLP -->
    <div class="col-md-6 col-lg-4 page-card" data-name="pjlp petugas jaga lingkungan">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #14b8a6 0%, #2dd4bf 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-person-badge text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">PJLP</h5>
                        </div>
                        <span class="badge bg-white px-2 py-1" style="border-radius: 8px; color: #14b8a6 !important;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Kelola data Petugas Jaga Lingkungan.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-person-vcard me-1"></i>Personil</small>
                        <a href="<?= base_url('/admin/pjlp') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Kelola
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Banjir -->
    <div class="col-md-6 col-lg-4 page-card" data-name="banjir area rawan">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #ef4444 0%, #f87171 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-water text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">Area Banjir</h5>
                        </div>
                        <span class="badge bg-white px-2 py-1" style="border-radius: 8px; color: #ef4444 !important;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Kelola informasi area rawan banjir.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-geo-alt me-1"></i>Peta</small>
                        <a href="<?= base_url('/admin/halaman/editbanjir') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Chatbot -->
    <div class="col-md-6 col-lg-4 page-card" data-name="chatbot faq asisten">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #6366f1 0%, #818cf8 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-robot text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">Chatbot FAQ</h5>
                        </div>
                        <span class="badge bg-white px-2 py-1" style="border-radius: 8px; color: #6366f1 !important;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Kelola FAQ untuk asisten virtual.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-chat-dots me-1"></i>Tanya Jawab</small>
                        <a href="<?= base_url('/admin/chatbot') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Kelola
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Berita -->
    <div class="col-md-6 col-lg-4 page-card" data-name="berita artikel informasi">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="p-4" style="background: linear-gradient(135deg, #f97316 0%, #fb923c 100%); border-radius: 16px 16px 0 0;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3" 
                                 style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-newspaper text-white fs-4"></i>
                            </div>
                            <h5 class="text-white fw-bold mb-0">Berita</h5>
                        </div>
                        <span class="badge bg-white px-2 py-1" style="border-radius: 8px; color: #f97316 !important;">Aktif</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-muted small mb-3">Kelola berita dan artikel kelurahan.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted"><i class="bi bi-file-earmark-text me-1"></i>Artikel</small>
                        <a href="<?= base_url('/admin/berita') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil me-1"></i>Kelola
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
// Search functionality
document.getElementById('searchPages').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    document.querySelectorAll('.page-card').forEach(card => {
        const name = card.dataset.name.toLowerCase();
        card.style.display = name.includes(searchTerm) ? '' : 'none';
    });
});
</script>

<?= $this->endSection(); ?>
