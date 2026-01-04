<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<?php
// Use data from controller, fallback to empty array if not set
if (!isset($pjlpCategories)) {
    $pjlpCategories = [];
}
?>

<div class="min-h-screen bg-white">
    
    <!-- Main Content -->
    <section class="py-12 sm:py-16 md:py-24 bg-white mt-3.5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Title Section -->
            <div class="text-center mb-10 sm:mb-12 md:mb-16">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-primary-dark mb-4 sm:mb-6 md:mb-8">
                    PJLP
                </h1>
                <p class="text-base sm:text-lg md:text-2xl lg:text-3xl font-bold text-black max-w-4xl mx-auto px-2 sm:px-4">
                    Petugas Jaga Lingkungan Permukiman
                </p>
                <p class="text-sm sm:text-base md:text-lg text-gray-600 mt-4 sm:mt-6 max-w-3xl mx-auto">
                    Tim profesional yang berkomitmen menjaga kebersihan, keindahan, dan kualitas lingkungan permukiman di Kelurahan Jagakarsa
                </p>
            </div>

            <!-- PJLP Categories -->
            <div class="space-y-8 sm:space-y-10 md:space-y-12 mb-12 sm:mb-16 md:mb-20">
                <?php foreach ($pjlpCategories as $category): ?>
                    <div class="bg-white rounded-2xl border-l-8 border-primary-dark shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="p-6 sm:p-8 md:p-10">
                            <!-- Header -->
                            <div class="mb-6 sm:mb-8">
                                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-primary-dark mb-3 sm:mb-4">
                                    <?= $category['title'] ?>
                                </h2>
                                <p class="text-base sm:text-lg md:text-xl font-semibold text-black mb-4 sm:mb-6">
                                    <?= $category['description'] ?>
                                </p>
                            </div>

                            <!-- Count Box -->
                            <?php if ($category['count'] !== null): ?>
                                <div class="bg-primary-light rounded-xl p-4 sm:p-5 md:p-6 mb-6 sm:mb-8 inline-block">
                                    <p class="text-xs sm:text-sm md:text-base font-semibold text-white mb-1 sm:mb-2">
                                        <?= $category['countLabel'] ?>
                                    </p>
                                    <p class="text-3xl sm:text-4xl md:text-5xl font-bold text-white">
                                        <?= $category['count'] ?>
                                    </p>
                                </div>
                            <?php endif; ?>

                            <!-- Main Tasks -->
                            <?php if (!empty($category['mainTasks'])): ?>
                                <div class="mt-8 sm:mt-10">
                                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-primary-dark mb-4 sm:mb-6">
                                        Tugas Utama:
                                    </h3>
                                    <ul class="space-y-3 sm:space-y-4">
                                        <?php foreach ($category['mainTasks'] as $task): ?>
                                            <li class="flex items-start gap-3 sm:gap-4">
                                                <i class="fas fa-check-circle text-[#FF9800] mt-1 sm:mt-1.5 flex-shrink-0 text-lg"></i>
                                                <span class="text-sm sm:text-base md:text-lg text-black leading-relaxed">
                                                    <?= $task ?>
                                                </span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
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