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
$heroTitle = $h['hero_title'] ?? 'Selamat Datang Di Website Kelurahan Jagakarsa';
$heroSubtitle = $h['hero_subtitle'] ?? '';
$heroImage = !empty($h['hero_image']) ? 'uploads/halaman/' . $h['hero_image'] : 'images/features/hero-beranda.jpg';
$tentangTitle = $h['tentang_title'] ?? 'Tentang Kelurahan Jagakarsa';
$tentangText1 = $h['tentang_text1'] ?? 'Kelurahan Jagakarsa merupakan salah satu Kelurahan yang berada di Kecamatan Jagakarsa Kota Administrasi Jakarta Selatan.';
$tentangText2 = $h['tentang_text2'] ?? 'Kelurahan Jagakarsa sebagai instansi pemerintah yang melayani masyarakat harus menjalankan fungsi dengan sebaik-baiknya.';
$luasWilayah = $h['luas_wilayah'] ?? '4,850,000 m²';
$jumlahRw = $h['jumlah_rw'] ?? '7';
$jumlahRt = $h['jumlah_rt'] ?? '82';
$gambarPeta = !empty($h['gambar_peta']) ? 'uploads/halaman/' . $h['gambar_peta'] : 'images/features/map-kelurahan-jagakarsa.png';
?>

