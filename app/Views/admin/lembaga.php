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

            <form id="#" action="<?= base_url('/admin/editlembaga/update') ?>" method="POST">
                <h5 class="fw-bold">Edit Jumlah Anggota Lembaga</h5>
                <div class="row g-6">
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">FKDM (Forum Kewaspadaan Dini Masyarakat)</label>
                        <input class="form-control" type="text" name="fdkm" id="" value="<?= esc($h['fdkm'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">LMK (Lembaga Musyawarah Kelurahan)</label>
                        <input class="form-control" type="text" name="lmk" id="" value="<?= esc($h['lmk'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">RW (Rukun Warga)</label>
                        <input class="form-control" type="text" name="rw" id="" value="<?= esc($h['rw'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">RT (Rukun Tetangga)</label>
                        <input class="form-control" type="text" name="rt" id="" value="<?= esc($h['rt'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">PKK Kelurahan</label>
                        <input class="form-control" type="text" name="pkk" id="" value="<?= esc($h['pkk'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Jumantik (Juru Pemantau Jentik)</label>
                        <input class="form-control" type="text" name="jumantik" id="" value="<?= esc($h['jumantik'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Dasawisma</label>
                        <input class="form-control" type="text" name="dasawisma" id="" value="<?= esc($h['dasawisma'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Posyandu Balita</label>
                        <input class="form-control" type="text" name="posyandu_bal" id="" value="<?= esc($h['posyandu_bal'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Posyandu Lansia</label>
                        <input class="form-control" type="text" name="posyandu_lan" id="" value="<?= esc($h['posyandu_lan'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Total Organisasi</label>
                        <input class="form-control" type="text" name="total_organ" id="" value="<?= esc($h['total_organ'] ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Total Anggota Aktif</label>
                        <input class="form-control" type="text" name="total_anggota" id="" value="<?= esc($h['total_anggota'] ?? '') ?>">
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