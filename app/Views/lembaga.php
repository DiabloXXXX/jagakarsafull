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
            <h2 class="text-primary">Lembaga Kemasyarakatan</h2>
            <p class="text-dark">Wadah partisipasi masyarakat dalam penyelenggaraan pemerintahan, pembangunan, dan kemasyarakatan di tingkat kelurahan.</p>
        </div>
        <div class="visi-misi-wrapper">

            <!-- Card Visi -->
            <div class="team-item card-custom mb-5">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>FKDM (Forum Kewaspadaan Dini Masyarakat)</h4>
                            <p class="m-0">
                                Lembaga ini berperan sebagai mata dan telinga masyarakat untuk mendeteksi secara dini potensi gangguan keamanan, ketertiban, atau konflik sosial di wilayah kelurahan.
                            </p>
                            <p class="mt-3 text-dark fw-bold">Total Anggota : <br><?= $h['fdkm'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>LMK (Lembaga Musyawarah Kelurahan)</h4>
                            <p class="m-0">
                                Lembaga kemasyarakatan resmi yang berfungsi sebagai wadah aspirasi warga serta mitra Lurah dalam menyusun dan melaksanakan pembangunan di tingkat kelurahan.
                            </p>
                            <p class="mt-3 text-dark fw-bold">Total Anggota : <br><?= $h['lmk'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>RW (Rukun Warga)</h4>
                            <p class="m-0">
                                Lembaga kemasyarakatan tingkat kelurahan yang menjadi penghubung antara pemerintah kelurahan dan masyarakat di lingkungan beberapa RT (Rukun Tetangga).
                            </p>
                            <p class="mt-3 text-dark fw-bold">Total Anggota : <br><?= $h['rw'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>RT (Rukun Tetangga)</h4>
                            <p class="m-0">
                                Organisasi masyarakat yang berada di bawah RW (Rukun Warga) dan berfungsi untuk membantu pelaksanaan urusan pemerintahan, pelayanan masyarakat, serta menjaga ketertiban dan kebersamaan di lingkungan kecil (biasanya satu blok atau beberapa rumah).
                            </p>
                            <p class="mt-3 text-dark fw-bold">Total Anggota : <br><?= $h['rt'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>PKK Kelurahan</h4>
                            <p class="m-0">
                                Lembaga kemasyarakatan yang berperan dalam meningkatkan kesejahteraan keluarga melalui berbagai kegiatan sosial, ekonomi, dan pendidikan masyarakat.
                            </p>
                            <p class="mt-3 text-dark fw-bold">Total Anggota : <br><?= $h['pkk'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>Jumantik (Juru Pemantau Jentik)</h4>
                            <p class="m-0">
                                Petugas atau kader masyarakat yang bertugas memantau, mencegah, dan mengendalikan jentik nyamuk Aedes aegypti, penyebab penyakit Demam Berdarah Dengue (DBD).
                            </p>
                            <p class="mt-3 text-dark fw-bold">Total Anggota : <br><?= $h['jumantik'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>Dasawisma</h4>
                            <p class="m-0">
                                Dasawisma berasal dari kata "Dasa" (sepuluh) dan "Wisma" (rumah). Artinya, Dasawisma adalah kelompok kecil dari rumah tangga yang bergotong royong menjalankan kegiatan sosial, ekonomi, dan lingkungan di bawah pembinaan PKK.
                            </p>
                            <p class="mt-3 text-dark fw-bold">Total Anggota : <br><?= $h['dasawisma'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>Posyandu Balita</h4>
                            <p class="m-0">
                                Kegiatan pelayanan kesehatan yang ditujukan bagi anak usia di bawah lima tahun (balita).
                            </p>
                            <p class="mt-3 text-dark fw-bold">Total Posyandu : <br><?= $h['posyandu_bal'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>Posyandu Lansia</h4>
                            <p class="m-0">
                                Pelayanan kesehatan bagi warga lanjut usia (60 tahun ke atas).
                            </p>
                            <p class="mt-3 text-dark fw-bold">Total Posyandu : <br><?= $h['posyandu_lan'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-light rounded p-5">
                <h1 class="mb-4 text-center">Ringkasan Lembaga Kemasyarakatan</h1>
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-6">
                        <p class="text-dark">Lembaga Pemerintahan: 4 (RW, RT, LMK, FKDM)</p>
                        <p class="text-dark">Lembaga Sosial & Kesehatan: 5 (PKK, Jumantik, Dasawisma, Posyandu Balita, Posyandu Lansia)</p>
                    </div>
                    <div class="team-item card-custom mb-3 col-lg-6">
                        <div class="row bg-white rounded overflow-hidden h-auto shadow-sm">
                            <div class="col-12 d-flex flex-column">
                                <div class="p-4">
                                    <h4>Total Organisasi</h4>
                                    <h4 class="text-primary"><?= $h['total_organ'] ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="row bg-white rounded overflow-hidden h-auto shadow-sm mt-2">
                            <div class="col-12 d-flex flex-column">
                                <div class="p-4">
                                    <h4>Total Anggota Aktif</h4>
                                    <h4 class="text-primary"><?= $h['total_anggota'] ?> +</h4>
                                </div>
                            </div>
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