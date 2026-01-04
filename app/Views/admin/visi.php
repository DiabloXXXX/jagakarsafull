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

            <form id="visiForm" action="<?= base_url('/admin/halaman/editvisi/update') ?>" method="POST">
                <?= csrf_field() ?>
                <h5 class="fw-bold">Edit Visi & Misi</h5>
                <div class="row g-6">
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">Visi</label>
                        <textarea class="form-control" type="text" id="visi" name="visi" autofocus=""><?= esc($h['visi'] ?? '') ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Misi 1</label>
                        <input class="form-control" type="text" name="misi" id="" value="<?= esc($h['misi'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Misi 2</label>
                        <input class="form-control" type="text" name="misi2" id="" value="<?= esc($h['misi2'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Misi 3</label>
                        <input class="form-control" type="text" name="misi3" id="" value="<?= esc($h['misi3'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Misi 4</label>
                        <input class="form-control" type="text" name="misi4" id="" value="<?= esc($h['misi4'] ?? '') ?>">
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary me-3 px-4 shadow-sm fw-bold">Simpan Perubahan</button>
                    <a href="<?= base_url('/admin/halaman') ?>" class="btn btn-outline-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>