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
            <h1 class="display-4 text-primary">Struktur Organisasi</h1>
            <h5>Pemerintahan Kelurahan</h5>
        </div>
        <div class="visi-misi-wrapper">

            <!-- Card Visi -->
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <img class="img-fluid h-100" src="<?= $h['gambar_struktur']
                                                                    ? base_url('uploads/halaman/' . $h['gambar_struktur'])
                                                                    : base_url('img/price-1.jpg') ?>" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Misi -->
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4 text-dark fw-bold">
                            <h4>Penjelasan Struktur</h4>
                            <p class="my-3">
                            <div class="mb-2">
                                <span class="text-primary">Lurah</span> - Memimpin dan mengoordinasikan seluruh kegiatan pemerintahan kelurahan.
                                <br>
                            </div>
                            <div class="mb-2">
                                <span class="text-primary">Sekretaris Kelurahan</span> - Menangani administrasi, keuangan, dan kepegawaian.
                                <br>
                            </div>
                            <div class="mb-2">
                                <span class="text-primary">Seksi Pemerintahan</span> - Mengelola urusan pemerintahan dan ketentraman.
                                <br>
                            </div>
                            <div class="mb-2">
                                <span class="text-primary">Seksi Ekonomi & Pembangunan </span> - Mengelola urusan ekonomi dan pembangunan.
                                <br>
                            </div>
                            <div class="mb-2">
                                <span class="text-primary">Seksi Kesejahteraan Rakyat </span> - Mengelola urusan kesejahteraan dan sosial.
                                <br>
                            </div>
                            </p>
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