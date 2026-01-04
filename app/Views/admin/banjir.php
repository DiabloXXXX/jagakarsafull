<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>
<div class="container-xxl grow container-p-y">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show fw-bold" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card mb-6">
        <div class="card-body pt-4">

            <form action="<?= base_url('/admin/halaman/editbanjir/update') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <h5 class="fw-bold">Ubah Detail Area Rawan Banjir</h5>
                <!-- Preview gambar lama -->
                <?php if (!empty($h['peta_banjir'])) : ?>
                    <div class="mb-2">
                        <img
                            src="<?= base_url('uploads/halaman/' . $h['peta_banjir']) ?>"
                            alt="Peta Banjir"
                            class="img-thumbnail"
                            style="max-height: 200px;">
                    </div>
                <?php endif; ?>

                <!-- Input upload -->
                <input
                    type="file"
                    name="peta_banjir"
                    class="form-control"
                    accept="image/*"
                    onchange="previewImg(this)">

                <img id="preview" style="max-height:200px; display:none">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar. <span class="fw-bold">Ukuran Maks. 2MB</span></small>
                <div class="row g-6 mt-2">
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">Peringatan Banjir</label>
                        <textarea class="form-control" type="text" id="peringatan_banjir" name="peringatan_banjir" autofocus=""><?= esc($h['peringatan_banjir'] ?? '') ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Tips Keselamatan 1</label>
                        <input class="form-control" type="text" name="tips1" id="" value="<?= esc($h['tips1'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Tips Keselamatan 2</label>
                        <input class="form-control" type="text" name="tips2" id="" value="<?= esc($h['tips2'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Tips Keselamatan 3</label>
                        <input class="form-control" type="text" name="tips3" id="" value="<?= esc($h['tips3'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Tips Keselamatan 4</label>
                        <input class="form-control" type="text" name="tips4" id="" value="<?= esc($h['tips4'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Area Rawan Banjir 1</label>
                        <input class="form-control" type="text" name="area1" id="" value="<?= esc($h['area1'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Area Rawan Banjir 2</label>
                        <input class="form-control" type="text" name="area2" id="" value="<?= esc($h['area2'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Area Rawan Banjir 3</label>
                        <input class="form-control" type="text" name="area3" id="" value="<?= esc($h['area3'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Deskripsi Area Rawan Banjir 1</label>
                        <input class="form-control" type="text" name="desk1" id="" value="<?= esc($h['desk1'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Deskripsi Area Rawan Banjir 2</label>
                        <input class="form-control" type="text" name="desk2" id="" value="<?= esc($h['desk2'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Deskripsi Area Rawan Banjir 3</label>
                        <input class="form-control" type="text" name="desk3" id="" value="<?= esc($h['desk3'] ?? '') ?>">
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary me-3">Simpan</button>
                    <a href="<?= base_url('/admin/halaman') ?>" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function previewImg(input) {
        const img = document.getElementById('preview');
        img.src = URL.createObjectURL(input.files[0]);
        img.style.display = 'block';
    }
</script>
<?= $this->endSection(); ?>