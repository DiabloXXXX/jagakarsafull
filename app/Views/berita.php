<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h1 class="display-4">Berita Kelurahan</h1>
            <h3>Pusat berita dan informasi terbaru dari Kelurahan Jagakarsa untuk masyarakat</h3>
        </div>
        <div class="row g-5 d-flex justify-content-center">
            <?php foreach ($berita as $b): ?>
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/berita-1.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" href="<?= base_url('berita/' . $b['slug']) ?>"><?= esc($b['judul']) ?></a>
                            <p class="m-0"><?= substr(strip_tags($b['konten']), 0, 100) ?>...
                            </p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                            <div class="d-flex align-items-center">
                                <small>Admin</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="ms-3"><i class="far fa-calendar text-primary me-1"></i><?= date('d F Y', strtotime($b['created_at'])) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="col-12 mt-5">
                <a href="<?= base_url('') ?>?>" class="btn btn-primary py-3" type="submit"><i class="fa fa-arrow-left text-light me-3"></i>Kembali</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>