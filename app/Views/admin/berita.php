<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="container-xxl grow container-p-y">
    <h5 class="pb-1 mb-6 fw-bold text-primary">Kelola Berita</h5>
    <button type="button" class="btn btn- btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#tambahBerita"><i class="bx bx-plus fw-bold me-2"></i>Tambah Berita Baru</button>
    <div class="row mb-12 g-6 mt-4">
        <div class="col-lg-12 col-12 col-md-12">
            <?php foreach ($berita as $b): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">
                            <div class="avatar shrink-0">
                                <img src="<?= base_url('') ?>/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                            </div>
                            <span class="text-dark fw-bold mx-3"><?= esc($b['judul']) ?></span>
                        </div>
                        <ul class="list-inline mt-2">
                            <li class="list-inline-item"><i class="bx bx-calendar"></i><?= date('d M Y', strtotime($b['created_at'])) ?></li>
                            <li class="list-inline-item"><i class="bx bx-user"></i>Admin</li>

                            <?php if ($b['status'] == 'publish'): ?>
                                <li class="list-inline-item bg-success rounded-pill px-2 text-white fw-bold" style="font-size:10pt;">Dipublikasikan</li>
                            <?php else: ?>
                                <li class="list-inline-item bg-warning rounded-pill px-2 text-white fw-bold" style="font-size:10pt;">Draft</li>
                            <?php endif; ?>
                        </ul>
                        <div class="justify-content-end d-flex">
                            <button class="btn btn-sm btn-warning me-2 my-2 fw-bold text-white editBtn"
                                data-id="<?= $b['id'] ?>"
                                data-judul="<?= esc($b['judul']) ?>"
                                data-konten="<?= esc($b['konten']) ?>"
                                data-status="<?= $b['status'] ?>"
                                data-gambar="<?= $b['gambar'] ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal"><i class='bx bx-edit'></i>
                            </button>

                            <a href="<?= base_url('admin/berita/delete/' . $b['id']) ?>" onclick="return confirm('Hapus berita ini?')" class="btn btn-sm btn-danger me-2 my-2 fw-bold text-white">
                                <i class='bx bx-trash'></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<!-- INI MODAL TAMBAH -->
<div class="modal fade" id="tambahBerita" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Tambah Berita Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/berita/store') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-6">
                            <label for="nameWithTitle" class="form-label">Judul Berita</label>
                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukkan Judul Berita" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col mb-6">
                            <label for="nameWithTitle" class="form-label">Konten Berita</label>
                            <textarea type="text" id="konten" name="konten" class="form-control" placeholder="Masukkan Konten Berita"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col mb-6">
                            <label for="nameWithTitle" class="form-label">Gambar Berita</label>
                            <input class="form-control" type="file" id="gambar" name="gambar">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col mb-6">
                            <label for="nameWithTitle" class="form-label">Status Berita</label>
                            <select id="status" name="status" class="form-select">
                                <option>Pilih Status</option>
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Tambah Berita</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- INI MODAL EDIT -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Edit Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-6">
                            <label for="nameWithTitle" class="form-label">Judul Berita</label>
                            <input type="text" id="editJudul" name="judul" class="form-control" placeholder="Masukkan Judul Berita" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col mb-6">
                            <label for="nameWithTitle" class="form-label">Konten Berita</label>
                            <textarea type="text" id="editKonten" name="konten" class="form-control" placeholder="Masukkan Konten Berita"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col mb-6">
                            <label for="nameWithTitle" class="form-label">Gambar Berita</label>
                            <img id="previewGambar" class="img-fluid mb-2">
                            <input class="form-control" type="file" id="gambar" name="gambar">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col mb-6">
                            <label for="nameWithTitle" class="form-label">Status Berita</label>
                            <select id="editStatus" name="status" class="form-select">
                                <option>Pilih Status</option>
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Update Berita</button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('editJudul').value = this.dataset.judul;
            document.getElementById('editKonten').value = this.dataset.konten;
            document.getElementById('editStatus').value = this.dataset.status;

            document.getElementById('editForm').action =
                "<?= base_url('admin/berita/update') ?>/" + this.dataset.id;

            if (this.dataset.gambar) {
                document.getElementById('previewGambar').src =
                    "<?= base_url('uploads/berita') ?>/" + this.dataset.gambar;
            }
        });
    });
</script>

<?= $this->endSection(); ?>