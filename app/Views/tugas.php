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
            <h1 class="display-4 text-primary">Tugas</h1>
            <h5>Peran dari masing - masing unsur perangkat kelurahan</h5>
        </div>
        <div class="visi-misi-wrapper">

            <!-- Card Visi -->
            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>Tugas seorang lurah</h4>
                            <p class="my-3" style="font-size:14pt;">
                                <span class="text-primary">1</span> - Memimpin dan mengoordinasikan pelaksanaan tugas dan fungsi Kelurahan.
                                <br>
                                <span class="text-primary">2</span> - Melaksanakan kegiatan pemerintahan yang menjadi tanggung jawab Kelurahan.
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>Tugas seorang sekretariat kelurahan</h4>
                            <p class="my-3" style="font-size:14pt;">
                                <span class="text-primary">1</span> - Pengoordinasian perumusan proses bisnis, standar, dan prosedur Kelurahan.
                                <br>
                                <span class="text-primary">2</span> - Pengelolaan program dan anggaran Kelurahan.
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>Tugas seorang seksi pemerintahan</h4>
                            <p class="my-3" style="font-size:14pt;">
                                <span class="text-primary">1</span> - Melaksanakan pembinaan dan pengoordinasian rukun warga dan rukun tetangga.
                                <br>
                                <span class="text-primary">2</span> - Melaksanakan pembinaan, pengoordinasian, dan pengawasan penyelenggaraan pemerintahan desa.
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>Tugas seorang seksi ekonomi dan pembangunan</h4>
                            <p class="my-3" style="font-size:14pt;">
                                <span class="text-primary">1</span> - Melaksanakan pengoordinasian, pemantauan dan evaluasi pelaksanaan urusan bidang perekonomian.
                                <br>
                                <span class="text-primary">2</span> - Melaksanakan pengoordinasian, pemantauan dan evaluasi pelaksanaan urusan bidang pembangunan.
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-item card-custom mb-3">
                <div class="row bg-light rounded overflow-hidden h-auto shadow-sm">
                    <div class="col-12 d-flex flex-column">
                        <div class="p-4">
                            <h4>Tugas seorang seksi kesejahteraan rakyat</h4>
                            <p class="my-3" style="font-size:14pt;">
                            <div class="my-2">
                                <span class="text-primary">1</span> - Melaksanakan pengoordinasian, pemantauan dan evaluasi pelaksanaan urusan bidang kesejahteraan rakyat di wilayah Kelurahan, antara lain pendidikan, kesehatan, pemberdayaan perempuan dan perlindungan anak, pemberdayaan masyarakat dan desa, pengendalian penduduk dan keluarga berencana, kebudayaan, sosial, perpustakaan, kearsipan, kepemudaan dan olahraga.
                                <br>
                            </div>
                            <div class="my-2">
                                <span class="text-primary">2</span> - Melaksanakan pengoordinasian dan pendataan, bidang kesejahteraan rakyat di wilayah Kelurahan, antara lain permasalahan kesejahteraan sosial, permasalahan kesehatan masyarakat, potensi dan/atau terjadi kejadian yang luar biasa.
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