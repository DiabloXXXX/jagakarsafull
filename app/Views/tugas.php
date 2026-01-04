<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<?php
// Data $tasks sekarang dikirim dari controller
// Jika tidak ada data dari database, gunakan array kosong
if (!isset($tasks)) {
    $tasks = [];
}
?>

<div class="min-h-screen bg-primary-lighter">
    
    <!-- Main Content -->
    <section class="py-16 md:py-24 bg-primary-lighter">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Title Section -->
            <div class="text-center mb-10 sm:mb-12 md:mb-16">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-primary-dark mb-4 sm:mb-6 md:mb-8">TUGAS</h1>
                <h2 class="text-base sm:text-lg md:text-2xl lg:text-3xl font-bold text-black px-4">
                    Peran dari masing-masing unsur perangkat kelurahan
                </h2>
            </div>

            <!-- Tasks Accordion -->
            <div class="space-y-4 mb-10 sm:mb-12 md:mb-16">
                <?php foreach ($tasks as $index => $task): ?>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <!-- Accordion Header -->
                        <button onclick="toggleAccordion(<?= $task['id'] ?>)" class="w-full p-5 sm:p-6 md:p-8 text-left flex items-center justify-between gap-4 group">
                            <div class="flex-1">
                                <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 group-hover:text-primary-dark transition-colors">
                                    <?= $task['title'] ?>
                                </h3>
                                <p class="text-sm sm:text-base md:text-lg text-gray-600 mt-1">
                                    <?= $task['shortDescription'] ?>
                                </p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-primary-lighter flex items-center justify-center flex-shrink-0 group-hover:bg-primary-light transition-colors">
                                <i id="chevron-<?= $task['id'] ?>" class="fas fa-chevron-down text-primary-dark transition-transform duration-300"></i>
                            </div>
                        </button>

                        <!-- Accordion Content -->
                        <div id="content-<?= $task['id'] ?>" class="accordion-content" style="max-height: 0; overflow: hidden; transition: max-height 0.4s ease-out;">
                            <div class="px-5 sm:px-6 md:px-8 pb-5 sm:pb-6 md:pb-8 border-t border-gray-100">
                                <div class="pt-5 space-y-3">
                                    <?php foreach ($task['fullDescription'] as $idx => $item): ?>
                                        <div class="flex gap-3 items-start">
                                            <span class="w-7 h-7 rounded-full bg-primary-base text-white text-sm font-bold flex items-center justify-center flex-shrink-0">
                                                <?= $idx + 1 ?>
                                            </span>
                                            <p class="text-sm sm:text-base md:text-lg text-gray-700 leading-relaxed pt-0.5">
                                                <?= $item ?>
                                            </p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Back Button -->
            <div class="text-center" data-aos="fade-up">
                <a href="<?= base_url('/') ?>" class="inline-flex items-center gap-3 bg-primary-base hover:bg-primary-dark text-white font-semibold py-3 px-8 rounded-full transition-all duration-300 hover:shadow-lg hover:-translate-y-1 no-underline">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </section>
</div>

<script>
    function toggleAccordion(id) {
        const content = document.getElementById('content-' + id);
        const chevron = document.getElementById('chevron-' + id);
        
        // Close all other accordions
        document.querySelectorAll('.accordion-content').forEach(item => {
            if (item.id !== 'content-' + id) {
                item.style.maxHeight = '0';
            }
        });
        document.querySelectorAll('[id^="chevron-"]').forEach(icon => {
            if (icon.id !== 'chevron-' + id) {
                icon.classList.remove('rotate-180');
            }
        });
        
        // Toggle current accordion
        if (content.style.maxHeight === '0px' || content.style.maxHeight === '') {
            content.style.maxHeight = content.scrollHeight + 'px';
            chevron.classList.add('rotate-180');
        } else {
            content.style.maxHeight = '0';
            chevron.classList.remove('rotate-180');
        }
    }
</script>

<?= $this->endSection(); ?>