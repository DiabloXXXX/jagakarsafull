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

<!-- Services Start -->
<!-- <div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Services</h5>
            <h1 class="display-4">Excellent Medical Services</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div
                    class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="service-icon mb-4">
                        <i class="fa fa-2x fa-user-md text-white"></i>
                    </div>
                    <h4 class="mb-3">Emergency Care</h4>
                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo
                        elitr dolor amet sit</p>
                    <a class="btn btn-lg btn-primary rounded-pill" href="#!">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div
                    class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="service-icon mb-4">
                        <i class="fa fa-2x fa-procedures text-white"></i>
                    </div>
                    <h4 class="mb-3">Operation & Surgery</h4>
                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo
                        elitr dolor amet sit</p>
                    <a class="btn btn-lg btn-primary rounded-pill" href="#!">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div
                    class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="service-icon mb-4">
                        <i class="fa fa-2x fa-stethoscope text-white"></i>
                    </div>
                    <h4 class="mb-3">Outdoor Checkup</h4>
                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo
                        elitr dolor amet sit</p>
                    <a class="btn btn-lg btn-primary rounded-pill" href="#!">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div
                    class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="service-icon mb-4">
                        <i class="fa fa-2x fa-ambulance text-white"></i>
                    </div>
                    <h4 class="mb-3">Ambulance Service</h4>
                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo
                        elitr dolor amet sit</p>
                    <a class="btn btn-lg btn-primary rounded-pill" href="#!">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div
                    class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="service-icon mb-4">
                        <i class="fa fa-2x fa-pills text-white"></i>
                    </div>
                    <h4 class="mb-3">Medicine & Pharmacy</h4>
                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo
                        elitr dolor amet sit</p>
                    <a class="btn btn-lg btn-primary rounded-pill" href="#!">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div
                    class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="service-icon mb-4">
                        <i class="fa fa-2x fa-microscope text-white"></i>
                    </div>
                    <h4 class="mb-3">Blood Testing</h4>
                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo
                        elitr dolor amet sit</p>
                    <a class="btn btn-lg btn-primary rounded-pill" href="#!">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Services End -->

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
                                                                    ? base_url('uploads/berita/' . $p['gambar'])
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

<!-- Team Start -->
<!-- <div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our Doctors</h5>
            <h1 class="display-4">Qualified Healthcare Professionals</h1>
        </div>
        <div class="owl-carousel team-carousel position-relative">
            <div class="team-item">
                <div class="row g-0 bg-light rounded overflow-hidden">
                    <div class="col-12 col-sm-5 h-100">
                        <img class="img-fluid h-100" src="img/team-1.jpg" style="object-fit: cover;">
                    </div>
                    <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                        <div class="mt-auto p-4">
                            <h3>Doctor Name</h3>
                            <h6 class="fw-normal fst-italic text-primary mb-4">Cardiology Specialist</h6>
                            <p class="m-0">Dolor lorem eos dolor duo eirmod sea. Dolor sit magna rebum clita rebum
                                dolor</p>
                        </div>
                        <div class="d-flex mt-auto border-top p-4">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#!"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#!"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#!"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item">
                <div class="row g-0 bg-light rounded overflow-hidden">
                    <div class="col-12 col-sm-5 h-100">
                        <img class="img-fluid h-100" src="img/team-2.jpg" style="object-fit: cover;">
                    </div>
                    <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                        <div class="mt-auto p-4">
                            <h3>Doctor Name</h3>
                            <h6 class="fw-normal fst-italic text-primary mb-4">Cardiology Specialist</h6>
                            <p class="m-0">Dolor lorem eos dolor duo eirmod sea. Dolor sit magna rebum clita rebum
                                dolor</p>
                        </div>
                        <div class="d-flex mt-auto border-top p-4">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#!"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#!"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#!"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item">
                <div class="row g-0 bg-light rounded overflow-hidden">
                    <div class="col-12 col-sm-5 h-100">
                        <img class="img-fluid h-100" src="img/team-3.jpg" style="object-fit: cover;">
                    </div>
                    <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                        <div class="mt-auto p-4">
                            <h3>Doctor Name</h3>
                            <h6 class="fw-normal fst-italic text-primary mb-4">Cardiology Specialist</h6>
                            <p class="m-0">Dolor lorem eos dolor duo eirmod sea. Dolor sit magna rebum clita rebum
                                dolor</p>
                        </div>
                        <div class="d-flex mt-auto border-top p-4">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#!"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#!"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#!"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Team End -->

