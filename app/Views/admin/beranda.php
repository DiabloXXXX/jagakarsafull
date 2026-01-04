<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>
<div class="container-xxl grow container-p-y">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show fw-bold" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show fw-bold" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0">Edit Beranda & Tentang</h5>
            <a href="<?= base_url('/admin/halaman') ?>" class="btn btn-outline-secondary btn-sm">
                <i class="bx bx-arrow-back me-1"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="<?= base_url('/admin/halaman/editberanda-content/update') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <!-- Hero Section -->
                <div class="border rounded p-3 mb-4">
                    <h6 class="fw-bold text-primary mb-3"><i class="bx bx-home-circle me-2"></i>Hero Section</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Judul Hero</label>
                            <input type="text" class="form-control" name="hero_title" 
                                   value="<?= esc($h['hero_title'] ?? 'Selamat Datang di Website Kelurahan Jagakarsa') ?>" 
                                   placeholder="Judul utama di hero section">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subtitle Hero</label>
                            <input type="text" class="form-control" name="hero_subtitle" 
                                   value="<?= esc($h['hero_subtitle'] ?? 'Melayani dengan Sepenuh Hati untuk Masyarakat Jagakarsa') ?>" 
                                   placeholder="Teks pendukung di bawah judul">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Gambar Hero (Background)</label>
                            <input type="file" class="form-control" name="hero_image" accept="image/*">
                            <small class="text-muted">Ukuran rekomendasi: 1920x1080px. Format: JPG, PNG, WebP</small>
                            <?php if (!empty($h['hero_image'])): ?>
                                <div class="mt-2">
                                    <img src="<?= base_url('uploads/halaman/' . $h['hero_image']) ?>" 
                                         alt="Hero Image" class="img-thumbnail" style="max-height: 150px;">
                                    <span class="text-muted ms-2"><?= $h['hero_image'] ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Tentang Section -->
                <div class="border rounded p-3 mb-4">
                    <h6 class="fw-bold text-primary mb-3"><i class="bx bx-info-circle me-2"></i>Section Tentang Kelurahan</h6>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Judul Section Tentang</label>
                            <input type="text" class="form-control" name="tentang_title" 
                                   value="<?= esc($h['tentang_title'] ?? 'Tentang Kelurahan Jagakarsa') ?>" 
                                   placeholder="Judul section tentang">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Paragraf Tentang 1</label>
                            <textarea class="form-control" name="tentang_text1" rows="4" 
                                      placeholder="Paragraf pertama tentang kelurahan"><?= esc($h['tentang_text1'] ?? 'Kelurahan Jagakarsa merupakan salah satu kelurahan di wilayah Kecamatan Jagakarsa, Kota Administrasi Jakarta Selatan. Kelurahan ini berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat.') ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Paragraf Tentang 2</label>
                            <textarea class="form-control" name="tentang_text2" rows="4" 
                                      placeholder="Paragraf kedua tentang kelurahan"><?= esc($h['tentang_text2'] ?? 'Dengan berbagai program dan layanan yang tersedia, kami berupaya untuk memenuhi kebutuhan administrasi dan sosial warga dengan cepat, tepat, dan transparan.') ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Data Wilayah -->
                <div class="border rounded p-3 mb-4">
                    <h6 class="fw-bold text-primary mb-3"><i class="bx bx-map me-2"></i>Data Wilayah</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Luas Wilayah</label>
                            <input type="text" class="form-control" name="luas_wilayah" 
                                   value="<?= esc($h['luas_wilayah'] ?? '479 Ha') ?>" 
                                   placeholder="Contoh: 479 Ha">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jumlah RW</label>
                            <input type="number" class="form-control" name="jumlah_rw" 
                                   value="<?= esc($h['jumlah_rw'] ?? '16') ?>" 
                                   placeholder="Contoh: 16">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jumlah RT</label>
                            <input type="number" class="form-control" name="jumlah_rt" 
                                   value="<?= esc($h['jumlah_rt'] ?? '172') ?>" 
                                   placeholder="Contoh: 172">
                        </div>
                    </div>
                </div>

                <!-- Batas Wilayah -->
                <div class="border rounded p-3 mb-4">
                    <h6 class="fw-bold text-primary mb-3"><i class="bx bx-compass me-2"></i>Batas Wilayah</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Batas Utara</label>
                            <textarea class="form-control" name="batas_utara" rows="2" 
                                      placeholder="Deskripsi batas utara"><?= esc($h['batas_utara'] ?? 'Kelurahan Ciganjur dan Kelurahan Lenteng Agung, Kecamatan Jagakarsa') ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Batas Selatan</label>
                            <textarea class="form-control" name="batas_selatan" rows="2" 
                                      placeholder="Deskripsi batas selatan"><?= esc($h['batas_selatan'] ?? 'Kelurahan Cinere, Kota Depok') ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Batas Timur</label>
                            <textarea class="form-control" name="batas_timur" rows="2" 
                                      placeholder="Deskripsi batas timur"><?= esc($h['batas_timur'] ?? 'Kelurahan Ciganjur, Kecamatan Jagakarsa') ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Batas Barat</label>
                            <textarea class="form-control" name="batas_barat" rows="2" 
                                      placeholder="Deskripsi batas barat"><?= esc($h['batas_barat'] ?? 'Kelurahan Srengseng Sawah, Kecamatan Jagakarsa') ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Gambar Peta -->
                <div class="border rounded p-3 mb-4">
                    <h6 class="fw-bold text-primary mb-3"><i class="bx bx-image me-2"></i>Gambar Peta Wilayah</h6>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Upload Gambar Peta</label>
                            <input type="file" class="form-control" name="gambar_peta" accept="image/*">
                            <small class="text-muted">Gambar peta kelurahan yang ditampilkan di section tentang. Format: JPG, PNG, WebP</small>
                            <?php if (!empty($h['gambar_peta'])): ?>
                                <div class="mt-2">
                                    <img src="<?= base_url('uploads/halaman/' . $h['gambar_peta']) ?>" 
                                         alt="Peta Wilayah" class="img-thumbnail" style="max-height: 200px;">
                                    <span class="text-muted ms-2"><?= $h['gambar_peta'] ?></span>
                                </div>
                            <?php else: ?>
                                <div class="mt-2 text-muted">
                                    <small>Saat ini menggunakan gambar default: images/features/map-kelurahan-jagakarsa.png</small>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-3 px-4 shadow-sm fw-bold">
                        <i class="bx bx-save me-1"></i> Simpan Perubahan
                    </button>
                    <a href="<?= base_url('/admin/halaman') ?>" class="btn btn-outline-secondary px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
