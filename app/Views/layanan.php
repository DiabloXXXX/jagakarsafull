<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h1 class="">INFORMASI PELAYANAN
                KELURAHAN JAGAKARSA</h1>
        </div>
        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center"
                    style="height: 200px;">
                    <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4"
                        style="width: 100px; height: 70px; transform: rotate(-15deg);">
                        <i class="fa fa-2x fa-location-arrow text-white" style="transform: rotate(15deg);"></i>
                    </div>
                    <a href="https://bit.ly/pelayanankelurahanjagakarsa" class="mb-0 text-primary">bit.ly/pelayanankelurahanjagakarsa</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center"
                    style="height: 200px;">
                    <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4"
                        style="width: 100px; height: 70px; transform: rotate(-15deg);">
                        <i class="fa fa-2x fa-phone text-white" style="transform: rotate(15deg);"></i>
                    </div>
                    <h6 class="mb-0">021-7270954</h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center"
                    style="height: 200px;">
                    <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4"
                        style="width: 100px; height: 70px; transform: rotate(-15deg);">
                        <i class="fa fa-2x fa-envelope-open text-white" style="transform: rotate(15deg);"></i>
                    </div>
                    <h6 class="mb-0">kel_jagakarsa@jakarta.go.id</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="height: 500px;">
                <div class="position-relative h-100">
                    <iframe class="position-relative w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
        <div class="row justify-content-center position-relative" style="margin-top: -200px; z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-light rounded p-5 m-5 mb-0">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <h4 class="text-center">Hubungi Kami Untuk Informasi Lebih Lanjut</h4>
                        </div>
                        <div class="col-lg-6">
                            <p class="text-dark"><i class="fa fa-phone me-3"></i>Telepon<br>021-7270954</p>
                        </div>
                        <div class="col-lg-6">
                            <p class="text-dark"><i class="fa fa-envelope me-3"></i>Email<br>kel_jagakarsa@jakarta.go.id</p>
                        </div>
                        <div class="col-lg-12">
                            <p class="text-dark"><i class="fa fa-map-marker-alt me-3"></i>Alamat <br>Jl. Jagakarsa II No.1, RT.1/RW.7, Jagakarsa, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12620
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