<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>
<div class="container-xxl grow container-p-y">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <div class="card mb-6">
        <div class="card-body pt-4">
            <h5 class="fw-bold">Profile Details</h5>
            <form method="POST" action="<?= base_url('admin/user/update/' . $user['id']) ?>">
                <?= csrf_field() ?>
                <div class="row g-6">
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">Username</label>
                        <input class="form-control" type="text" id="firstName" name="username" value="<?= esc($user['username']) ?>" autofocus="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" name="nama" id="lastName" value="<?= esc($user['nama']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Jabatan</label>
                        <input class="form-control" type="text" name="jabatan" id="lastName" value="<?= esc($user['jabatan']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">No. Telepon</label>
                        <input class="form-control" type="text" name="notelp" id="lastName" value="<?= esc($user['notelp']) ?>">
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" class="btn btn-primary me-3">Simpan</button>
                    <button type="reset" class="btn btn-outline-danger">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body pt-4">
            <h5 class="fw-bold">Statistik Pengunjung</h5>
            <form id="formAccountSettings" method="POST" onsubmit="return false">
                <div class="row g-6">
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">Total Pengunjung</label>
                        <input class="form-control" type="text" id="firstName" name="firstName" value="salmanskuy" autofocus="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Penngunjung Bulanan</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" value="Muhammad Salman">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Tanggal Update Terakhir</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" value="Admin">
                    </div>
                </div>
                <div class="alert alert-secondary alert-dismissible text-dark" role="alert">
                    <span class="fw-bold">Catatan :</span> Statistik pengunjung per-perangkat dihitung otomatis dari localStorage dan tidak dapat diubah di sini.
                    Untuk integrasi dengan backend atau Google Analytics yang sebenarnya, hubungi developer.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="mt-6">
                    <button type="submit" class="btn btn-primary me-3">Perbarui Statistik</button>
                    <button type="reset" class="btn btn-outline-danger">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>