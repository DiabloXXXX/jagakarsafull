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
                        <img class="img-fluid h-100" src="img/peta-banjir.png" style="object-fit: cover;">
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
                                <p class="text-white">Kelurahan Jagakarsa memiliki beberapa area yang rawan terhadap banjir, terutama pada musim hujan. Masyarakat diharapkan untuk selalu waspada dan mengikuti instruksi dari pemerintah kelurahan.</p>
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
                                <p><i class="fas fa-check text-success me-3"></i>Siapkan tas darurat berisi dokumen penting</p>
                                <p><i class="fas fa-check text-success me-3"></i>Ketahui rute evakuasi terdekat</p>
                                <p><i class="fas fa-check text-success me-3"></i>Pantau informasi cuaca dan peringatan banjir</p>
                                <p><i class="fas fa-check text-success me-3"></i>Hubungi petugas jika ada keadaan darurat</p>
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
                                <h5 class="text-success">RT 01 - RT 03 (RW 01)</h5>
                                <p>Area dekat dengan saluran drainase utama, rawan banjir saat curah hujan tinggi</p>
                            </div>
                            <div class="bg-white rounded p-2 mb-2">
                                <h5 class="text-success">RT 01 - RT 03 (RW 01)</h5>
                                <p>Lokasi yang lebih rendah, sering tergenang air pada musim hujan</p>
                            </div>
                            <div class="bg-white rounded p-2">
                                <h5 class="text-success">RT 01 - RT 03 (RW 01)</h5>
                                <p>Area pemukiman padat yang memerlukan perhatian khusus dalam penanganan banjir</p>
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
                            <p class="text-dark"><i class="fa fa-phone me-3"></i>Telepon 021-7270954</p>
                            <p class="text-dark"><i class="fa fa-envelope me-3"></i>Email kel_jagakarsa@jakarta.go.id</p>

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