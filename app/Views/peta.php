<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="min-h-screen bg-white">
  
    <!-- Main Content -->
    <section class="py-12 sm:py-16 md:py-24 bg-white mt-3.5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button -->
            <a href="<?= base_url('/tentang') ?>" class="mb-8 sm:mb-10 md:mb-12 bg-primary-light hover:bg-primary-dark text-black font-semibold py-2 sm:py-3 px-6 sm:px-8 rounded-lg inline-flex items-center gap-2 sm:gap-3 transition-all transform hover:scale-105 text-sm sm:text-base md:text-2xl no-underline">
                <i class="fas fa-arrow-left sm:w-7 sm:h-7 text-xl"></i>
                Kembali
            </a>

            <!-- Title -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-primary-dark mb-8 sm:mb-12 md:mb-16">
                Peta Kelurahan Jagakarsa
            </h1>

            <div class="grid gap-8 sm:gap-10 md:gap-12 md:grid-cols-2 items-start">
                <!-- Map Section -->
                <div class="flex items-center justify-center">
                    <div class="w-full rounded-3xl shadow-lg overflow-hidden">
                        <img
                            src="<?= base_url('images/features/map-kelurahan-jagakarsa.png') ?>"
                            alt="Peta Kelurahan Jagakarsa"
                            class="w-full h-56 sm:h-72 md:h-[499px] object-cover rounded-3xl"
                        />
                    </div>
                </div>

                <!-- Info Section -->
                <div class="flex flex-col justify-center space-y-6 sm:space-y-8">
                    <!-- Statistics -->
                    <div class="space-y-3 sm:space-y-4">
                        <div>
                            <p class="text-sm sm:text-base md:text-xl">
                                <span class="font-bold text-primary-dark">Luas Kelurahan :</span>
                                <span class="font-semibold text-black ml-1 sm:ml-2">4,850,000 m²</span>
                            </p>
                        </div>
                        <div>
                            <p class="text-sm sm:text-base md:text-xl">
                                <span class="font-bold text-primary-dark">RW :</span>
                                <span class="font-semibold text-black ml-1 sm:ml-2">7</span>
                            </p>
                        </div>
                        <div>
                            <p class="text-sm sm:text-base md:text-xl">
                                <span class="font-bold text-primary-dark">RT :</span>
                                <span class="font-semibold text-black ml-1 sm:ml-2">82</span>
                            </p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2 sm:space-y-3">
                        <p class="text-sm sm:text-base md:text-xl font-semibold text-black">
                            Kunjungi lokasi kami! Klik tombol Google Maps di bawah ini untuk petunjuk arah
                        </p>
                    </div>

                    <!-- Google Maps Button -->
                    <a
                        href="https://www.google.com/maps/search/Kelurahan+Jagakarsa,+Jakarta+Selatan/@-6.3667,106.8167,15z"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 sm:gap-3 bg-primary-light hover:bg-primary-dark text-black font-semibold py-2 sm:py-3 px-4 sm:px-8 rounded-lg transition-all transform hover:scale-105 text-sm sm:text-base md:text-2xl w-full sm:w-fit justify-center sm:justify-start no-underline"
                    >
                        <i class="fas fa-map-marker-alt sm:w-7 sm:h-7 text-xl"></i>
                        Lihat di Google Maps
                        <i class="fas fa-external-link-alt sm:w-6 sm:h-6 text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>
