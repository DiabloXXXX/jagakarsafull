<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="min-h-screen bg-white">
  
    <!-- Main Content -->
    <section class="py-16 md:py-24 bg-gradient-to-b from-gray-50 to-white mt-3.5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Main Card -->
            <div class="bg-white rounded-3xl shadow-xl p-6 sm:p-8 md:p-12 lg:p-16 border border-gray-100 hover:shadow-2xl transition-shadow duration-500" data-aos="fade-up">
                <!-- Title -->
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-6xl font-extrabold gradient-text text-center mb-6 sm:mb-8 md:mb-12" data-aos="fade-down">
                    INFORMASI PELAYANAN <br /> KELURAHAN JAGAKARSA
                </h1>

                <!-- Orange Line -->
                <div class="w-full max-w-2xl mx-auto h-2 bg-gradient-to-r from-[#225808] via-[#99BD49] to-[#FF9800] rounded-full mb-6 sm:mb-8 md:mb-12"></div>

                <!-- Content Grid -->
                <div class="grid md:grid-cols-2 gap-6 sm:gap-8 md:gap-12 items-center">
                    <!-- QR Code Section -->
                    <div class="flex flex-col items-center justify-center" data-aos="fade-right" data-aos-delay="100">
                        <p class="text-sm sm:text-base md:text-2xl font-semibold text-black mb-4 sm:mb-6 md:mb-8 text-center">
                            Scan barcode atau klik link berikut:
                        </p>
                        <div class="bg-white p-3 sm:p-4 rounded-xl border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all hover:scale-105 duration-300">
                            <img
                                src="<?= base_url('images/features/qr-code.png') ?>"
                                alt="QR Code Pelayanan Kelurahan Jagakarsa"
                                class="w-40 sm:w-48 md:w-64 h-40 sm:h-48 md:h-64 object-contain"
                            />
                        </div>
                    </div>

                    <!-- Information Section -->
                    <div class="space-y-6 sm:space-y-8" data-aos="fade-left" data-aos-delay="200">
                        <!-- Link -->
                        <div>
                            <a href="https://bit.ly/pelayanankelurahanjagakarsa" target="_blank" class="link-animated text-base sm:text-lg md:text-3xl font-semibold text-primary-base break-all">
                                bit.ly/pelayanankelurahanjagakarsa
                            </a>
                        </div>

                        <!-- Operating Hours -->
                        <div class="space-y-3 sm:space-y-4">
                            <h3 class="text-lg sm:text-xl md:text-3xl font-bold text-black flex items-center gap-2 sm:gap-3">
                                <i class="far fa-clock sm:text-3xl text-primary-dark"></i>
                                Jam Operasional
                            </h3>
                            <div class="space-y-2 sm:space-y-3 ml-8 sm:ml-10 md:ml-12">
                                <div>
                                    <p class="text-sm sm:text-base md:text-2xl font-semibold text-black">
                                        Senin s.d Kamis:
                                        <span class="text-primary-dark font-bold">7.30 s.d 16.00 WIB</span>
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm sm:text-base md:text-2xl font-semibold text-black">
                                        Jumat:
                                        <span class="text-primary-dark font-bold">7.30 s.d 16.30 WIB</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information Card -->
            <div class="mt-8 sm:mt-12 md:mt-16 bg-primary-dark rounded-lg p-6 sm:p-8 md:p-12 text-white">
                <h3 class="text-lg sm:text-2xl md:text-3xl font-bold mb-6 sm:mb-8 text-white">Hubungi Kami untuk Informasi Lebih Lanjut</h3>
                <div class="grid md:grid-cols-2 gap-6 sm:gap-8">
                    <div class="flex items-start gap-3 sm:gap-4">
                        <i class="fas fa-phone-alt sm:text-2xl flex-shrink-0 mt-1"></i>
                        <div>
                            <p class="text-sm sm:text-base font-semibold mb-1 sm:mb-2">Telepon</p>
                            <p class="text-base sm:text-lg md:text-2xl font-bold">021-7270954</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 sm:gap-4">
                         <i class="fas fa-envelope sm:text-2xl flex-shrink-0 mt-1"></i>
                        <div>
                            <p class="text-sm sm:text-base font-semibold mb-1 sm:mb-2">Email</p>
                            <p class="text-base sm:text-lg md:text-2xl font-bold break-all">kel_jagakarsa@jakarta.go.id</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 sm:gap-4 md:col-span-2">
                         <i class="fas fa-map-marker-alt sm:text-2xl flex-shrink-0 mt-1"></i>
                        <div>
                            <p class="text-sm sm:text-base font-semibold mb-1 sm:mb-2">Alamat</p>
                            <p class="text-sm sm:text-base md:text-2xl font-bold">
                                Jl. Jagakarsa II No.1, RT.1/RW.7, Jagakarsa, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12620
                            </p>
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