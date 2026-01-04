<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="d-flex align-items-center gap-3">
        <a href="<?= base_url('/admin/berita') ?>" class="btn btn-light">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div>
            <h1 class="h3 fw-bold text-dark mb-1"><?= $title ?></h1>
            <p class="text-muted mb-0"><?= $berita ? 'Edit artikel berita yang sudah ada' : 'Buat artikel berita baru' ?></p>
        </div>
    </div>
</div>

<!-- Alert Messages -->
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

<?php if (session()->getFlashdata('errors')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 12px; border: none;">
    <i class="bi bi-exclamation-circle me-2"></i><strong>Terjadi kesalahan:</strong>
    <ul class="mb-0 mt-2">
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<form id="beritaForm" action="<?= $berita ? base_url('/admin/berita/update/' . $berita['id']) : base_url('/admin/berita/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control" 
                               value="<?= esc($berita['judul'] ?? '') ?>" 
                               placeholder="Masukkan judul berita" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Gambar Utama</label>
                        <?php if (!empty($berita['gambar'])): ?>
                        <div class="mb-2">
                            <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>" 
                                 alt="Current Image" 
                                 class="img-thumbnail" 
                                 style="max-height: 150px;">
                            <p class="text-muted small mt-1">Gambar saat ini. Upload gambar baru untuk mengganti.</p>
                        </div>
                        <?php endif; ?>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 5MB.</small>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Isi Berita <span class="text-danger">*</span></label>
                        <textarea name="konten" class="form-control" rows="12" 
                                  placeholder="Tulis isi berita..." required><?= esc($berita['konten'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Sidebar Options -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0 fw-bold">Pengaturan Publikasi</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="publish" <?= ($berita['status'] ?? 'publish') === 'publish' ? 'selected' : '' ?>>Dipublikasikan</option>
                            <option value="draft" <?= ($berita['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
                        </select>
                    </div>
                    
                    <?php if ($berita): ?>
                    <div class="mb-3">
                        <label class="form-label">Slug URL</label>
                        <input type="text" class="form-control bg-light" value="<?= esc($berita['slug'] ?? '') ?>" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Dibuat</label>
                        <input type="text" class="form-control bg-light" value="<?= date('d M Y H:i', strtotime($berita['created_at'] ?? 'now')) ?>" readonly>
                    </div>
                    <?php endif; ?>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i><?= $berita ? 'Simpan Perubahan' : 'Publikasikan Berita' ?>
                        </button>
                        <a href="<?= base_url('/admin/berita') ?>" class="btn btn-light">
                            <i class="bi bi-x-lg me-1"></i>Batal
                        </a>
                    </div>
                </div>
            </div>
            
            <?php if ($berita): ?>
            <div class="card border-danger">
                <div class="card-header bg-danger bg-opacity-10 text-danger">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-exclamation-triangle me-2"></i>Zona Bahaya</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted small mb-3">Menghapus berita tidak dapat dibatalkan.</p>
                    <form action="<?= base_url('/admin/berita/delete/' . $berita['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.')">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="bi bi-trash me-1"></i>Hapus Berita
                        </button>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>
