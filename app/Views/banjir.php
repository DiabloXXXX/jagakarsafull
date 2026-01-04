<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="min-h-screen bg-white">
    
    <!-- Main Content -->
    <section class="py-16 md:py-24 bg-white mt-3.5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Title Section -->
            <div class="text-center mb-16">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-black mb-8">AREA RAWAN BANJIR</h1>
            </div>

            <!-- Map Section -->
            <div class="mb-16">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                    <img
                        src="<?= base_url('images/features/peta-banjir.png') ?>"
                        alt="Peta Area Rawan Banjir Kelurahan Jagakarsa"
                        class="w-full h-auto object-cover rounded-3xl"
                    />
                </div>
            </div>

            <!-- Information Cards -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <!-- Warning Card -->
                <div class="bg-red-50 border-2 border-red-300 rounded-lg p-8">
                    <div class="flex items-start gap-4">
                        <i class="fas fa-exclamation-triangle sm:text-4xl text-red-600 flex-shrink-0 mt-1"></i>
                        <div>
                            <h3 class="text-2xl font-bold text-red-700 mb-4">Peringatan Banjir</h3>
                            <p class="text-lg font-semibold text-gray-700 leading-relaxed">
                                Kelurahan Jagakarsa memiliki beberapa area yang rawan terhadap banjir, terutama pada musim hujan. Masyarakat diharapkan untuk selalu waspada dan mengikuti instruksi dari pemerintah kelurahan.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Safety Tips Card -->
                <div class="bg-green-50 border-2 border-primary-light rounded-lg p-8">
                    <div class="flex items-start gap-4">
                        <i class="fas fa-map-marker-alt sm:text-4xl text-primary-dark flex-shrink-0 mt-1"></i>
                        <div>
                            <h3 class="text-2xl font-bold text-primary-dark mb-4">Tips Keselamatan</h3>
                            <ul class="space-y-3 text-lg font-semibold text-gray-700 list-none">
                                <li>✓ Siapkan tas darurat berisi dokumen penting</li>
                                <li>✓ Ketahui rute evakuasi terdekat</li>
                                <li>✓ Pantau informasi cuaca dan peringatan banjir</li>
                                <li>✓ Hubungi petugas jika ada keadaan darurat</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flood-Prone Areas List -->
            <div class="bg-gray-50 rounded-lg p-12 mb-16">
                <h3 class="text-3xl font-bold text-primary-dark mb-8">Area Rawan Banjir</h3>
                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-lg border-l-4 border-primary-light">
                        <h4 class="text-2xl font-bold text-primary-dark mb-2">RT 01 - RT 03 (RW 01)</h4>
                        <p class="text-lg font-semibold text-gray-700">
                            Area dekat dengan saluran drainase utama, rawan banjir saat curah hujan tinggi
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg border-l-4 border-primary-light">
                        <h4 class="text-2xl font-bold text-primary-dark mb-2">RT 04 - RT 06 (RW 03)</h4>
                        <p class="text-lg font-semibold text-gray-700">
                            Lokasi yang lebih rendah, sering tergenang air pada musim hujan
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg border-l-4 border-primary-light">
                        <h4 class="text-2xl font-bold text-primary-dark mb-2">RT 07 - RT 09 (RW 05)</h4>
                        <p class="text-lg font-semibold text-gray-700">
                            Area pemukiman padat yang memerlukan perhatian khusus dalam penanganan banjir
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-primary-dark rounded-lg p-12 text-white mb-16">
                <h3 class="text-3xl font-bold mb-8 text-white">Hubungi Kami Saat Darurat</h3>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-lg font-semibold mb-2">Kantor Kelurahan Jagakarsa</p>
                        <p class="text-xl font-bold">021-7270954</p>
                    </div>
                    <div>
                        <p class="text-lg font-semibold mb-2">Email</p>
                        <p class="text-xl font-bold break-all">kel_jagakarsa@jakarta.go.id</p>
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