<div class="min-h-screen bg-white">
    
    <!-- Hero Section -->
    <section 
        class="relative h-96 md:h-[586px] bg-cover bg-center overflow-hidden" 
        data-aos="fade-in" 
        data-aos-duration="1200"
        role="banner"
        aria-label="Hero section Kelurahan Jagakarsa"
    >
        <!-- Skeleton loader -->
        <div class="absolute inset-0 bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-pulse" id="heroSkeleton"></div>
        
        <img
            src="<?= base_url($heroImage) ?>"
            alt="Kelurahan Jagakarsa"
            class="w-full h-full object-cover transition-all duration-[10s] hover:scale-110"
            loading="eager"
            onload="document.getElementById('heroSkeleton').style.display='none'"
        />
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70"></div>

        <!-- Content -->
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white mb-8 leading-tight max-w-4xl drop-shadow-2xl" 
                style="text-shadow: 2px 2px 4px rgba(0,0,0,0.6);"
                data-aos="fade-up" data-aos-delay="200">
                <?= esc($heroTitle) ?>
            </h1>
            <?php if (!empty($heroSubtitle)): ?>
            <p class="text-xl md:text-2xl text-white/90 mb-8 max-w-2xl" 
               data-aos="fade-up" data-aos-delay="300"
               style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                <?= esc($heroSubtitle) ?>
            </p>
            <?php endif; ?>
            
            <!-- CTA Button -->
            <button 
                onclick="document.getElementById('tentang').scrollIntoView({ behavior: 'smooth' })"
                class="btn-ripple pulse-animation bg-[#FF9800] hover:bg-orange-600 text-white font-semibold py-3 px-16 rounded-full flex items-center gap-3 transition-all transform hover:scale-105 shadow-lg text-2xl cursor-pointer border-none"
                data-aos="fade-up" 
                data-aos-delay="400"
                aria-label="Gulir ke bagian tentang kelurahan"
                type="button"
            >
                Lihat Beranda
                <i class="fas fa-arrow-right text-2xl" aria-hidden="true"></i>
            </button>
        </div>
    </section>

    <!-- About Content Section -->
    <section 
        id="tentang" 
        class="py-12 sm:py-16 md:py-24 bg-white scroll-mt-28" 
        data-aos="fade-up"
        role="region"
        aria-labelledby="tentang-heading"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 max-w-4xl mx-auto">
                <h2 id="tentang-heading" class="text-3xl sm:text-4xl md:text-5xl font-extrabold gradient-text mb-4">
                    <?= esc($tentangTitle) ?>
                </h2>
                <div class="h-1 w-24 bg-gradient-to-r from-[#225808] via-[#99BD49] to-[#FF9800] mx-auto rounded-full" aria-hidden="true"></div>
            </div>
            <div class="text-base sm:text-lg md:text-xl text-gray-800 leading-relaxed space-y-4 sm:space-y-6 text-center max-w-4xl mx-auto font-medium">
                <p data-aos="fade-up" data-aos-delay="100">
                    <?= esc($tentangText1) ?>
                    <span class="font-bold text-primary-dark">Luas: <?= esc($luasWilayah) ?></span>,
                    <span class="font-bold text-primary-dark"><?= esc($jumlahRw) ?> RW</span> dan 
                    <span class="font-bold text-primary-dark"><?= esc($jumlahRt) ?> RT</span>.
                </p>
                <p data-aos="fade-up" data-aos-delay="200">
                    <?= esc($tentangText2) ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Boundaries Section -->
    <section 
        class="py-12 sm:py-16 md:py-24 bg-primary-lighter" 
        data-aos="fade-up"
        role="region"
        aria-labelledby="batas-heading"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="batas-heading" class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-primary-dark mb-8 sm:mb-12">Batas Wilayah Kelurahan</h2>

            <div class="grid md:grid-cols-2 gap-8 md:gap-12">
                <!-- Boundaries List -->
                <div class="space-y-6 sm:space-y-8">
                    <?php foreach ($boundaries as $boundary): ?>
                        <div>
                            <h3 class="text-base sm:text-lg md:text-2xl font-bold text-black mb-2"><?= esc($boundary['direction']) ?> :</h3>
                            <p class="text-sm sm:text-base md:text-2xl font-semibold text-black"><?= esc($boundary['areas']) ?></p>
                        </div>
                    <?php endforeach; ?>

                    <!-- Map Button -->
                    <a href="https://maps.google.com/?q=Kelurahan+Jagakarsa" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="mt-6 sm:mt-8 bg-primary-light hover:bg-primary-dark text-black font-semibold py-2 sm:py-3 px-6 sm:px-8 rounded-lg flex items-center gap-2 sm:gap-3 transition-all transform hover:scale-105 text-sm sm:text-base md:text-2xl w-max no-underline"
                       aria-label="Buka peta Kelurahan Jagakarsa di Google Maps (buka di tab baru)"
                    >
                        <i class="fas fa-map-marker-alt sm:w-7 sm:h-7 text-xl" aria-hidden="true"></i>
                        Lihat di Maps
                    </a>
                </div>

                <!-- Map Image -->
                <div class="flex items-center justify-center">
                    <div class="w-full rounded-3xl shadow-lg overflow-hidden relative">
                        <!-- Skeleton loader -->
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-pulse" id="mapSkeleton"></div>
                        <img
                            src="<?= base_url($gambarPeta) ?>"
                            alt="Peta Kelurahan Jagakarsa"
                            class="w-full h-48 sm:h-64 md:h-96 object-cover transform hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                            onload="const skeleton = document.getElementById('mapSkeleton'); if(skeleton) skeleton.style.display='none';"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section 
        class="py-12 sm:py-16 md:py-24 bg-white" 
        data-aos="fade-up"
        role="region"
        aria-labelledby="prestasi-heading"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="prestasi-heading" class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-black mb-8 sm:mb-12">Prestasi Kelurahan Jagakarsa</h2>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8" role="list">
                <?php $delay = 0; foreach ($prestasi as $p): ?>
                    <article class="card-modern bg-white rounded-3xl overflow-hidden shadow-lg group" 
                             data-aos="fade-up" 
                             data-aos-delay="<?= $delay ?>"
                             role="listitem"
                             aria-label="Prestasi: <?= esc($p['judul']) ?>">
                        <!-- Image -->
                        <div class="relative h-40 sm:h-48 md:h-64 overflow-hidden border-2 border-black">
                            <!-- Skeleton loader -->
                            <div class="absolute inset-0 bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-pulse prestasi-skeleton-<?= $p['id'] ?>"></div>
                            <img
                                src="<?= base_url('uploads/prestasi/' . $p['gambar']) ?>"
                                alt="<?= esc($p['judul']) ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy"
                                onload="const skeleton = this.previousElementSibling; if(skeleton) skeleton.style.display='none';"
                            />
                            <!-- Gradient Overlay on Hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300" aria-hidden="true"></div>
                        </div>

                        <!-- Content -->
                        <div class="p-4 sm:p-6 space-y-3 sm:space-y-4">
                            <p class="text-sm sm:text-base md:text-2xl font-semibold text-primary-dark">
                                Prestasi
                            </p>
                            <h3 class="text-sm sm:text-base md:text-2xl font-semibold text-black line-clamp-2 group-hover:text-primary-dark transition-colors">
                                <?= esc($p['judul']) ?>
                            </h3>
                            <p class="text-xs sm:text-sm md:text-xl text-gray-600 flex items-center gap-2">
                                <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                <time datetime="<?= date('Y-m-d', strtotime($p['created_at'])) ?>">
                                    <?= date('d M Y', strtotime($p['created_at'])) ?>
                                </time>
                            </p>

                            <!-- Action Button -->
                            <button 
                                onclick="alert('<?= esc($p['judul']) ?>')"
                                class="btn-ripple w-full bg-primary-light hover:bg-primary-dark text-black hover:text-white font-semibold py-2 sm:py-3 px-4 sm:px-6 rounded-lg transition-all text-xs sm:text-sm md:text-2xl cursor-pointer"
                                aria-label="Lihat detail prestasi: <?= esc($p['judul']) ?>"
                                type="button"
                            >
                                Lihat Selengkapnya
                            </button>
                        </div>
                    </article>
                <?php $delay += 100; endforeach; ?>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>