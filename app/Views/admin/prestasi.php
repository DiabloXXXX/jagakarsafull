<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Kelola Prestasi</h4>
            <p class="text-muted mb-0">Tambah dan kelola prestasi kelurahan</p>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="bi bi-plus-lg me-1"></i> Tambah Prestasi
        </button>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i><?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Prestasi Grid -->
    <div class="row g-4">
        <?php if (empty($prestasi)): ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-trophy text-muted" style="font-size: 4rem;"></i>
                        <h5 class="mt-3 text-muted">Belum ada prestasi</h5>
                        <p class="text-muted">Klik tombol "Tambah Prestasi" untuk menambahkan prestasi baru.</p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($prestasi as $p): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <?php if ($p['gambar']): ?>
                            <img src="<?= base_url('uploads/prestasi/' . $p['gambar']) ?>" 
                                 class="card-img-top" 
                                 alt="<?= esc($p['judul']) ?>"
                                 style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-trophy text-muted" style="font-size: 4rem;"></i>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0"><?= esc($p['judul']) ?></h5>
                                <?php if ($p['status'] == 'publish'): ?>
                                    <span class="badge bg-success">Published</span>
                                <?php else: ?>
                                    <span class="badge bg-warning">Draft</span>
                                <?php endif; ?>
                            </div>
                            <p class="card-text text-muted small">
                                <i class="bi bi-calendar me-1"></i>
                                <?= date('d M Y', strtotime($p['created_at'])) ?>
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-warning flex-fill editBtn"
                                    data-id="<?= $p['id'] ?>"
                                    data-judul="<?= esc($p['judul']) ?>"
                                    data-deskripsi="<?= esc($p['deskripsi'] ?? '') ?>"
                                    data-status="<?= $p['status'] ?>"
                                    data-gambar="<?= $p['gambar'] ?>"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    <i class="bi bi-pencil me-1"></i> Edit
                                </button>
                                <form action="<?= base_url('admin/prestasi/delete/' . $p['id']) ?>" method="post" style="flex: 1;" onsubmit="return confirm('Hapus prestasi ini?')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                        <i class="bi bi-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Back Button -->
    <div class="mt-4">
        <a href="<?= base_url('/admin/halaman') ?>" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<!-- Modal Tambah Prestasi -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus-circle me-2 text-primary"></i>Tambah Prestasi Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/prestasi/store') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Nama Prestasi <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan nama prestasi" required>
                    </div>
                    <div class="mb-3">                        <label class="form-label fw-medium">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Jelaskan tentang prestasi ini..."></textarea>
                    </div>
                    <div class="mb-3">                        <label class="form-label fw-medium">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Jelaskan tentang prestasi ini..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Foto Prestasi</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 5MB</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Status</label>
                        <select name="status" class="form-select">
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i> Simpan Prestasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Prestasi -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-pencil-square me-2 text-warning"></i>Edit Prestasi
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Nama Prestasi <span class="text-danger">*</span></label>
                        <input type="text" id="editJudul" name="judul" class="form-control" placeholder="Masukkan nama prestasi" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Deskripsi</label>
                        <textarea id="editDeskripsi" name="deskripsi" class="form-control" rows="4" placeholder="Jelaskan tentang prestasi ini..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Foto Prestasi</label>
                        <div id="previewContainer" class="mb-2" style="display: none;">
                            <img id="previewGambar" class="img-fluid rounded" style="max-height: 150px;">
                        </div>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Status</label>
                        <select id="editStatus" name="status" class="form-select">
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check-lg me-1"></i> Update Prestasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Handle edit button clicks
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('editJudul').value = this.dataset.judul;
            document.getElementById('editDeskripsi').value = this.dataset.deskripsi || '';
            document.getElementById('editStatus').value = this.dataset.status;

            document.getElementById('editForm').action =
                "<?= base_url('admin/prestasi/update') ?>/" + this.dataset.id;

            const previewContainer = document.getElementById('previewContainer');
            const previewGambar = document.getElementById('previewGambar');
            
            if (this.dataset.gambar) {
                previewGambar.src = "<?= base_url('uploads/prestasi') ?>/" + this.dataset.gambar;
                previewContainer.style.display = 'block';
            } else {
                previewContainer.style.display = 'none';
            }
        });
    });

    // Auto-close modals on form submit with loading state
    document.querySelectorAll('.modal form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
            submitBtn.disabled = true;
            
            // Close modal after short delay to allow form submission
            setTimeout(() => {
                const modal = bootstrap.Modal.getInstance(this.closest('.modal'));
                if (modal) {
                    modal.hide();
                }
            }, 100);
        });
    });

    // Clear form when modal is closed
    document.getElementById('tambahModal').addEventListener('hidden.bs.modal', function() {
        this.querySelector('form').reset();
    });
</script>

<?= $this->endSection(); ?>
