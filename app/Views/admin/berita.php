<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">Kelola Berita</h1>
        <p class="text-muted mb-0">Tambah, edit, dan hapus artikel berita</p>
    </div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewsModal">
            <i class="bi bi-plus-lg me-2"></i>Tambah Berita
        </button>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="stats-card">
            <div class="stats-icon primary">
                <i class="bi bi-newspaper"></i>
            </div>
            <div class="stats-info">
                <h3><?= $total_berita ?? 0 ?></h3>
                <p>Total Berita</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stats-card">
            <div class="stats-icon success">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stats-info">
                <h3><?= $published ?? 0 ?></h3>
                <p>Dipublikasi</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stats-card">
            <div class="stats-icon warning">
                <i class="bi bi-clock"></i>
            </div>
            <div class="stats-info">
                <h3><?= $draft ?? 0 ?></h3>
                <p>Draft</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stats-card">
            <div class="stats-icon info">
                <i class="bi bi-eye"></i>
            </div>
            <div class="stats-info">
                <h3><?= number_format($total_views ?? 0) ?></h3>
                <p>Total Views</p>
            </div>
        </div>
    </div>
</div>

<!-- Filter & Search -->
<div class="card mb-4">
    <div class="card-body py-3">
        <form method="get" action="<?= base_url('/admin/berita') ?>" id="filterForm">
            <div class="row align-items-center g-3">
                <div class="col-md-6">
                    <div class="position-relative">
                        <i class="bi bi-search position-absolute" style="left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="text" name="search" class="form-control ps-5" placeholder="Cari berita..." id="searchNews" value="<?= esc($current_search ?? '') ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select" id="filterStatus">
                        <option value="">Semua Status</option>
                        <option value="publish" <?= ($current_status ?? '') === 'publish' ? 'selected' : '' ?>>Dipublikasi</option>
                        <option value="draft" <?= ($current_status ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="kategori" class="form-select" id="filterCategory">
                        <option value="">Semua Kategori</option>
                        <option value="pengumuman" <?= ($current_kategori ?? '') === 'pengumuman' ? 'selected' : '' ?>>Pengumuman</option>
                        <option value="kegiatan" <?= ($current_kategori ?? '') === 'kegiatan' ? 'selected' : '' ?>>Kegiatan</option>
                        <option value="info" <?= ($current_kategori ?? '') === 'info' ? 'selected' : '' ?>>Informasi</option>
                    </select>
                </div>
            </div>
            <?php if (!empty($current_search) || !empty($current_status) || !empty($current_kategori)): ?>
            <div class="mt-3">
                <a href="<?= base_url('/admin/berita') ?>" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-x-circle me-1"></i>Reset Filter
                </a>
                <span class="text-muted ms-2">
                    <small>Menampilkan <?= count($berita) ?> dari <?= $total_berita ?> berita</small>
                </span>
            </div>
            <?php endif; ?>
        </form>
    </div>
</div>

<!-- News Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Daftar Berita</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 50%;">Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($berita)): ?>
                        <?php foreach ($berita as $item): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <?php if (!empty($item['gambar'])): ?>
                                    <img src="<?= base_url('uploads/berita/' . $item['gambar']) ?>" 
                                         alt="Thumbnail" 
                                         class="rounded" 
                                         style="width: 48px; height: 48px; object-fit: cover;">
                                    <?php else: ?>
                                    <div class="rounded d-flex align-items-center justify-content-center" 
                                         style="width: 48px; height: 48px; background: #f1f5f9;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                    <?php endif; ?>
                                    <div>
                                        <span class="fw-medium d-block"><?= esc($item['judul'] ?? $item['title'] ?? '-') ?></span>
                                        <small class="text-muted"><?= substr(strip_tags($item['konten'] ?? $item['isi'] ?? ''), 0, 60) ?>...</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-primary"><?= esc($item['kategori'] ?? 'Umum') ?></span></td>
                            <td>
                                <?php if (($item['status'] ?? 'publish') === 'publish'): ?>
                                    <span class="badge badge-success">Dipublikasi</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted"><?= date('d M Y', strtotime($item['created_at'] ?? 'now')) ?></td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light" data-bs-toggle="dropdown" data-bs-auto-close="true">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                        <li><a class="dropdown-item" href="<?= base_url('/admin/berita/edit/' . ($item['id'] ?? 0)) ?>"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item" href="<?= base_url('/berita/' . ($item['slug'] ?? '')) ?>" target="_blank"><i class="bi bi-eye me-2"></i>Lihat</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="<?= base_url('/admin/berita/delete/' . ($item['id'] ?? 0)) ?>" method="post" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="dropdown-item text-danger"><i class="bi bi-trash me-2"></i>Hapus</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="bi bi-newspaper fs-1 text-muted d-block mb-3"></i>
                                <p class="text-muted mb-2">Belum ada berita</p>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                                    <i class="bi bi-plus-lg me-1"></i>Tambah Berita Pertama
                                </button>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add News Modal -->
<div class="modal fade" id="addNewsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 16px; border: none;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Tambah Berita Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addNewsForm" action="<?= base_url('/admin/berita/store') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul berita" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="form-select">
                                <option value="pengumuman">Pengumuman</option>
                                <option value="kegiatan">Kegiatan</option>
                                <option value="info">Informasi</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="publish">Publikasikan</option>
                                <option value="draft">Simpan sebagai Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Utama</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 5MB.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Berita <span class="text-danger">*</span></label>
                        <textarea name="konten" class="form-control" rows="8" placeholder="Tulis isi berita..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="addNewsBtn">
                        <i class="bi bi-check-lg me-1"></i>Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Auto-close modal and loading state
document.addEventListener('DOMContentLoaded', function() {
    const addNewsForm = document.getElementById('addNewsForm');
    const addNewsBtn = document.getElementById('addNewsBtn');
    const addNewsModal = document.getElementById('addNewsModal');
    
    if (addNewsForm && addNewsBtn) {
        addNewsForm.addEventListener('submit', function() {
            addNewsBtn.disabled = true;
            addNewsBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Menyimpan...';
        });
    }
    
    // Reset form when modal closes
    if (addNewsModal) {
        addNewsModal.addEventListener('hidden.bs.modal', function() {
            if (addNewsForm) {
                addNewsForm.reset();
            }
            if (addNewsBtn) {
                addNewsBtn.disabled = false;
                addNewsBtn.innerHTML = '<i class="bi bi-check-lg me-1"></i>Simpan Berita';
            }
        });
    }
    
    // Auto-submit form on filter change
    const filterForm = document.getElementById('filterForm');
    const filterStatus = document.getElementById('filterStatus');
    const filterCategory = document.getElementById('filterCategory');
    const searchNews = document.getElementById('searchNews');
    
    if (filterStatus) {
        filterStatus.addEventListener('change', function() {
            filterForm.submit();
        });
    }
    
    if (filterCategory) {
        filterCategory.addEventListener('change', function() {
            filterForm.submit();
        });
    }
    
    // Submit on Enter key in search
    if (searchNews) {
        searchNews.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                filterForm.submit();
            }
        });
        
        // Optional: Auto-submit search after typing (with delay)
        let searchTimeout;
        searchNews.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                filterForm.submit();
            }, 800);
        });
    }
});
</script>
</script>

<?= $this->endSection(); ?>
