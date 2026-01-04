<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Kelola PJLP</h4>
            <p class="text-muted mb-0">Kelola data Petugas Jaga Lingkungan Permukiman</p>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="bi bi-plus-lg me-1"></i> Tambah PJLP
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

    <!-- PJLP Grid -->
    <div class="row g-4">
        <?php if (empty($pjlp)): ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-people text-muted" style="font-size: 4rem;"></i>
                        <h5 class="mt-3 text-muted">Belum ada data PJLP</h5>
                        <p class="text-muted">Klik tombol "Tambah PJLP" untuk menambahkan data baru.</p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($pjlp as $p): ?>
                <div class="col-lg-6">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"><?= esc($p['title']) ?></h5>
                                <?php if ($p['status'] == 'publish'): ?>
                                    <span class="badge bg-light text-success">Published</span>
                                <?php else: ?>
                                    <span class="badge bg-light text-warning">Draft</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-muted"><?= esc($p['description']) ?></p>
                            
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-opacity-10 rounded-3 p-3 me-3">
                                    <i class="bi bi-people-fill text-primary fs-3"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Jumlah Personil</small>
                                    <h4 class="mb-0 text-primary"><?= $p['personil_count'] ?></h4>
                                </div>
                            </div>

                            <?php 
                            $tasks = json_decode($p['main_tasks'] ?? '[]', true);
                            if (!empty($tasks)): 
                            ?>
                                <h6 class="fw-bold mb-2">Tugas Utama:</h6>
                                <ul class="list-unstyled mb-0">
                                    <?php foreach (array_slice($tasks, 0, 3) as $task): ?>
                                        <li class="mb-1">
                                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                                            <small><?= esc(substr($task, 0, 60)) ?>...</small>
                                        </li>
                                    <?php endforeach; ?>
                                    <?php if (count($tasks) > 3): ?>
                                        <li class="text-muted"><small>+<?= count($tasks) - 3 ?> tugas lainnya</small></li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-warning flex-fill editBtn"
                                    data-id="<?= $p['id'] ?>"
                                    data-title="<?= esc($p['title']) ?>"
                                    data-description="<?= esc($p['description'] ?? '') ?>"
                                    data-count="<?= $p['personil_count'] ?>"
                                    data-tasks="<?= esc($p['main_tasks'] ?? '[]') ?>"
                                    data-order="<?= $p['sort_order'] ?>"
                                    data-status="<?= $p['status'] ?>"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    <i class="bi bi-pencil me-1"></i> Edit
                                </button>
                                <form action="<?= base_url('admin/pjlp/delete/' . $p['id']) ?>" method="post" style="flex: 1;" onsubmit="return confirm('Hapus data PJLP ini?')">
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

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-plus-circle me-2 text-primary"></i>Tambah PJLP Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/pjlp/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Nama Kategori PJLP <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Contoh: PPSU (Petugas Pengelola Sarana Umum)" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Deskripsi singkat tentang kategori PJLP"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Jumlah Personil</label>
                            <input type="number" name="personil_count" class="form-control" value="0" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Urutan</label>
                            <input type="number" name="sort_order" class="form-control" value="0" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Status</label>
                            <select name="status" class="form-select">
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Tugas Utama</label>
                        <div id="addTasks">
                            <div class="input-group mb-2">
                                <input type="text" name="tasks[]" class="form-control" placeholder="Tugas utama 1">
                                <button type="button" class="btn btn-outline-success addTaskBtn"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                        <small class="text-muted">Klik + untuk menambah tugas baru</small>
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
                <h5 class="modal-title"><i class="bi bi-pencil-square me-2 text-warning"></i>Edit PJLP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Nama Kategori PJLP <span class="text-danger">*</span></label>
                        <input type="text" id="editTitle" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Deskripsi</label>
                        <textarea id="editDescription" name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Jumlah Personil</label>
                            <input type="number" id="editCount" name="personil_count" class="form-control" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Urutan</label>
                            <input type="number" id="editOrder" name="sort_order" class="form-control" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Status</label>
                            <select id="editStatus" name="status" class="form-select">
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Tugas Utama</label>
                        <div id="editTasks"></div>
                        <button type="button" class="btn btn-sm btn-outline-success mt-2" id="addEditTaskBtn">
                            <i class="bi bi-plus me-1"></i>Tambah Tugas
                        </button>
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
    // Add task field on add modal
    document.querySelectorAll('.addTaskBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            const container = document.getElementById('addTasks');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" name="tasks[]" class="form-control" placeholder="Tugas utama">
                <button type="button" class="btn btn-outline-danger removeTaskBtn"><i class="bi bi-trash"></i></button>
            `;
            container.appendChild(div);
            div.querySelector('.removeTaskBtn').addEventListener('click', () => div.remove());
        });
    });

    // Add task field on edit modal
    document.getElementById('addEditTaskBtn').addEventListener('click', function() {
        const container = document.getElementById('editTasks');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="tasks[]" class="form-control" placeholder="Tugas utama">
            <button type="button" class="btn btn-outline-danger removeTaskBtn"><i class="bi bi-trash"></i></button>
        `;
        container.appendChild(div);
        div.querySelector('.removeTaskBtn').addEventListener('click', () => div.remove());
    });

    // Edit button handler
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('editTitle').value = this.dataset.title;
            document.getElementById('editDescription').value = this.dataset.description;
            document.getElementById('editCount').value = this.dataset.count;
            document.getElementById('editOrder').value = this.dataset.order;
            document.getElementById('editStatus').value = this.dataset.status;
            document.getElementById('editForm').action = "<?= base_url('admin/pjlp/update') ?>/" + this.dataset.id;

            // Populate tasks
            const container = document.getElementById('editTasks');
            container.innerHTML = '';
            try {
                const tasks = JSON.parse(this.dataset.tasks);
                tasks.forEach(task => {
                    const div = document.createElement('div');
                    div.className = 'input-group mb-2';
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.name = 'tasks[]';
                    input.className = 'form-control';
                    input.value = task;
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'btn btn-outline-danger removeTaskBtn';
                    btn.innerHTML = '<i class="bi bi-trash"></i>';
                    div.appendChild(input);
                    div.appendChild(btn);
                    container.appendChild(div);
                    btn.addEventListener('click', () => div.remove());
                });
            } catch (e) {
                console.log('No tasks to parse');
            }
        });
    });

    // Auto-close modals on form submit with loading state
    document.querySelectorAll('.modal form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
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
    });
</script>

<?= $this->endSection(); ?>
