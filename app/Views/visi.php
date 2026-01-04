<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="min-h-screen bg-gradient-to-b from-primary-lighter to-white">
  
    <!-- Main Content -->
    <section class="py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Vision Section -->
            <div class="mb-12" data-aos="fade-up">
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-3xl shadow-xl p-8 md:p-12 border-2 border-yellow-200 hover:shadow-2xl transition-all duration-500 group">
                    <div class="flex items-start gap-8">
                        <!-- Arrow Icons -->
                        <div class="flex gap-2 flex-shrink-0 pt-2">
                            <div class="w-10 h-10 bg-primary-base rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-chevron-right text-white"></i>
                            </div>
                            <div class="w-10 h-10 bg-[#FF9800] rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform" style="transition-delay: 0.1s;">
                                <i class="fas fa-chevron-right text-white"></i>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1">
                            <h2 class="text-5xl md:text-6xl font-extrabold gradient-text mb-6">Visi</h2>
                            <p class="text-lg md:text-xl font-semibold text-black leading-relaxed">
                                Jakarta baru, Kota Modern yang tertata rapih, menjadi tempat hunian yang dan manusiawi, memiliki masyarakat yang berkebudayaan, dan dengan pemerintahan yang berorientasi pada pelayanan publik.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mission Section -->
            <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gradient-to-br from-green-50 to-primary-lightest rounded-3xl shadow-xl p-8 md:p-12 border-2 border-primary-light hover:shadow-2xl transition-all duration-500 group">
                    <div class="flex items-start gap-8">
                        <!-- Arrow Icons -->
                        <div class="flex gap-2 flex-shrink-0 pt-2">
                            <div class="w-10 h-10 bg-primary-base rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-chevron-right text-white"></i>
                            </div>
                            <div class="w-10 h-10 bg-[#FF9800] rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform" style="transition-delay: 0.1s;">
                                <i class="fas fa-chevron-right text-white"></i>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1">
                            <h2 class="text-5xl md:text-6xl font-extrabold gradient-text mb-8">Misi</h2>

                            <div class="space-y-6">
                                <div class="flex items-start gap-4 hover:translate-x-2 transition-transform">
                                    <i class="fas fa-check-circle text-2xl text-primary-dark mt-1 flex-shrink-0"></i>
                                    <p class="text-lg md:text-xl font-semibold text-black leading-relaxed">
                                        Sebagai kota modern yang tertata rapih serta konsisten dengan rencana tata ruang wilayah.
                                    </p>
                                </div>
                                <div class="flex items-start gap-4 hover:translate-x-2 transition-transform">
                                    <i class="fas fa-check-circle text-2xl text-primary-dark mt-1 flex-shrink-0"></i>
                                    <p class="text-lg md:text-xl font-semibold text-black leading-relaxed">
                                        Menjamin ketersediaan hunian dan ruang publik yang layak serta terjangkau bagi warga kota.
                                    </p>
                                </div>
                                <div class="flex items-start gap-4 hover:translate-x-2 transition-transform">
                                    <i class="fas fa-check-circle text-2xl text-primary-dark mt-1 flex-shrink-0"></i>
                                    <p class="text-lg md:text-xl font-semibold text-black leading-relaxed">
                                        Membangun budaya masyarakat perkotaan yang toleran, tetapi juga sekaligus memiliki kesadaran dalam memelihara Wilayah/lingkungan.
                                    </p>
                                </div>
                                <div class="flex items-start gap-4 hover:translate-x-2 transition-transform">
                                    <i class="fas fa-check-circle text-2xl text-primary-dark mt-1 flex-shrink-0"></i>
                                    <p class="text-lg md:text-xl font-semibold text-black leading-relaxed">
                                        Membangun pemerintahan yang bersih dan transparan serta berorientasi pada pelayanan publik.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <a href="<?= base_url('/') ?>" class="btn-ripple mt-12 bg-primary-light hover:bg-primary-dark text-black hover:text-white font-semibold py-3 px-8 rounded-xl inline-flex items-center gap-3 transition-all text-2xl no-underline shadow-lg hover:shadow-xl" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-arrow-left text-2xl"></i>
                Kembali
            </a>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>