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
            <h1 class="display-4 text-primary">PJLP</h1>
            <h2>Petugas Jaga Lingkungan Permukiman</h2>
            <p>Tim profesional yang berkomitmen menjaga kebersihan, keindahan, dan kualitas lingkungan permukiman di Kelurahan Jagakarsa</p>
        </div>
        <div class="visi-misi-wrapper">

            <!-- Card Visi -->
            <div class="team-item card-custom mb-5">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>PPSU (Petugas Pengelola Sarana Umum)</h4>
                            <p class="m-0">
                                Petugas yang bertugas mengelola, memelihara, dan menjaga sarana umum di wilayah Kelurahan Jagakarsa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>PerPetra (Perangkat Perumahan dan Permukiman)</h4>
                            <p class="m-0">
                                Perangkat yang menangani urusan perumahan, permukiman, dan lingkungan hidup.
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