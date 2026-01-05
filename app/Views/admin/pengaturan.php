<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">Pengaturan</h1>
        <p class="text-muted mb-0">Konfigurasi sistem dan preferensi website</p>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px; border: none;">
    <i class="bi bi-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 12px; border: none;">
    <i class="bi bi-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="row g-4">
    <!-- Profile Settings -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0 fw-bold"><i class="bi bi-person me-2"></i>Profil Admin</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/admin/pengaturan/update') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Username <span class="text-danger">*</span></label>
                            <input type="text" name="username" class="form-control" value="<?= esc($user['username'] ?? '') ?>" required>
                            <small class="text-muted">Username untuk login</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" value="<?= esc($user['nama'] ?? '') ?>" required>
                            <small class="text-muted">Nama yang akan ditampilkan</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="<?= esc($user['email'] ?? '') ?>" required>
                            <small class="text-muted">Email untuk notifikasi</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="<?= esc($user['jabatan'] ?? '') ?>" placeholder="Contoh: Administrator">
                            <small class="text-muted">Jabatan di kelurahan</small>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">No. Telepon</label>
                            <input type="tel" name="notelp" class="form-control" value="<?= esc($user['notelp'] ?? '') ?>" placeholder="08123456789">
                            <small class="text-muted">Nomor telepon aktif</small>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 fw-bold"><i class="bi bi-shield-lock me-2"></i>Ubah Password</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/admin/pengaturan/password') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Password Lama</label>
                            <input type="password" name="old_password" class="form-control" placeholder="Masukkan password lama">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Masukkan password baru">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi password baru">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-key me-1"></i>Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Sidebar Info -->
    <div class="col-lg-4">
        <!-- System Info -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i>Info Sistem</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between py-2 border-bottom">
                    <span class="text-muted">Versi Aplikasi</span>
                    <span class="fw-medium">1.0.0</span>
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom">
                    <span class="text-muted">Framework</span>
                    <span class="fw-medium">CodeIgniter 4</span>
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom">
                    <span class="text-muted">PHP Version</span>
                    <span class="fw-medium"><?= phpversion() ?></span>
                </div>
                <div class="d-flex justify-content-between py-2">
                    <span class="text-muted">Environment</span>
                    <span class="badge badge-success">Production</span>
                </div>
            </div>
        </div>

        <!-- Visitor Stats -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0 fw-bold"><i class="bi bi-graph-up me-2"></i>Statistik</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between py-2 border-bottom">
                    <span class="text-muted">Pengunjung Hari Ini</span>
                    <span class="fw-bold" style="color: #518123;"><?= number_format($stats['today'] ?? 0) ?></span>
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom">
                    <span class="text-muted">Bulan Ini</span>
                    <span class="fw-medium"><?= number_format($stats['monthly'] ?? 0) ?></span>
                </div>
                <div class="d-flex justify-content-between py-2">
                    <span class="text-muted">Total Pengunjung</span>
                    <span class="fw-medium"><?= number_format($stats['total'] ?? 0) ?></span>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 fw-bold"><i class="bi bi-link-45deg me-2"></i>Akses Cepat</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="<?= base_url('/') ?>" target="_blank" class="btn btn-outline-primary">
                        <i class="bi bi-box-arrow-up-right me-2"></i>Lihat Website
                    </a>
                    <a href="<?= base_url('/admin/berita') ?>" class="btn btn-outline-primary">
                        <i class="bi bi-newspaper me-2"></i>Kelola Berita
                    </a>
                    <a href="<?= base_url('/admin/halaman') ?>" class="btn btn-outline-primary">
                        <i class="bi bi-file-earmark-text me-2"></i>Kelola Halaman
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
