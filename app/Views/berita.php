<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="min-h-screen bg-white">
    
    <!-- Main Content -->
    <section class="py-16 md:py-24 bg-white mt-3.5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Title Section -->
            <div class="text-center mb-10 sm:mb-12 md:mb-16" data-aos="fade-up">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold gradient-text mb-4 sm:mb-6">BERITA KELURAHAN</h1>
                <div class="h-1 w-32 bg-gradient-to-r from-[#225808] via-[#99BD49] to-[#FF9800] mx-auto rounded-full mb-6"></div>
                <p class="text-base sm:text-lg md:text-2xl lg:text-3xl font-bold text-gray-700 max-w-4xl mx-auto px-4">
                    Pusat berita dan informasi terbaru dari Kelurahan Jagakarsa untuk masyarakat
                </p>
            </div>

            <!-- News Grid -->
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8 mb-10 sm:mb-12 md:mb-16">
                <?php $delay = 0; foreach ($berita as $item): ?>
                    <div class="card-modern bg-white rounded-3xl overflow-hidden shadow-lg group" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                        <!-- Image -->
                        <div class="relative h-40 sm:h-48 md:h-72 overflow-hidden rounded-t-3xl border-b border-gray-100">
                            <?php if (!empty($item['gambar'])): ?>
                             <img
                                src="<?= base_url('uploads/berita/' . $item['gambar']) ?>"
                                alt="<?= esc($item['judul']) ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy"
                            />
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <?php else: ?>
                            <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <i class="fas fa-newspaper text-5xl text-gray-300"></i>
                            </div>
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <div class="p-4 sm:p-6 md:p-8 flex flex-col justify-between min-h-48 sm:min-h-56 md:min-h-60">
                            <div>
                                <h3 class="text-sm sm:text-base md:text-xl font-bold text-primary-dark mb-2 sm:mb-3 md:mb-4 line-clamp-3 group-hover:text-primary-base transition-colors">
                                    <a href="<?= base_url('berita/' . $item['slug']) ?>" class="link-animated">
                                        <?= esc($item['judul']) ?>
                                    </a>
                                </h3>
                                <div class="text-xs sm:text-sm md:text-base font-semibold text-gray-600 line-clamp-2">
                                    <?= substr(strip_tags($item['konten']), 0, 150) ?>...
                                </div>
                            </div>

                            <!-- Footer Info -->
                            <div class="space-y-2 sm:space-y-3 pt-3 sm:pt-4 border-t border-gray-200 mt-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 bg-primary-light rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-xs text-white"></i>
                                    </div>
                                    <p class="text-xs sm:text-sm font-semibold text-black"><?= esc($item['penulis'] ?? 'Admin') ?></p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="far fa-calendar-alt sm:text-lg text-primary-dark"></i>
                                    <p class="text-xs sm:text-sm font-semibold text-primary-dark">
                                        <?= date('d M Y', strtotime($item['created_at'])) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $delay += 100; endforeach; ?>
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-center mt-8">
               <?= $pager->links('default', 'custom_pagination') ?>
            </div>

            <!-- Back Button -->
            <a href="<?= base_url('/') ?>" class="btn-ripple mt-8 sm:mt-10 md:mt-12 bg-primary-light hover:bg-primary-dark text-black hover:text-white font-semibold py-2 sm:py-3 px-6 sm:px-8 rounded-xl inline-flex items-center gap-2 sm:gap-3 transition-all text-sm sm:text-base md:text-2xl no-underline shadow-lg hover:shadow-xl">
                <i class="fas fa-arrow-left sm:w-7 sm:h-7 text-xl"></i>
                Kembali
            </a>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>