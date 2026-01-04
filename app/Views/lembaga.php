<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<?php
$organizations = [
    [
        'id' => 1,
        'title' => 'FKDM (Forum Kewaspadaan Dini Masyarakat)',
        'description' => 'Lembaga ini berperan sebagai mata dan telinga masyarakat untuk mendeteksi secara dini potensi gangguan keamanan, ketertiban, atau konflik sosial di wilayah kelurahan.',
        'members' => 7,
        'countLabel' => 'Total Anggota'
    ],
    [
        'id' => 3,
        'title' => 'LMK (Lembaga Musyawarah Kelurahan)',
        'description' => 'Lembaga kemasyarakatan resmi yang berfungsi sebagai wadah aspirasi warga serta mitra Lurah dalam menyusun dan melaksanakan pembangunan di tingkat kelurahan.',
        'members' => 7,
        'countLabel' => 'Total Anggota'
    ],
    [
        'id' => 4,
        'title' => 'RW (Rukun Warga)',
        'description' => 'Lembaga kemasyarakatan tingkat kelurahan yang menjadi penghubung antara pemerintah kelurahan dan masyarakat di lingkungan beberapa RT (Rukun Tetangga).',
        'members' => 7,
        'countLabel' => 'Total Anggota'
    ],
    [
        'id' => 5,
        'title' => 'RT (Rukun Tetangga)',
        'description' => 'Organisasi masyarakat yang berada di bawah RW (Rukun Warga) dan berfungsi untuk membantu pelaksanaan urusan pemerintahan, pelayanan masyarakat, serta menjaga ketertiban dan kebersamaan di lingkungan kecil (biasanya satu blok atau beberapa rumah).',
        'members' => 82,
        'countLabel' => 'Total Anggota'
    ],
    [
        'id' => 6,
        'title' => 'PKK Kelurahan',
        'description' => 'Lembaga kemasyarakatan yang berperan dalam meningkatkan kesejahteraan keluarga melalui berbagai kegiatan sosial, ekonomi, dan pendidikan masyarakat.',
        'members' => 12,
        'countLabel' => 'Total Anggota'
    ],
    [
        'id' => 7,
        'title' => 'Jumantik (Juru Pemantau Jentik)',
        'description' => 'Petugas atau kader masyarakat yang bertugas memantau, mencegah, dan mengendalikan jentik nyamuk Aedes aegypti, penyebab penyakit Demam Berdarah Dengue (DBD).',
        'members' => 89,
        'countLabel' => 'Total Anggota'
    ],
    [
        'id' => 8,
        'title' => 'Dasawisma',
        'description' => 'Dasawisma berasal dari kata "Dasa" (sepuluh) dan "Wisma" (rumah). Artinya, Dasawisma adalah kelompok kecil dari rumah tangga yang bergotong royong menjalankan kegiatan sosial, ekonomi, dan lingkungan di bawah pembinaan PKK.',
        'members' => 613,
        'countLabel' => 'Total Anggota'
    ],
    [
        'id' => 9,
        'title' => 'Posyandu Balita',
        'subtitle' => '(Pos Pelayanan Terpadu untuk Balita)',
        'description' => 'Kegiatan pelayanan kesehatan yang ditujukan bagi anak usia di bawah lima tahun (balita).',
        'members' => 36,
        'countLabel' => 'Total Posyandu'
    ],
    [
        'id' => 10,
        'title' => 'Posyandu Lansia',
        'subtitle' => '(Pos Pelayanan Terpadu Lanjut Usia)',
        'description' => 'Pelayanan kesehatan bagi warga lanjut usia (60 tahun ke atas).',
        'members' => 7,
        'countLabel' => 'Total Posyandu'
    ]
];

// SiteStats (Simulated)
$siteStats = [
    'totalOrganisasi' => 10,
    'totalAnggotaAktif' => '1,000+'
];
?>

