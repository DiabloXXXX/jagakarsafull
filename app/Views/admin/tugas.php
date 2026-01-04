<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Kelola Tugas Pokok</h4>
            <p class="text-muted mb-0">Kelola tugas pokok dan fungsi perangkat kelurahan</p>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="bi bi-plus-lg me-1"></i> Tambah Tugas
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

    <!-- Tugas List -->
    <div class="card">
        <div class="card-body">
            <?php if (empty($tugas)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-list-task text-muted" style="font-size: 4rem;"></i>
                    <h5 class="mt-3 text-muted">Belum ada data tugas</h5>
                    <p class="text-muted">Klik tombol "Tambah Tugas" untuk menambahkan data baru.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 60px;">Urutan</th>
                                <th>Judul Tugas</th>
                                <th>Deskripsi Singkat</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tugas as $t): ?>
                                <tr>
                                    <td><span class="badge bg-secondary"><?= $t['sort_order'] ?></span></td>
                                    <td><strong><?= esc($t['title']) ?></strong></td>
                                    <td class="text-muted"><?= esc(substr($t['short_description'] ?? '', 0, 80)) ?>...</td>
                                    <td>
                                        <?php if ($t['status'] == 'publish'): ?>
                                            <span class="badge bg-success">Published</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning">Draft</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning editBtn"
                                            data-id="<?= $t['id'] ?>"
                                            data-title="<?= esc($t['title']) ?>"
                                            data-short="<?= esc($t['short_description'] ?? '') ?>"
                                            data-full="<?= esc($t['full_description'] ?? '[]') ?>"
                                            data-order="<?= $t['sort_order'] ?>"
                                            data-status="<?= $t['status'] ?>"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form action="<?= base_url('admin/tugas/delete/' . $t['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus tugas ini?')">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-4">
        <a href="<?= base_url('/admin/halaman') ?>" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-plus-circle me-2 text-primary"></i>Tambah Tugas Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/tugas/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Judul Tugas <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Contoh: Tugas Seorang Lurah" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Deskripsi Singkat</label>
                        <textarea name="short_description" class="form-control" rows="2" placeholder="Deskripsi singkat yang akan ditampilkan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Deskripsi Lengkap</label>
                        <div id="addDescriptions">
                            <div class="input-group mb-2">
                                <input type="text" name="descriptions[]" class="form-control" placeholder="Deskripsi tugas 1">
                                <button type="button" class="btn btn-outline-success addDescBtn"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                        <small class="text-muted">Klik + untuk menambah deskripsi baru</small>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium">Urutan</label>
                            <input type="number" name="sort_order" class="form-control" value="0" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium">Status</label>
                            <select name="status" class="form-select">
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square me-2 text-warning"></i>Edit Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Judul Tugas <span class="text-danger">*</span></label>
                        <input type="text" id="editTitle" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Deskripsi Singkat</label>
                        <textarea id="editShort" name="short_description" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Deskripsi Lengkap</label>
                        <div id="editDescriptions"></div>
                        <button type="button" class="btn btn-sm btn-outline-success mt-2" id="addEditDescBtn">
                            <i class="bi bi-plus me-1"></i>Tambah Deskripsi
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium">Urutan</label>
                            <input type="number" id="editOrder" name="sort_order" class="form-control" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium">Status</label>
                            <select id="editStatus" name="status" class="form-select">
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning"><i class="bi bi-check-lg me-1"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Add description field on add modal
    document.querySelectorAll('.addDescBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            const container = document.getElementById('addDescriptions');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" name="descriptions[]" class="form-control" placeholder="Deskripsi tugas">
                <button type="button" class="btn btn-outline-danger removeDescBtn"><i class="bi bi-trash"></i></button>
            `;
            container.appendChild(div);
            div.querySelector('.removeDescBtn').addEventListener('click', () => div.remove());
        });
    });

    // Add description field on edit modal
    document.getElementById('addEditDescBtn').addEventListener('click', function() {
        const container = document.getElementById('editDescriptions');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="descriptions[]" class="form-control" placeholder="Deskripsi tugas">
            <button type="button" class="btn btn-outline-danger removeDescBtn"><i class="bi bi-trash"></i></button>
        `;
        container.appendChild(div);
        div.querySelector('.removeDescBtn').addEventListener('click', () => div.remove());
    });

    // Edit button handler
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('editTitle').value = this.dataset.title;
            document.getElementById('editShort').value = this.dataset.short;
            document.getElementById('editOrder').value = this.dataset.order;
            document.getElementById('editStatus').value = this.dataset.status;
            document.getElementById('editForm').action = "<?= base_url('admin/tugas/update') ?>/" + this.dataset.id;

            // Populate descriptions
            const container = document.getElementById('editDescriptions');
            container.innerHTML = '';
            try {
                const descriptions = JSON.parse(this.dataset.full);
                descriptions.forEach(desc => {
                    const div = document.createElement('div');
                    div.className = 'input-group mb-2';
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.name = 'descriptions[]';
                    input.className = 'form-control';
                    input.value = desc;
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'btn btn-outline-danger removeDescBtn';
                    btn.innerHTML = '<i class="bi bi-trash"></i>';
                    div.appendChild(input);
                    div.appendChild(btn);
                    container.appendChild(div);
                    btn.addEventListener('click', () => div.remove());
                });
            } catch (e) {
                console.log('No descriptions to parse');
            }
        });
    });

    // Auto-close modals on form submit with loading state
    document.querySelectorAll('.modal form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                const modal = bootstrap.Modal.getInstance(this.closest('.modal'));
                if (modal) modal.hide();
            }, 100);
        });
    });

    // Clear form when tambah modal is closed
    document.getElementById('tambahModal').addEventListener('hidden.bs.modal', function() {
        this.querySelector('form').reset();
        document.getElementById('addDescriptions').innerHTML = `
            <div class="input-group mb-2">
                <input type="text" name="descriptions[]" class="form-control" placeholder="Deskripsi tugas 1">
                <button type="button" class="btn btn-outline-success addDescBtn"><i class="bi bi-plus"></i></button>
            </div>
        `;
    });
</script>

<?= $this->endSection(); ?>