<!-- Search Start -->
<!-- <div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Find A Doctor</h5>
            <h1 class="display-4 mb-4">Find A Healthcare Professionals</h1>
            <h5 class="text-white fw-normal">Duo ipsum erat stet dolor sea ut nonumy tempor. Tempor duo lorem eos
                sit sed ipsum takimata ipsum sit est. Ipsum ea voluptua ipsum sit justo</h5>
        </div>
        <div class="mx-auto" style="width: 100%; max-width: 600px;">
            <div class="input-group">
                <select class="form-select border-primary w-25" style="height: 60px;">
                    <option selected>Department</option>
                    <option value="1">Department 1</option>
                    <option value="2">Department 2</option>
                    <option value="3">Department 3</option>
                </select>
                <input type="text" class="form-control border-primary w-50" placeholder="Keyword">
                <button class="btn btn-dark border-0 w-25">Search</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Search End -->


<!-- Testimonial Start -->
<!-- <div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Testimonial</h5>
            <h1 class="display-4">Patients Say About Our Services</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item text-center">
                        <div class="position-relative mb-5">
                            <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-1.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-quote-left fa-2x text-primary"></i>
                            </div>
                        </div>
                        <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore
                            dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor
                            erat. Erat dolor rebum sit ipsum.</p>
                        <hr class="w-25 mx-auto">
                        <h3>Patient Name</h3>
                        <h6 class="fw-normal text-primary mb-3">Profession</h6>
                    </div>
                    <div class="testimonial-item text-center">
                        <div class="position-relative mb-5">
                            <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-2.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-quote-left fa-2x text-primary"></i>
                            </div>
                        </div>
                        <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore
                            dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor
                            erat. Erat dolor rebum sit ipsum.</p>
                        <hr class="w-25 mx-auto">
                        <h3>Patient Name</h3>
                        <h6 class="fw-normal text-primary mb-3">Profession</h6>
                    </div>
                    <div class="testimonial-item text-center">
                        <div class="position-relative mb-5">
                            <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-3.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-quote-left fa-2x text-primary"></i>
                            </div>
                        </div>
                        <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore
                            dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor
                            erat. Erat dolor rebum sit ipsum.</p>
                        <hr class="w-25 mx-auto">
                        <h3>Patient Name</h3>
                        <h6 class="fw-normal text-primary mb-3">Profession</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Testimonial End -->


<!-- Blog Start -->
<!-- <div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Blog Post</h5>
            <h1 class="display-4">Our Latest Medical Blog Posts</h1>
        </div>
        <div class="row g-5">
            <div class="col-xl-4 col-lg-6">
                <div class="bg-light rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                    <div class="p-4">
                        <a class="h3 d-block mb-3" href="#!">Dolor clita vero elitr sea stet dolor justo diam</a>
                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                            rebum clita rebum dolor stet amet justo</p>
                    </div>
                    <div class="d-flex justify-content-between border-top p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25" alt="">
                            <small>John Doe</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>12345</small>
                            <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>123</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="bg-light rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/blog-2.jpg" alt="">
                    <div class="p-4">
                        <a class="h3 d-block mb-3" href="#!">Dolor clita vero elitr sea stet dolor justo diam</a>
                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                            rebum clita rebum dolor stet amet justo</p>
                    </div>
                    <div class="d-flex justify-content-between border-top p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25" alt="">
                            <small>John Doe</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>12345</small>
                            <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>123</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="bg-light rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/blog-3.jpg" alt="">
                    <div class="p-4">
                        <a class="h3 d-block mb-3" href="#!">Dolor clita vero elitr sea stet dolor justo diam</a>
                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                            rebum clita rebum dolor stet amet justo</p>
                    </div>
                    <div class="d-flex justify-content-between border-top p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25" alt="">
                            <small>John Doe</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>12345</small>
                            <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>123</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Blog End -->

<?= $this->endSection(); ?>