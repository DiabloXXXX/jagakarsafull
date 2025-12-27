<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center text-lg-center">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5"
                    style="border-color: rgba(256, 256, 256, .3) !important;">Selamat Datang</h5>
                <h1 class="display-1 text-white mb-md-4">Website Resmi Kelurahan Jagakarsa</h1>
                <div class="pt-2">
                    <a href="#about" class="btn btn-salman-oren rounded-pill py-md-3 px-md-5 mx-2">Lihat Beranda</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-fluid py-5" id="about">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded" src="img/hero-beranda.jpg"
                        style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mb-4">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Tentang Kelurahan</h5>
                    <h1 class="display-4">Kelurahan Jagakarsa</h1>
                </div>
                <p>
                    Kelurahan Jagakarsa merupakan salah satu Kelurahan yang berada di Kecamatan
                    Jagakarsa Kota Administrasi Jakarta Selatan yang memiliki luas sebesar :
                    4,850,000 m² serta mempunyai 7 RW dan 82 RT.
                </p>
                <p>
                    Kelurahan Jagakarsa sebagai instansi pemerintah yang melayani masyarakat
                    harus menjalankan fungsi dengan sebaik-baiknya. Karena standar organisasi
                    dan kinerja Kelurahan telah diatur oleh Undang-undang serta peraturan yang ada.
                    Untuk itu, sebagai pertanggungjawaban dari hasil kegiatan dan pelayanan yang dilakukan.
                </p>
                <!-- <div class="row g-3 pt-3">
                    <div class="col-sm-3 col-6">
                        <div class="bg-light text-center rounded-circle py-4">
                            <i class="fa fa-3x fa-user-md text-primary mb-3"></i>
                            <h6 class="mb-0">Qualified<small class="d-block text-primary">Doctors</small></h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="bg-light text-center rounded-circle py-4">
                            <i class="fa fa-3x fa-procedures text-primary mb-3"></i>
                            <h6 class="mb-0">Emergency<small class="d-block text-primary">Services</small></h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="bg-light text-center rounded-circle py-4">
                            <i class="fa fa-3x fa-microscope text-primary mb-3"></i>
                            <h6 class="mb-0">Accurate<small class="d-block text-primary">Testing</small></h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="bg-light text-center rounded-circle py-4">
                            <i class="fa fa-3x fa-ambulance text-primary mb-3"></i>
                            <h6 class="mb-0">Free<small class="d-block text-primary">Ambulance</small></h6>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Appointment Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Batas Wilayah</h5>
                    <h1 class="display-4 text-success">Batas Wilayah Kelurahan Jagakarsa</h1>
                </div>
                <p class="text-white mb-5">
                    Utara :
                    <br>Kelurahan Ragunan, Kelurahan Cilandak Timur dan Kelurahan Kebagusan.
                    <br><br>
                    Selatan :
                    <br>Kelurahan Ciganjur dan Kelurahan Srenseng Sawah.
                    <br><br>
                    Timur :
                    <br>Kelurahan Lenteng Agung.
                    <br><br>
                    Barat :
                    <br>Kelurahan Pondok Labu dan Kecamatan Sawangan Kota Depok.
                </p>
                <a class="btn btn-salman-oren rounded-pill py-3 px-5" href="#!">Lihat di Google Maps</a>
            </div>
            <div class="col-lg-6">
                <div class="bg-transparant text-center rounded p-2">
                    <img class="img-fluid h-100" src="img/map-kelurahan-jagakarsa.png" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

<!-- Pricing Plan Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Prestasi</h5>
            <h1 class="display-4">Prestasi Kelurahan Jagakarsa</h1>
        </div>
        <div class="owl-carousel price-carousel position-relative d-flex justify-content-center" style="padding: 0 45px 45px 45px;">
            <?php foreach ($prestasi as $p): ?>
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="<?= $p['gambar']
                                                                    ? base_url('uploads/prestasi/' . $p['gambar'])
                                                                    : base_url('img/price-1.jpg') ?>" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                            style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-white"><?= $p['judul'] ?></h3>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p class="text-dark"><?= $p['judul'] ?></p>
                        <p><?= date('d F Y', strtotime($p['created_at'])) ?></p>
                        <a href="#!" class="btn btn-salman-oren rounded-pill py-3 px-5 my-2">Lihat Selengkapnya</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-12 mt-5">
            <a href="<?= base_url('') ?>?>" class="btn btn-primary py-3" type="submit"><i class="fa fa-arrow-left text-light me-3"></i>Kembali</a>
        </div>
    </div>

</div>
<!-- Pricing Plan End -->

<?= $this->endSection(); ?>