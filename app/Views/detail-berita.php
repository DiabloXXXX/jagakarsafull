<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>
<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-8">
            <!-- Blog Detail Start -->
            <div class="mb-5">
                <img loading="lazy" class="img-fluid w-100 rounded mb-5" src="<?= $berita['gambar']
                                                                                    ? base_url('uploads/berita/' . $berita['gambar'])
                                                                                    : base_url('img/berita-1.jpg') ?>" alt="">
                <h1 class="mb-4"><?= $berita['judul']; ?>
                </h1>
                <p><?= $berita['konten']; ?></p>
                <div class="d-flex justify-content-between bg-light rounded p-4 mt-4 mb-4">
                    <div class="d-flex align-items-center">
                        Diupload oleh : <span class="fw-bold"> Admin</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <small class="ms-3"><i class="far fa-calendar text-primary me-1"></i><?= date('d F Y', strtotime($berita['created_at'])) ?></small>
                    </div>
                </div>
            </div>
            <!-- Blog Detail End -->
        </div>

        <!-- Sidebar Start -->
        <div class="col-lg-4">

            <!-- Recent Post Start -->
            <div class="mb-5">
                <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 mb-4">Recent Post</h4>
                <div class="d-flex rounded overflow-hidden mb-3">
                    <img class="img-fluid" src="img/blog-1.jpg"
                        style="width: 100px; height: 100px; object-fit: cover;" alt="">
                    <a href="#!" class="h5 d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet
                        consec adipis elit
                    </a>
                </div>
            </div>
            <!-- Recent Post End -->

            <!-- Image Start -->
            <div class="mb-5">
                <img src="img/berita-1.jpg" alt="" class="img-fluid rounded">
            </div>
            <!-- Image End -->
        </div>
        <!-- Sidebar End -->
    </div>
</div>

<?= $this->endSection(); ?>