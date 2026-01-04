<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="min-h-screen bg-white">
    
    <!-- Main Content -->
    <section class="py-16 md:py-24 bg-white mt-3.5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Title Section -->
            <div class="text-center mb-10 sm:mb-12 md:mb-16">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-primary-dark mb-4 sm:mb-6">STRUKTUR ORGANISASI</h1>
                <h2 class="text-base sm:text-lg md:text-2xl lg:text-3xl font-bold text-black px-4">
                    Struktur Organisasi Pemerintahan Kelurahan
                </h2>
            </div>

            <!-- Organization Chart -->
            <div class="overflow-x-auto -mx-4 sm:mx-0 bg-gray-50 p-4 sm:p-6 rounded-lg">
                <svg class="w-full min-w-max" viewBox="0 0 1200 1300" style="min-height: 800px">
                    <!-- Level 1: Lurah -->
                    <foreignObject x="425" y="20" width="350" height="70">
                        <div class="bg-primary-light border-2 border-black px-8 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="text-center font-bold text-black text-lg">LURAH</p>
                        </div>
                    </foreignObject>

                    <!-- Line from Lurah to Sekretaris -->
                    <line x1="600" y1="90" x2="600" y2="150" stroke="black" stroke-width="2"/>

                    <!-- Level 2: Sekretaris Kelurahan -->
                    <foreignObject x="375" y="150" width="450" height="70">
                        <div class="bg-primary-light border-2 border-black px-8 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="text-center font-bold text-black text-lg">SEKRETARIS KELURAHAN</p>
                        </div>
                    </foreignObject>

                    <!-- Vertical line from Sekretaris down -->
                    <line x1="600" y1="220" x2="600" y2="280" stroke="black" stroke-width="2"/>
                    
                    <!-- Horizontal line to three sections -->
                    <line x1="250" y1="280" x2="950" y2="280" stroke="black" stroke-width="2"/>

                    <!-- Vertical lines to three sections -->
                    <line x1="250" y1="280" x2="250" y2="350" stroke="black" stroke-width="2"/>
                    <line x1="600" y1="280" x2="600" y2="350" stroke="black" stroke-width="2"/>
                    <line x1="950" y1="280" x2="950" y2="350" stroke="black" stroke-width="2"/>

                    <!-- Level 3: Three Sections -->
                    <!-- Left: Seksi Pemerintahan -->
                    <foreignObject x="75" y="350" width="350" height="70">
                        <div class="bg-primary-light border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-bold text-black text-base text-center">SEKSI PEMERINTAHAN</p>
                        </div>
                    </foreignObject>

                    <!-- Center: Seksi Ekonomi & Pembangunan -->
                    <foreignObject x="425" y="350" width="350" height="70">
                        <div class="bg-primary-light border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-bold text-black text-base text-center">SEKSI EKONOMI & PEMBANGUNAN</p>
                        </div>
                    </foreignObject>

                    <!-- Right: Seksi Kesejahteraan Rakyat -->
                    <foreignObject x="775" y="350" width="350" height="70">
                        <div class="bg-primary-light border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-bold text-black text-base text-center">SEKSI KESEJAHTERAAN RAKYAT</p>
                        </div>
                    </foreignObject>

                    <!-- Staff under each section -->
                    <!-- Left section staff -->
                    <line x1="250" y1="420" x2="250" y2="480" stroke="black" stroke-width="2"/>
                    <foreignObject x="75" y="480" width="350" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Staf Pengolah Data</p>
                        </div>
                    </foreignObject>
                    <foreignObject x="75" y="560" width="350" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Staf Penyusun</p>
                        </div>
                    </foreignObject>

                    <!-- Center section staff -->
                    <line x1="600" y1="420" x2="600" y2="480" stroke="black" stroke-width="2"/>
                    <foreignObject x="425" y="480" width="350" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Staf Pengolah Data</p>
                        </div>
                    </foreignObject>
                    <foreignObject x="425" y="560" width="350" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Staf Penyusun</p>
                        </div>
                    </foreignObject>

                    <!-- Right section staff -->
                    <line x1="950" y1="420" x2="950" y2="480" stroke="black" stroke-width="2"/>
                    <foreignObject x="775" y="480" width="350" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Staf Pengolah Data</p>
                        </div>
                    </foreignObject>
                    <foreignObject x="775" y="560" width="350" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Staf Penyusun</p>
                        </div>
                    </foreignObject>

                    <!-- Line to Sekretaris Staff -->
                    <line x1="600" y1="640" x2="600" y2="710" stroke="black" stroke-width="2"/>

                    <!-- Sekretaris Staff -->
                    <foreignObject x="300" y="710" width="600" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Bendahara Pengeluaran</p>
                        </div>
                    </foreignObject>
                    <foreignObject x="300" y="800" width="600" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Pengurus Barang Pembantu</p>
                        </div>
                    </foreignObject>
                    <foreignObject x="300" y="890" width="600" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Staf Pengolah Data</p>
                        </div>
                    </foreignObject>
                    <foreignObject x="300" y="980" width="600" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Staf Administrasi</p>
                        </div>
                    </foreignObject>
                    <foreignObject x="300" y="1070" width="600" height="60">
                        <div class="bg-white border-2 border-black px-6 py-3 rounded-lg h-full flex items-center justify-center">
                            <p class="font-semibold text-black text-sm text-center">Caraka</p>
                        </div>
                    </foreignObject>
                </svg>
            </div>

            <!-- Description -->
            <div class="mt-10 sm:mt-12 md:mt-16 bg-gray-50 p-4 sm:p-6 md:p-8 rounded-lg">
                <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-primary-dark mb-4 sm:mb-6">Penjelasan Struktur</h3>
                <div class="space-y-3 sm:space-y-4 text-gray-700 text-sm sm:text-base md:text-lg">
                    <p>
                        <span class="font-bold text-primary-light">Lurah</span> - Memimpin dan mengoordinasikan seluruh kegiatan pemerintahan kelurahan
                    </p>
                    <p>
                        <span class="font-bold text-primary-light">Sekretaris Kelurahan</span> - Menangani administrasi, keuangan, dan kepegawaian
                    </p>
                    <p>
                        <span class="font-bold text-primary-light">Seksi Pemerintahan</span> - Mengelola urusan pemerintahan dan ketentraman
                    </p>
                    <p>
                        <span class="font-bold text-primary-light">Seksi Ekonomi & Pembangunan</span> - Mengelola urusan ekonomi dan pembangunan
                    </p>
                    <p>
                        <span class="font-bold text-primary-light">Seksi Kesejahteraan Rakyat</span> - Mengelola urusan kesejahteraan dan sosial
                    </p>
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