<div class="min-h-screen bg-white">
    
    <!-- Main Content -->
    <section class="py-12 sm:py-16 md:py-24 bg-white mt-3.5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Title Section -->
            <div class="text-center mb-10 sm:mb-12 md:mb-16">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-primary-dark mb-4 sm:mb-6 md:mb-8">LEMBAGA KEMASYARAKATAN</h1>
                <p class="text-base sm:text-lg md:text-2xl lg:text-3xl font-bold text-black max-w-4xl mx-auto px-2 sm:px-4">
                    Wadah partisipasi masyarakat dalam penyelenggaraan pemerintahan, pembangunan, dan kemasyarakatan di tingkat kelurahan.
                </p>
            </div>

            <!-- Organizations List -->
            <div class="space-y-6 sm:space-y-8 mb-10 sm:mb-12 md:mb-16">
                <?php foreach ($organizations as $org): ?>
                    <div class="bg-white rounded-lg border border-gray-400 overflow-hidden hover:shadow-lg transition-shadow p-4 sm:p-6 md:p-8">
                        <div class="flex flex-col gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg sm:text-2xl md:text-3xl font-bold text-primary-dark mb-2 sm:mb-3 md:mb-4 break-words">
                                    <?= $org['title'] ?>
                                </h3>
                                <?php if (isset($org['subtitle'])): ?>
                                    <p class="text-xs sm:text-sm md:text-lg text-gray-600 mb-2 sm:mb-3 md:mb-4 break-words"><?= $org['subtitle'] ?></p>
                                <?php endif; ?>
                                <p class="text-sm sm:text-base md:text-xl font-semibold text-black leading-relaxed mb-4 sm:mb-5 md:mb-6 break-words">
                                    <?= $org['description'] ?>
                                </p>

                                <!-- Member Count -->
                                <div class="flex items-center gap-3 sm:gap-4">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 bg-primary-light rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-users sm:text-2xl text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs sm:text-sm md:text-lg font-bold text-primary-dark">
                                            <?= $org['countLabel'] ?>:
                                        </p>
                                        <p class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-semibold text-black">
                                            <?= $org['members'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Summary Section -->
            <div class="bg-white rounded-lg p-6 sm:p-8 md:p-12 mb-10 sm:mb-12 md:mb-16 border-2 border-primary-light">
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-primary-dark mb-4 sm:mb-6 md:mb-8">Ringkasan Lembaga Kemasyarakatan</h3>
                <div class="grid gap-6 sm:gap-8 md:grid-cols-2">
                    <div class="space-y-3 sm:space-y-4">
                        <div class="flex items-center gap-3 sm:gap-4">
                            <div class="w-3 h-5 sm:w-4 sm:h-6 bg-primary-dark rounded"></div>
                            <p class="text-sm sm:text-base md:text-xl font-semibold text-black">Lembaga Pemerintahan: 4 (RW, RT, LMK, FKDM)</p>
                        </div>
                        <div class="flex items-center gap-3 sm:gap-4">
                            <div class="w-3 h-5 sm:w-4 sm:h-6 bg-primary-light rounded"></div>
                            <p class="text-sm sm:text-base md:text-xl font-semibold text-black">Lembaga Sosial & Kesehatan: 5 (PKK, Jumantik, Dasawisma, Posyandu Balita, Posyandu Lansia)</p>
                        </div>
                    </div>
                    <div class="space-y-3 sm:space-y-4">
                        <div class="bg-primary-lighter p-4 sm:p-5 md:p-6 rounded-lg">
                            <p class="text-sm sm:text-base md:text-lg font-semibold text-primary-dark mb-1 sm:mb-2">Total Organisasi</p>
                            <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-black"><?= $siteStats['totalOrganisasi'] ?></p>
                        </div>
                        <div class="bg-primary-light p-4 sm:p-5 md:p-6 rounded-lg">
                            <p class="text-sm sm:text-base md:text-lg font-semibold text-white mb-1 sm:mb-2">Total Anggota Aktif</p>
                            <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-white"><?= $siteStats['totalAnggotaAktif'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <a href="<?= base_url('/') ?>" class="mt-8 sm:mt-10 md:mt-12 bg-primary-light hover:bg-primary-dark text-black font-semibold py-2 sm:py-3 px-6 sm:px-8 rounded-lg inline-flex items-center gap-2 sm:gap-3 transition-all transform hover:scale-105 text-sm sm:text-base md:text-2xl no-underline">
                <i class="fas fa-arrow-left sm:w-7 sm:h-7 text-xl"></i>
                Kembali
            </a>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>