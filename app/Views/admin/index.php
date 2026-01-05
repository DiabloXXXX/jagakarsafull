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
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-person-circle text-success" style="font-size: 2.5rem;"></i>
                    </div>
                    <div>
                        <?php 
                        $displayName = 'Admin';
                        if (isset($user['nama']) && !empty(trim($user['nama']))) {
                            $displayName = $user['nama'];
                        } elseif (isset($user['username']) && !empty(trim($user['username']))) {
                            $displayName = $user['username'];
                        }
                        ?>
                        <h2 class="text-white fw-bold mb-1" style="font-size: 1.75rem;">
                            Halo, <?= esc($displayName) ?>!
                        </h2>
                        <p class="text-white mb-0" style="opacity: 0.8; font-size: 0.9rem;">
                            <?php if (isset($user['jabatan']) && !empty(trim($user['jabatan']))): ?>
                                <?= esc($user['jabatan']) ?>
                            <?php else: ?>
                                Administrator
                            <?php endif; ?>
                            <?php if (isset($user['email']) && !empty(trim($user['email']))): ?>
                                • <?= esc($user['email']) ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                <p class="text-white mb-0" style="opacity: 0.9;">
                    Kelola website Kelurahan Jagakarsa dengan mudah melalui dashboard admin ini.
                </p>
            </div>
            <div class="col-lg-4 text-end d-none d-lg-block">
                <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity: 0.3;">
                    <!-- Government Building Icon -->
                    <path d="M60 10L10 35V40H110V35L60 10Z" fill="white"/>
                    <rect x="20" y="45" width="15" height="55" fill="white"/>
                    <rect x="40" y="45" width="15" height="55" fill="white"/>
                    <rect x="65" y="45" width="15" height="55" fill="white"/>
                    <rect x="85" y="45" width="15" height="55" fill="white"/>
                    <rect x="10" y="105" width="100" height="10" fill="white"/>
                    <rect x="55" y="15" width="10" height="20" fill="white"/>
                    <circle cx="60" cy="12" r="3" fill="white"/>
                </svg>
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
                <small class="text-muted">
                    <i class="bi bi-calendar-check me-1"></i><?= date('d M Y') ?>
                </small>
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
                <h3><?= number_format($total_berita ?? 0) ?></h3>
                <p>Total Berita</p>
                <small class="text-muted">
                    <i class="bi bi-file-text me-1"></i>Artikel dipublikasi
                </small>
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
                <h3><?= number_format($total_halaman ?? 0) ?></h3>
                <p>Total Konten</p>
                <small class="text-muted">
                    <i class="bi bi-layers me-1"></i>Halaman & berita
                </small>
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
                <small class="text-muted">
                    <i class="bi bi-calendar-month me-1"></i><?= date('F Y') ?>
                </small>
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
                <?php if (!empty($recent_berita) && count($recent_berita) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_slice($recent_berita, 0, 5) as $berita): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <?php if (!empty($berita['gambar'])): ?>
                                            <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>" 
                                                 alt="<?= esc($berita['judul']) ?>" 
                                                 class="rounded me-2"
                                                 style="width: 40px; height: 40px; object-fit: cover;">
                                            <?php else: ?>
                                            <div class="rounded me-2 bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 40px; height: 40px;">
                                                <i class="bi bi-newspaper text-muted"></i>
                                            </div>
                                            <?php endif; ?>
                                            <span class="fw-medium"><?= esc(substr($berita['judul'], 0, 50)) ?><?= strlen($berita['judul']) > 50 ? '...' : '' ?></span>
                                        </div>
                                    </td>
                                    <td class="text-muted">
                                        <i class="bi bi-person-circle me-1"></i><?= esc($berita['penulis'] ?? 'Admin') ?>
                                    </td>
                                    <td class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i><?= date('d M Y', strtotime($berita['created_at'])) ?>
                                    </td>
                                    <td>
                                        <?php if ($berita['status'] === 'publish'): ?>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i>Dipublikasi
                                        </span>
                                        <?php else: ?>
                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-clock me-1"></i>Draft
                                        </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="bi bi-newspaper fs-1 text-muted mb-3"></i>
                        <h6 class="text-muted">Belum ada berita</h6>
                        <p class="text-muted small mb-3">Mulai membuat berita untuk menampilkan informasi terkini</p>
                        <a href="<?= base_url('/admin/berita/create') ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-lg me-1"></i>Buat Berita Pertama
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Visitor Stats -->
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-graph-up text-primary me-2"></i>Statistik Pengunjung
                </h5>
            </div>
            <div class="card-body">
                <!-- Stats List -->
                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <div>
                        <i class="bi bi-calendar-check text-primary me-2"></i>
                        <span class="text-muted">Hari Ini</span>
                    </div>
                    <span class="fw-bold text-dark fs-5"><?= number_format($stats['today'] ?? 0) ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <div>
                        <i class="bi bi-calendar-minus text-warning me-2"></i>
                        <span class="text-muted">Kemarin</span>
                    </div>
                    <div class="text-end">
                        <span class="fw-bold text-dark fs-5"><?= number_format($stats['yesterday'] ?? 0) ?></span>
                        <?php 
                        $today = $stats['today'] ?? 0;
                        $yesterday = $stats['yesterday'] ?? 1; // prevent division by zero
                        $change = $yesterday > 0 ? (($today - $yesterday) / $yesterday) * 100 : 0;
                        ?>
                        <?php if ($change > 0): ?>
                            <small class="text-success ms-2">
                                <i class="bi bi-arrow-up"></i><?= number_format(abs($change), 1) ?>%
                            </small>
                        <?php elseif ($change < 0): ?>
                            <small class="text-danger ms-2">
                                <i class="bi bi-arrow-down"></i><?= number_format(abs($change), 1) ?>%
                            </small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <div>
                        <i class="bi bi-calendar-week text-info me-2"></i>
                        <span class="text-muted">7 Hari Terakhir</span>
                    </div>
                    <span class="fw-bold text-dark fs-5"><?= number_format($stats['weekly'] ?? 0) ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <div>
                        <i class="bi bi-calendar-month text-success me-2"></i>
                        <span class="text-muted">Bulan Ini</span>
                    </div>
                    <span class="fw-bold text-dark fs-5"><?= number_format($stats['monthly'] ?? 0) ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <div>
                        <i class="bi bi-calendar-range text-purple me-2"></i>
                        <span class="text-muted">Tahun Ini</span>
                    </div>
                    <span class="fw-bold text-dark fs-5"><?= number_format($stats['yearly'] ?? 0) ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3">
                    <div>
                        <i class="bi bi-people-fill text-primary me-2"></i>
                        <span class="text-muted fw-semibold">Total Keseluruhan</span>
                    </div>
                    <span class="fw-bold fs-4" style="color: #518123;"><?= number_format($stats['total'] ?? 0) ?></span>
                </div>
                
                <!-- Average per day -->
                <div class="mt-3 p-3 bg-light rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted small">
                            <i class="bi bi-bar-chart-line me-1"></i>Rata-rata per Hari (7 hari)
                        </span>
                        <span class="fw-bold text-primary">
                            <?= number_format(($stats['weekly'] ?? 0) / 7, 1) ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
