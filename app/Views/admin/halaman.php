<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>
<style>
    /* Gaya CSS untuk membuat gambar menjadi persegi */
    .image-square-wrapper {
        /* 1. Menentukan lebar wrapper (misalnya 200px) */
        width: 200px;
        /* Sesuaikan lebar ini sesuai keinginan Anda */

        /* 2. Teknik 'Padding Hack' untuk rasio 1:1 (Persegi) */
        /* Padding-top 100% akan sama dengan lebar, menjadikannya persegi */
        padding-top: 100%;

        /* 3. Posisi relatif untuk menampung gambar */
        position: relative;

        /* Opsional: Untuk memastikan sudut membulat jika Anda menggunakan border-radius pada card */
        overflow: hidden;
    }

    /* Gaya CSS untuk gambar di dalamnya */
    .image-square-wrapper img {
        /* 1. Membuat gambar mengambil seluruh area wrapper */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;

        /* 2. Poin KRUSIAL: Memotong gambar agar memenuhi area persegi tanpa merusak rasio */
        /* Ini akan memotong bagian gambar yang tidak muat */
        object-fit: cover;
    }

    /* Penyesuaian untuk tampilan Desktop (Layar sedang ke atas) */
    @media (max-width: 360px) {
        .image-square-wrapper {
            /* Anda bisa menentukan lebar tetap untuk versi desktop agar tidak terlalu lebar */
            width: 328px;
            height: 250px;
        }
    }
</style>
<div class="container-xxl grow container-p-y">
    <h5 class="pb-1 mb-6 fw-bold text-primary">Kelola Halaman</h5>
    <div class="row mb-12 g-6">
        <div class="col-md my-2">
            <div class="card">
                <div class="d-flex flex-md-row flex-column">
                    <div>
                        <div class="image-square-wrapper">
                            <img class="card-img card-img-left" src="<?= base_url() ?>/img/hero-beranda.jpg" alt="Card image">
                        </div>
                    </div>
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Prestasi (Beranda & Tentang)</h5>
                            <p class="card-text">Tambahkan Prestasi dan Edit Prestasi</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            <a href="<?= base_url('/halaman/editberanda') ?>" class="btn rounded-pill btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md my-2">
            <div class="card">
                <div class="d-flex flex-md-row flex-column">
                    <div>
                        <div class="image-square-wrapper">
                            <img class="card-img card-img-right" src="<?= base_url() ?>/img/hero-beranda.jpg" alt="Card image">
                        </div>
                    </div>
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Visi Misi Kelurahan</h5>
                            <p class="card-text">Visi & Misi</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            <a href="<?= base_url('/halaman/editvisi') ?>" class="btn rounded-pill btn-primary">Edit</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row g-6">
        <div class="col-md my-2">
            <div class="card">
                <div class="d-flex flex-md-row flex-column">
                    <div>
                        <div class="image-square-wrapper">
                            <img class="card-img card-img-right" src="<?= base_url() ?>/img/hero-beranda.jpg" alt="Card image">
                        </div>
                    </div>
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Struktur</h5>
                            <p class="card-text">Struktur Organisasi</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            <a href="<?= base_url('/halaman/editstruktur') ?>" class="btn rounded-pill btn-primary">Edit</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md my-2">
            <div class="card">
                <div class="d-flex flex-md-row flex-column">
                    <div>
                        <div class="image-square-wrapper">
                            <img class="card-img card-img-right" src="<?= base_url() ?>/img/hero-beranda.jpg" alt="Card image">
                        </div>
                    </div>
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Lembaga</h5>
                            <p class="card-text">Lembaga Kemasyarakatan</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            <a href="<?= base_url('/halaman/editlembaga') ?>" class="btn rounded-pill btn-primary">Edit</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row g-6">
        <div class="col-md my-2">
            <div class="card">
                <div class="d-flex flex-md-row flex-column">
                    <div>
                        <div class="image-square-wrapper">
                            <img class="card-img card-img-right" src="<?= base_url() ?>/img/hero-beranda.jpg" alt="Card image">
                        </div>
                    </div>
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Layanan</h5>
                            <p class="card-text">Informasi Pelayanan</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            <a href="<?= base_url('/halaman/editlayanan') ?>" class="btn rounded-pill btn-primary">Edit</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md my-2">
            <div class="card">
                <div class="d-flex flex-md-row flex-column">
                    <div>
                        <div class="image-square-wrapper">
                            <img class="card-img card-img-right" src="<?= base_url() ?>/img/hero-beranda.jpg" alt="Card image">
                        </div>
                    </div>
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Area Rawan Banjir</h5>
                            <p class="card-text">Peta & Detail</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            <a href="<?= base_url('/halaman/editbanjir') ?>" class="btn rounded-pill btn-primary">Edit</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>