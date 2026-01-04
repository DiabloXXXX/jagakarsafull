<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="min-h-screen bg-white">
    
    <!-- Hero/Header Section -->
    <section class="py-16 md:py-24 bg-gradient-to-b from-gray-50 to-white mt-3.5 border-b border-gray-100" data-aos="fade-in">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-primary-dark font-bold text-sm sm:text-base mb-4 tracking-wider uppercase" data-aos="fade-down">
                <?= esc($berita['kategori'] ?? 'Berita') ?>
            </p>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-black mb-6 leading-tight" data-aos="fade-up" data-aos-delay="100">
                <?= esc($berita['judul']) ?>
            </h1>
            <div class="flex items-center justify-center gap-6 text-gray-500 text-sm sm:text-base" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary-light rounded-full flex items-center justify-center">
                        <i class="far fa-user text-white text-sm"></i>
                    </div>
                    <span class="font-medium"><?= esc($berita['penulis'] ?? 'Admin') ?></span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center">
                        <i class="far fa-calendar-alt text-white text-sm"></i>
                    </div>
                    <span class="font-medium"><?= date('d M Y', strtotime($berita['created_at'])) ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 md:py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Image -->
            <?php if (!empty($berita['gambar'])): ?>
            <div class="rounded-3xl overflow-hidden shadow-2xl mb-10 sm:mb-12 group" data-aos="zoom-in">
                <img
                    src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>"
                    alt="<?= esc($berita['judul']) ?>"
                    class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700"
                    loading="lazy"
                />
            </div>
            <?php endif; ?>

            <!-- Body Text -->
            <article class="prose prose-lg md:prose-xl max-w-none text-black leading-relaxed" data-aos="fade-up">
                <div class="first-letter:text-5xl first-letter:font-bold first-letter:text-primary-dark first-letter:float-left first-letter:mr-3 first-letter:mt-1">
                    <?= $berita['konten'] ?>
                </div>
            </article>

            <!-- Share Buttons -->
            <div class="mt-10 pt-6 border-t border-gray-200" data-aos="fade-up">
                <p class="text-sm font-semibold text-gray-600 mb-3">Bagikan artikel ini:</p>
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>" target="_blank" 
                       class="w-10 h-10 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-all hover:scale-110 no-underline">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>&text=<?= urlencode($berita['judul']) ?>" target="_blank" 
                       class="w-10 h-10 bg-sky-500 hover:bg-sky-600 text-white rounded-full flex items-center justify-center transition-all hover:scale-110 no-underline">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text=<?= urlencode($berita['judul'] . ' ' . current_url()) ?>" target="_blank" 
                       class="w-10 h-10 bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center transition-all hover:scale-110 no-underline">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <button onclick="navigator.clipboard.writeText('<?= current_url() ?>'); alert('Link berhasil disalin!');" 
                            class="w-10 h-10 bg-gray-600 hover:bg-gray-700 text-white rounded-full flex items-center justify-center transition-all hover:scale-110 cursor-pointer border-none">
                        <i class="fas fa-link"></i>
                    </button>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-12 sm:mt-16 pt-8 border-t border-gray-200">
                <a href="<?= base_url('berita') ?>" class="btn-ripple bg-primary-light hover:bg-primary-dark text-black hover:text-white font-semibold py-3 px-8 rounded-xl inline-flex items-center gap-3 transition-all text-lg sm:text-xl no-underline shadow-lg hover:shadow-xl">
                     <i class="fas fa-arrow-left text-xl"></i>
                    Kembali ke Berita
                </a>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>