<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1"><i class="bi bi-robot me-2 text-primary"></i>Kelola FAQ Chatbot</h4>
            <p class="text-muted mb-0">Kelola pertanyaan dan jawaban untuk chatbot asisten virtual</p>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="bi bi-plus-lg me-1"></i> Tambah FAQ
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

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 bg-primary bg-opacity-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-primary bg-opacity-25 p-3 me-3">
                            <i class="bi bi-chat-dots-fill text-primary fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 text-primary"><?= count($faqs) ?></h3>
                            <small class="text-muted">Total FAQ</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 bg-success bg-opacity-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-success bg-opacity-25 p-3 me-3">
                            <i class="bi bi-check-circle-fill text-success fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 text-success"><?= count(array_filter($faqs, fn($f) => $f['status'] === 'active')) ?></h3>
                            <small class="text-muted">Aktif</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 bg-warning bg-opacity-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-warning bg-opacity-25 p-3 me-3">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 text-warning"><?= count(array_filter($faqs, fn($f) => $f['is_featured'])) ?></h3>
                            <small class="text-muted">Featured</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 bg-info bg-opacity-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-info bg-opacity-25 p-3 me-3">
                            <i class="bi bi-folder-fill text-info fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 text-info"><?= count($grouped) ?></h3>
                            <small class="text-muted">Kategori</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ List by Category -->
    <?php if (empty($faqs)): ?>
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="bi bi-chat-left-text text-muted" style="font-size: 4rem;"></i>
                <h5 class="mt-3 text-muted">Belum ada FAQ</h5>
                <p class="text-muted">Klik tombol "Tambah FAQ" untuk menambahkan pertanyaan dan jawaban chatbot.</p>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($grouped as $category => $items): ?>
            <div class="card mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-folder2-open me-2 text-primary"></i><?= esc($category) ?>
                        <span class="badge bg-primary ms-2"><?= count($items) ?></span>
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px;">Icon</th>
                                    <th>Pertanyaan</th>
                                    <th>Keywords</th>
                                    <th style="width: 100px;">Featured</th>
                                    <th style="width: 100px;">Status</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $faq): ?>
                                    <tr>
                                        <td class="text-center fs-4"><?= $faq['icon'] ?></td>
                                        <td>
                                            <strong><?= esc($faq['question']) ?></strong>
                                            <div class="text-muted small mt-1"><?= esc(substr(strip_tags($faq['answer']), 0, 80)) ?>...</div>
                                        </td>
                                        <td>
                                            <?php 
                                            $keywords = array_slice(explode(',', $faq['keywords']), 0, 3);
                                            foreach ($keywords as $kw): 
                                            ?>
                                                <span class="badge bg-light text-dark me-1"><?= esc(trim($kw)) ?></span>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <form action="<?= base_url('admin/chatbot/toggle-featured/' . $faq['id']) ?>" method="post" style="display: inline;">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-sm <?= $faq['is_featured'] ? 'btn-warning' : 'btn-outline-secondary' ?>">
                                                    <i class="bi bi-star<?= $faq['is_featured'] ? '-fill' : '' ?>"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="<?= base_url('admin/chatbot/toggle-status/' . $faq['id']) ?>" method="post" style="display: inline;">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="badge <?= $faq['status'] === 'active' ? 'bg-success' : 'bg-secondary' ?>" 
                                                   style="cursor: pointer; border: none;">
                                                    <?= $faq['status'] === 'active' ? 'Aktif' : 'Nonaktif' ?>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-warning editBtn"
                                                data-id="<?= $faq['id'] ?>"
                                                data-category="<?= esc($faq['category']) ?>"
                                                data-question="<?= esc($faq['question']) ?>"
                                                data-keywords="<?= esc($faq['keywords']) ?>"
                                                data-answer="<?= esc($faq['answer']) ?>"
                                                data-icon="<?= esc($faq['icon']) ?>"
                                                data-order="<?= $faq['sort_order'] ?>"
                                                data-featured="<?= $faq['is_featured'] ?>"
                                                data-status="<?= $faq['status'] ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <form action="<?= base_url('admin/chatbot/delete/' . $faq['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus FAQ ini?')">
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
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Tips Card -->
    <div class="card border-info">
        <div class="card-body">
            <h6 class="card-title text-info"><i class="bi bi-lightbulb me-2"></i>Tips Penggunaan</h6>
            <ul class="mb-0 small">
                <li><strong>Keywords:</strong> Pisahkan dengan koma (,). Contoh: <code>jam, buka, operasional, waktu</code></li>
                <li><strong>Featured:</strong> FAQ yang ditandai featured akan muncul sebagai saran cepat di chatbot</li>
                <li><strong>Answer:</strong> Gunakan format HTML sederhana seperti &lt;br&gt; untuk baris baru</li>
            </ul>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-4">
        <a href="<?= base_url('/admin') ?>" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
        </a>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-plus-circle me-2 text-primary"></i>Tambah FAQ Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/chatbot/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="form-label fw-medium">Kategori</label>
                            <input type="text" name="category" class="form-control" list="categoryList" placeholder="Contoh: Layanan, Informasi, Dokumen" value="Umum">
                            <datalist id="categoryList">
                                <option value="Informasi Umum">
                                <option value="Jam Operasional">
                                <option value="Layanan Dokumen">
                                <option value="Persyaratan">
                                <option value="Kontak">
                            </datalist>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Icon</label>
                            <input type="text" name="icon" class="form-control text-center" value="" placeholder="Icon (opsional)">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Pertanyaan <span class="text-danger">*</span></label>
                        <input type="text" name="question" class="form-control" placeholder="Contoh: Jam operasional kelurahan" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Keywords <span class="text-danger">*</span></label>
                        <input type="text" name="keywords" class="form-control" placeholder="jam, buka, operasional, waktu (pisahkan dengan koma)" required>
                        <small class="text-muted">Keywords digunakan untuk mencocokkan pertanyaan pengguna</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Jawaban <span class="text-danger">*</span></label>
                        <textarea name="answer" class="form-control" rows="5" placeholder="Jawaban chatbot. Bisa menggunakan HTML seperti <br> untuk baris baru." required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Urutan</label>
                            <input type="number" name="sort_order" class="form-control" value="0" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Status</label>
                            <select name="status" class="form-select">
                                <option value="active">Aktif</option>
                                <option value="inactive">Nonaktif</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium d-block">Featured</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="addFeatured">
                                <label class="form-check-label" for="addFeatured">Tampilkan di saran</label>
                            </div>
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
                <h5 class="modal-title"><i class="bi bi-pencil-square me-2 text-warning"></i>Edit FAQ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="form-label fw-medium">Kategori</label>
                            <input type="text" id="editCategory" name="category" class="form-control" list="categoryListEdit">
                            <datalist id="categoryListEdit">
                                <option value="Informasi Umum">
                                <option value="Jam Operasional">
                                <option value="Layanan Dokumen">
                                <option value="Persyaratan">
                                <option value="Kontak">
                            </datalist>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Icon</label>
                            <input type="text" id="editIcon" name="icon" class="form-control text-center">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Pertanyaan <span class="text-danger">*</span></label>
                        <input type="text" id="editQuestion" name="question" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Keywords <span class="text-danger">*</span></label>
                        <input type="text" id="editKeywords" name="keywords" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Jawaban <span class="text-danger">*</span></label>
                        <textarea id="editAnswer" name="answer" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Urutan</label>
                            <input type="number" id="editOrder" name="sort_order" class="form-control" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Status</label>
                            <select id="editStatus" name="status" class="form-select">
                                <option value="active">Aktif</option>
                                <option value="inactive">Nonaktif</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium d-block">Featured</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="editFeatured">
                                <label class="form-check-label" for="editFeatured">Tampilkan di saran</label>
                            </div>
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
    // Edit button handler
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('editCategory').value = this.dataset.category;
            document.getElementById('editQuestion').value = this.dataset.question;
            document.getElementById('editKeywords').value = this.dataset.keywords;
            document.getElementById('editAnswer').value = this.dataset.answer;
            document.getElementById('editIcon').value = this.dataset.icon;
            document.getElementById('editOrder').value = this.dataset.order;
            document.getElementById('editStatus').value = this.dataset.status;
            document.getElementById('editFeatured').checked = this.dataset.featured === '1';
            document.getElementById('editForm').action = "<?= base_url('admin/chatbot/update') ?>/" + this.dataset.id;
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
