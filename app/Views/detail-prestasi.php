<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="min-h-screen bg-white">
    
    <!-- Hero/Header Section -->
    <section class="py-16 md:py-24 bg-gradient-to-b from-gray-50 to-white mt-3.5 border-b border-gray-100" data-aos="fade-in">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-primary-dark font-bold text-sm sm:text-base mb-4 tracking-wider uppercase" data-aos="fade-down">
                Prestasi Kelurahan
            </p>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-black mb-6 leading-tight" data-aos="fade-up" data-aos-delay="100">
                <?= esc($prestasi['judul']) ?>
            </h1>
            <div class="flex items-center justify-center gap-6 text-gray-500 text-sm sm:text-base" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary-light rounded-full flex items-center justify-center">
                        <i class="fas fa-trophy text-white text-sm"></i>
                    </div>
                    <span class="font-medium">Kelurahan Jagakarsa</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center">
                        <i class="far fa-calendar-alt text-white text-sm"></i>
                    </div>
                    <span class="font-medium"><?= date('d M Y', strtotime($prestasi['created_at'])) ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 md:py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Image -->
            <?php if (!empty($prestasi['gambar'])): ?>
            <div class="rounded-3xl overflow-hidden shadow-2xl mb-10 sm:mb-12 group" data-aos="zoom-in">
                <img
                    src="<?= base_url('uploads/prestasi/' . $prestasi['gambar']) ?>"
                    alt="<?= esc($prestasi['judul']) ?>"
                    class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700"
                    loading="lazy"
                />
            </div>
            <?php endif; ?>

            <!-- Description -->
            <div class="bg-gradient-to-br from-primary-lighter to-white rounded-3xl p-8 sm:p-10 shadow-lg mb-10" data-aos="fade-up">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-12 h-12 bg-primary-light rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-award text-white text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-primary-dark mb-3">Tentang Prestasi Ini</h2>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            <?= nl2br(esc($prestasi['deskripsi'] ?? $prestasi['keterangan'] ?? '')) ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Stats/Info Cards -->
            <div class="grid sm:grid-cols-2 gap-6 mb-10" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-calendar-check text-white text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Tanggal Dicapai</p>
                            <p class="text-xl font-bold text-gray-800"><?= date('d M Y', strtotime($prestasi['created_at'])) ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-certificate text-white text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Status</p>
                            <p class="text-xl font-bold text-gray-800">Tersertifikasi</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Share Buttons -->
            <div class="mt-10 pt-6 border-t border-gray-200" data-aos="fade-up">
                <p class="text-sm font-semibold text-gray-600 mb-3">Bagikan prestasi ini:</p>
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>" target="_blank" 
                       class="w-10 h-10 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-all hover:scale-110 no-underline">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>&text=<?= urlencode($prestasi['judul']) ?>" target="_blank" 
                       class="w-10 h-10 bg-sky-500 hover:bg-sky-600 text-white rounded-full flex items-center justify-center transition-all hover:scale-110 no-underline">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text=<?= urlencode($prestasi['judul'] . ' ' . current_url()) ?>" target="_blank" 
                       class="w-10 h-10 bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center transition-all hover:scale-110 no-underline">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <button onclick="navigator.clipboard.writeText('<?= current_url() ?>'); alert('Link berhasil disalin!');" 
                            class="w-10 h-10 bg-gray-600 hover:bg-gray-700 text-white rounded-full flex items-center justify-center transition-all hover:scale-110 cursor-pointer border-none">
                        <i class="fas fa-link"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Prestasi Section -->
    <?php if (!empty($prestasi_terkait) && count($prestasi_terkait) > 0): ?>
    <section class="py-12 md:py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl font-bold text-black mb-8" data-aos="fade-up">Prestasi Lainnya</h2>
            
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
                <?php $delay = 0; foreach ($prestasi_terkait as $p): ?>
                    <article class="card-modern bg-white rounded-3xl overflow-hidden shadow-lg group" 
                             data-aos="fade-up" 
                             data-aos-delay="<?= $delay ?>">
                        <!-- Image -->
                        <div class="relative h-48 md:h-64 overflow-hidden border-2 border-black">
                            <img
                                src="<?= base_url('uploads/prestasi/' . $p['gambar']) ?>"
                                alt="<?= esc($p['judul']) ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 space-y-4">
                            <p class="text-base font-semibold text-primary-dark">Prestasi</p>
                            <h3 class="text-base font-semibold text-black line-clamp-2 group-hover:text-primary-dark transition-colors">
                                <?= esc($p['judul']) ?>
                            </h3>
                            <p class="text-sm text-gray-600 flex items-center gap-2">
                                <i class="far fa-calendar-alt"></i>
                                <time datetime="<?= date('Y-m-d', strtotime($p['created_at'])) ?>">
                                    <?= date('d M Y', strtotime($p['created_at'])) ?>
                                </time>
                            </p>

                            <!-- Action Button -->
                            <a 
                                href="<?= base_url('prestasi/' . $p['slug']) ?>"
                                class="btn-ripple w-full bg-primary-light hover:bg-primary-dark text-black hover:text-white font-semibold py-3 px-6 rounded-lg transition-all text-sm inline-block text-center no-underline"
                            >
                                Lihat Selengkapnya
                            </a>
                        </div>
                    </article>
                <?php $delay += 100; endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Back Button Section -->
    <section class="py-8 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="<?= base_url('/') ?>#prestasi" class="btn-ripple bg-primary-light hover:bg-primary-dark text-black hover:text-white font-semibold py-3 px-8 rounded-xl inline-flex items-center gap-3 transition-all text-lg sm:text-xl no-underline shadow-lg hover:shadow-xl">
                <i class="fas fa-arrow-left text-xl"></i>
                Kembali ke Beranda
            </a>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>
