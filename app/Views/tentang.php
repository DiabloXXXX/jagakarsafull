<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<?php
// Get dynamic data from halaman or use defaults
$h = $halaman ?? [];

// Dynamic boundaries from database or defaults
$boundaries = [
    ['direction' => 'Utara', 'areas' => $h['batas_utara'] ?? 'Kelurahan Ragunan, Kelurahan Cilandak Timur dan Kelurahan Kebagusan.'],
    ['direction' => 'Selatan', 'areas' => $h['batas_selatan'] ?? 'Kelurahan Ciganjur dan Kelurahan Srenseng Sawah.'],
    ['direction' => 'Timur', 'areas' => $h['batas_timur'] ?? 'Kelurahan Lenteng Agung.'],
    ['direction' => 'Barat', 'areas' => $h['batas_barat'] ?? 'Kelurahan Pondok Labu dan Kecamatan Sawangan Kota Depok.']
];

// Dynamic content
$heroImage = !empty($h['hero_image']) ? 'uploads/halaman/' . $h['hero_image'] : 'images/features/hero-beranda.jpg';
$tentangTitle = $h['tentang_title'] ?? 'Tentang Kelurahan Jagakarsa';
$tentangText1 = $h['tentang_text1'] ?? 'Kelurahan Jagakarsa merupakan salah satu Kelurahan yang berada di Kecamatan Jagakarsa Kota Administrasi Jakarta Selatan.';
$tentangText2 = $h['tentang_text2'] ?? 'Kelurahan Jagakarsa sebagai instansi pemerintah yang melayani masyarakat harus menjalankan fungsi dengan sebaik-baiknya.';
$luasWilayah = $h['luas_wilayah'] ?? '4,850,000 m²';
$jumlahRw = $h['jumlah_rw'] ?? '7';
$jumlahRt = $h['jumlah_rt'] ?? '82';
$gambarPeta = !empty($h['gambar_peta']) ? 'uploads/halaman/' . $h['gambar_peta'] : 'images/features/map-kelurahan-jagakarsa.png';

$pjlp = [
    'ppsu' => [
        'title' => 'PPSU (Petugas Pengelola Sarana Umum)',
        'description' => 'Petugas yang bertugas mengelola, memelihara, dan menjaga sarana umum di wilayah Kelurahan Jagakarsa',
        'jumlah' => '15 orang',
        'tugas' => [
            'Memelihara dan membersihkan sarana umum (jalan, taman, fasilitas publik)',
            'Melakukan perbaikan dan pemeliharaan rutin sarana umum',
            'Menjaga kebersihan dan keindahan lingkungan kelurahan',
            'Melaporkan kerusakan sarana umum kepada pimpinan'
        ]
    ],
    'perpetra' => [
        'title' => 'PerPetra (Perangkat Perumahan dan Permukiman)',
        'description' => 'Perangkat yang menangani urusan perumahan, permukiman, dan lingkungan hidup',
        'jumlah' => '8 orang',
        'tugas' => [
            'Mengawasi dan membina penyelenggaraan perumahan dan permukiman',
            'Melaksanakan program peningkatan kualitas lingkungan hidup',
            'Mengelola data dan informasi perumahan dan permukiman',
            'Melakukan koordinasi dengan instansi terkait di bidang perumahan'
        ]
    ]
];
?>

