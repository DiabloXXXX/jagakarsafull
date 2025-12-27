<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<style>
    .visi-misi-wrapper {
        width: 100%;
    }

    .card-custom {
        transition: 0.2s ease;
    }

    .card-custom:hover {
        transform: translateY(-3px);
    }
</style>

<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h1 class="text-dark">Area Rawan Banjir</h1>
        </div>
        <div class="visi-misi-wrapper">

            <!-- Card Visi -->
            <div class="team-item card-custom mb-4 bg-transparant justify-content-center d-flex">
                <div class="col-lg-8">
                    <div class="bg-transparant text-center rounded p-2">
                        <img class="img-fluid h-100" src="<?= $h['peta_banjir']
                                                                ? base_url('uploads/halaman/' . $h['peta_banjir'])
                                                                : base_url('img/peta-banjir.png') ?>" style="object-fit: cover;">
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="team-item card-custom mb-3 col-lg-5 me-3">
                    <div class="row bg-danger rounded overflow-hidden h-auto shadow-sm">
                        <div class="col-12 d-flex flex-column">
                            <div class="p-4">
                                <h4 class="text-center text-white">Peringatan Banjir</h4>
                                <p></p>
                                <br>
                                <p class="text-white"><?= $h['peringatan_banjir'] ?></p>
                                <br>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-item card-custom mb-3 col-lg-5 me-3">
                    <div class="row bg-info rounded overflow-hidden h-auto shadow-sm">
                        <div class="col-12 d-flex flex-column">
                            <div class="p-4 text-white">
                                <h4 class="text-center">Tips Keselamatan</h4>
                                <p><i class="fas fa-check text-success me-3"></i><?= $h['tips1'] ?></p>
                                <p><i class="fas fa-check text-success me-3"></i><?= $h['tips2'] ?></p>
                                <p><i class="fas fa-check text-success me-3"></i><?= $h['tips3'] ?></p>
                                <p><i class="fas fa-check text-success me-3"></i><?= $h['tips4'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4 class="mb-3">Area Rawan Banjir</h4>
                            <div class="bg-white rounded p-2 mb-2">
                                <h5 class="text-success"><?= $h['area1'] ?></h5>
                                <p><?= $h['desk1'] ?></p>
                            </div>
                            <div class="bg-white rounded p-2 mb-2">
                                <h5 class="text-success"><?= $h['area2'] ?></h5>
                                <p><?= $h['desk2'] ?></p>
                            </div>
                            <div class="bg-white rounded p-2">
                                <h5 class="text-success"><?= $h['area3'] ?></h5>
                                <p><?= $h['desk3'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4 class="mb-3">Hubungi Kami Saat Darurat</h4>
                            <p class="text-dark"><i class="fa fa-phone me-3"></i>Telepon <?= $h['notelp'] ?></p>
                            <p class="text-dark"><i class="fa fa-envelope me-3"></i>Email <?= $h['email'] ?></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-5">
            <a href="<?= base_url('') ?>" class="btn btn-primary py-3" type="submit"><i class="fa fa-arrow-left text-light me-3"></i>Kembali</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>