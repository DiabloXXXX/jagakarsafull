<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">Dashboard</h1>
        <p class="text-muted mb-0">Selamat datang di panel admin Kelurahan Jagakarsa</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= base_url('/admin/berita') ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>Buat Berita
        </a>
    </div>
</div>

<!-- Welcome Card -->
<div class="card mb-4" style="background: linear-gradient(135deg, #518123 0%, #99BD49 100%); border: none;">
    <div class="card-body p-4">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-white text-success px-3 py-2" style="border-radius: 20px;">
                        <i class="bi bi-sun me-1"></i> Selamat Datang
                    </span>
                </div>
                <h2 class="text-white fw-bold mb-2" style="font-size: 1.75rem;">
                    Halo, <?= esc($user['nama'] ?? $user['username'] ?? 'Admin') ?>! 👋
                </h2>
                <p class="text-white mb-0" style="opacity: 0.9;">
                    Kelola website Kelurahan Jagakarsa dengan mudah melalui dashboard admin ini.
                </p>
            </div>
            <div class="col-lg-4 text-end d-none d-lg-block">
                <div style="font-size: 5rem; opacity: 0.3;">🏛️</div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <!-- Pengunjung Hari Ini -->
    <div class="col-sm-6 col-xl-3">
        <div class="stats-card">
            <div class="stats-icon primary">
                <i class="bi bi-people"></i>
            </div>
            <div class="stats-info">
                <h3><?= number_format($stats['today'] ?? 0) ?></h3>
                <p>Pengunjung Hari Ini</p>
            </div>
        </div>
    </div>
    
    <!-- Total Berita -->
    <div class="col-sm-6 col-xl-3">
        <div class="stats-card">
            <div class="stats-icon warning">
                <i class="bi bi-newspaper"></i>
            </div>
            <div class="stats-info">
                <h3><?= number_format($stats['total_berita'] ?? 0) ?></h3>
                <p>Total Berita</p>
            </div>
        </div>
    </div>
    
    <!-- Total Halaman -->
    <div class="col-sm-6 col-xl-3">
        <div class="stats-card">
            <div class="stats-icon info">
                <i class="bi bi-file-earmark-text"></i>
            </div>
            <div class="stats-info">
                <h3><?= number_format($stats['total_halaman'] ?? 0) ?></h3>
                <p>Total Halaman</p>
            </div>
        </div>
    </div>
    
    <!-- Pengunjung Bulan Ini -->
    <div class="col-sm-6 col-xl-3">
        <div class="stats-card">
            <div class="stats-icon success">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div class="stats-info">
                <h3><?= number_format($stats['monthly'] ?? 0) ?></h3>
                <p>Pengunjung Bulan Ini</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <h5 class="fw-bold mb-3">Aksi Cepat</h5>
    </div>
    
    <div class="col-sm-6 col-lg-3">
        <a href="<?= base_url('/admin/halaman') ?>" class="card text-decoration-none h-100">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" 
                         style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(81,129,35,0.1), rgba(153,189,73,0.1));">
                        <i class="bi bi-file-earmark-richtext fs-4" style="color: #518123;"></i>
                    </div>
                </div>
                <h6 class="fw-semibold text-dark mb-1">Kelola Halaman</h6>
                <small class="text-muted">Edit konten halaman website</small>
            </div>
        </a>
    </div>
    
    <div class="col-sm-6 col-lg-3">
        <a href="<?= base_url('/admin/berita') ?>" class="card text-decoration-none h-100">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" 
                         style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(251,191,36,0.1));">
                        <i class="bi bi-newspaper fs-4" style="color: #f59e0b;"></i>
                    </div>
                </div>
                <h6 class="fw-semibold text-dark mb-1">Kelola Berita</h6>
                <small class="text-muted">Tambah & edit artikel berita</small>
            </div>
        </a>
    </div>
    
    <div class="col-sm-6 col-lg-3">
        <a href="<?= base_url('/admin/prestasi') ?>" class="card text-decoration-none h-100">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" 
                         style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(14,165,233,0.1), rgba(56,189,248,0.1));">
                        <i class="bi bi-trophy fs-4" style="color: #0ea5e9;"></i>
                    </div>
                </div>
                <h6 class="fw-semibold text-dark mb-1">Kelola Prestasi</h6>
                <small class="text-muted">Catat prestasi kelurahan</small>
            </div>
        </a>
    </div>
    
    <div class="col-sm-6 col-lg-3">
        <a href="<?= base_url('/admin/pengaturan') ?>" class="card text-decoration-none h-100">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" 
                         style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(139,92,246,0.1), rgba(167,139,250,0.1));">
                        <i class="bi bi-gear fs-4" style="color: #8b5cf6;"></i>
                    </div>
                </div>
                <h6 class="fw-semibold text-dark mb-1">Pengaturan</h6>
                <small class="text-muted">Konfigurasi sistem</small>
            </div>
        </a>
    </div>
</div>

<!-- Recent Activity -->
<div class="row g-4">
    <!-- Recent News -->
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Berita Terbaru</h5>
                <a href="<?= base_url('/admin/berita') ?>" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body">
                <?php if (!empty($recent_berita)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_slice($recent_berita, 0, 5) as $berita): ?>
                                <tr>
                                    <td>
                                        <span class="fw-medium"><?= esc($berita['judul'] ?? $berita['title'] ?? '-') ?></span>
                                    </td>
                                    <td class="text-muted"><?= date('d M Y', strtotime($berita['created_at'] ?? 'now')) ?></td>
                                    <td><span class="badge badge-success">Dipublikasi</span></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="bi bi-newspaper fs-1 text-muted"></i>
                        <p class="text-muted mt-2">Belum ada berita</p>
                        <a href="<?= base_url('/admin/berita') ?>" class="btn btn-primary btn-sm">Buat Berita Pertama</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Visitor Stats -->
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0 fw-bold">Statistik Pengunjung</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <span class="text-muted">Hari Ini</span>
                    <span class="fw-bold text-dark"><?= number_format($stats['today'] ?? 0) ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <span class="text-muted">Kemarin</span>
                    <span class="fw-bold text-dark"><?= number_format($stats['yesterday'] ?? 0) ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <span class="text-muted">Minggu Ini</span>
                    <span class="fw-bold text-dark"><?= number_format($stats['weekly'] ?? 0) ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <span class="text-muted">Bulan Ini</span>
                    <span class="fw-bold text-dark"><?= number_format($stats['monthly'] ?? 0) ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3">
                    <span class="text-muted">Total</span>
                    <span class="fw-bold" style="color: #518123;"><?= number_format($stats['total'] ?? 0) ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
