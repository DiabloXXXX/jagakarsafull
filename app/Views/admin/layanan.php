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

            <form id="#" action="<?= base_url('/admin/editlayanan/update') ?>" method="POST">
                <h5 class="fw-bold">Edit Detail Layanan</h5>
                <div class="row g-6">
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Link Pelayanan</label>
                        <input class="form-control" type="text" name="link" id="" value="<?= esc($h['link'] ?? '') ?>">
                        <small class="text-muted">Tidak usah pakai https, contoh : bit.ly/pelayanankelurahanjagakarsa</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">No. Telepon Pelayanan</label>
                        <input class="form-control" type="text" name="notelp" id="" value="<?= esc($h['notelp'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Email Pelayanan</label>
                        <input class="form-control" type="text" name="email" id="" value="<?= esc($h['email'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Alamat Pelayanan</label>
                        <input class="form-control" type="text" name="alamat" id="" value="<?= esc($h['alamat'] ?? '') ?>">
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" class="btn btn-primary me-3">Simpan</button>
                    <a href="<?= base_url('/halaman') ?>" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>