<div class="min-h-screen bg-white">
    
    <!-- Hero Section -->
    <section class="relative h-64 sm:h-80 md:h-[352px] bg-cover bg-center overflow-hidden" data-aos="fade-in">
        <img
            src="<?= base_url($heroImage) ?>"
            alt="Kelurahan Jagakarsa"
            class="w-full h-full object-cover transition-transform duration-[10s] hover:scale-110"
            loading="eager"
        />
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
        <div class="absolute inset-0 flex items-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto w-full">
                <h1 class="text-3xl sm:text-5xl md:text-6xl lg:text-8xl font-extrabold text-white leading-tight" data-aos="fade-right" data-aos-delay="200">
                    <?= esc($tentangTitle) ?>
                </h1>
            </div>
        </div>
    </section>

    <!-- About Content Section -->
    <section class="py-12 sm:py-16 md:py-24 bg-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-base sm:text-lg md:text-2xl lg:text-3xl text-black leading-relaxed">
                <p>
                    <?= esc($tentangText1) ?>
                    <span class="font-bold">Luas: <?= esc($luasWilayah) ?></span>,
                    <span class="font-bold"><?= esc($jumlahRw) ?> RW</span> dan <span class="font-bold"><?= esc($jumlahRt) ?> RT</span>.
                </p>
                <p class="mt-4 sm:mt-6">
                    <?= esc($tentangText2) ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Boundaries Section -->
    <section class="py-12 sm:py-16 md:py-24 bg-primary-lighter" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-primary-dark mb-8 sm:mb-12">
                Batas Wilayah Kelurahan
            </h2>

            <div class="grid md:grid-cols-2 gap-8 md:gap-12">
                <!-- Boundaries List -->
                <div class="space-y-6 sm:space-y-8">
                    <?php foreach ($boundaries as $boundary): ?>
                        <div>
                            <h3 class="text-base sm:text-lg md:text-2xl font-bold text-black mb-2"><?= esc($boundary['direction']) ?> :</h3>
                            <p class="text-sm sm:text-base md:text-2xl font-semibold text-black"><?= esc($boundary['areas']) ?></p>
                        </div>
                    <?php endforeach; ?>

                    <a href="<?= base_url('peta') ?>"
                        class="mt-6 sm:mt-8 bg-primary-light hover:bg-primary-dark text-black font-semibold py-2 sm:py-3 px-6 sm:px-8 rounded-lg flex items-center gap-2 sm:gap-3 transition-all transform hover:scale-105 text-sm sm:text-base md:text-2xl w-max no-underline"
                    >
                        <i class="fas fa-map-marker-alt sm:w-7 sm:h-7 text-xl"></i>
                        Lihat di Maps
                    </a>
                </div>

                <!-- Map Image -->
                <div class="flex items-center justify-center">
                    <div class="w-full rounded-3xl shadow-lg overflow-hidden">
                        <img
                            src="<?= base_url($gambarPeta) ?>"
                            alt="Peta Kelurahan Jagakarsa"
                            class="w-full h-48 sm:h-64 md:h-96 object-cover"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PJLP Section -->
    <section class="py-12 sm:py-16 md:py-24 bg-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-primary-dark mb-8 sm:mb-12">
                PJLP (Petugas Jaga Lingkungan Permukiman)
            </h2>

            <div class="grid md:grid-cols-2 gap-8 sm:gap-10">
                <!-- PPSU -->
                <div class="bg-white rounded-3xl shadow-lg p-6 sm:p-8 border-l-8 border-primary-dark hover:shadow-xl transition-all">
                    <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-primary-dark mb-3 sm:mb-4">
                        <?= $pjlp['ppsu']['title'] ?>
                    </h3>
                    <p class="text-sm sm:text-base md:text-lg text-gray-600 mb-4 sm:mb-6">
                        <?= $pjlp['ppsu']['description'] ?>
                    </p>
                    <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-secondary/10 rounded-lg">
                        <p class="text-base sm:text-lg font-semibold text-primary-dark">
                            Jumlah Personil: <span class="text-[#FF9800]"><?= $pjlp['ppsu']['jumlah'] ?></span>
                        </p>
                    </div>
                    <div>
                        <h4 class="text-base sm:text-lg font-bold text-primary-dark mb-3">Tugas Utama:</h4>
                        <ul class="space-y-2 sm:space-y-3">
                            <?php foreach ($pjlp['ppsu']['tugas'] as $tugas) : ?>
                                <li class="flex gap-3">
                                    <i class="fas fa-check-circle text-[#FF9800] flex-shrink-0 mt-1"></i>
                                    <span class="text-sm sm:text-base text-black"><?= $tugas ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- PerPetra -->
                <div class="bg-white rounded-3xl shadow-lg p-6 sm:p-8 border-l-8 border-primary-dark hover:shadow-xl transition-all">
                    <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-primary-dark mb-3 sm:mb-4">
                        <?= $pjlp['perpetra']['title'] ?>
                    </h3>
                    <p class="text-sm sm:text-base md:text-lg text-gray-600 mb-4 sm:mb-6">
                        <?= $pjlp['perpetra']['description'] ?>
                    </p>
                    <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-secondary/10 rounded-lg">
                        <p class="text-base sm:text-lg font-semibold text-primary-dark">
                            Jumlah Personil: <span class="text-[#FF9800]"><?= $pjlp['perpetra']['jumlah'] ?></span>
                        </p>
                    </div>
                    <div>
                        <h4 class="text-base sm:text-lg font-bold text-primary-dark mb-3">Tugas Utama:</h4>
                        <ul class="space-y-2 sm:space-y-3">
                             <?php foreach ($pjlp['perpetra']['tugas'] as $tugas) : ?>
                                <li class="flex gap-3">
                                    <i class="fas fa-check-circle text-[#FF9800] flex-shrink-0 mt-1"></i>
                                    <span class="text-sm sm:text-base text-black"><?= $tugas ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="py-12 sm:py-16 md:py-24 bg-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-black mb-8 sm:mb-12">
                Prestasi Kelurahan Jagakarsa
            </h2>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
                 <?php foreach ($prestasi as $p): ?>
                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <!-- Image -->
                        <div class="h-40 sm:h-48 md:h-64 overflow-hidden border-2 border-primary-dark">
                            <img
                                src="<?= base_url('uploads/prestasi/' . $p['gambar']) ?>"
                                alt="<?= esc($p['judul']) ?>"
                                class="w-full h-full object-cover hover:scale-105 transition-transform"
                            />
                        </div>

                        <!-- Content -->
                        <div class="p-4 sm:p-6">
                            <p class="text-sm sm:text-base md:text-2xl font-semibold text-black mb-3 sm:mb-4">Prestasi</p>
                            <h3 class="text-sm sm:text-base md:text-2xl font-semibold text-black mb-3 sm:mb-4 leading-snug">
                                <?= esc($p['judul']) ?>
                            </h3>
                            <p class="text-xs sm:text-sm md:text-xl text-gray-600 mb-4 sm:mb-6">
                                <?= date('d M Y', strtotime($p['created_at'])) ?>
                            </p>

                            <!-- Button -->
                            <button onclick="alert('<?= esc($p['judul']) ?>')" class="w-full bg-primary-light hover:bg-primary-dark text-black font-semibold py-2 sm:py-3 px-4 sm:px-6 rounded-lg transition-all transform hover:scale-105 text-xs sm:text-sm md:text-2xl cursor-pointer">
                                Lihat Selengkapnya
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>