<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">Push Notification</h1>
        <p class="text-muted mb-0">Kirim pemberitahuan ke seluruh warga yang berlangganan</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 fw-bold">Kirim Notifikasi Baru</h5>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('admin/notification/send') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label">Judul Notifikasi</label>
                        <input type="text" name="title" class="form-control" placeholder="Contoh: Pengumuman Kerja Bakti" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Pesan / Isi Notifikasi</label>
                        <textarea name="body" class="form-control" rows="3" placeholder="Tuliskan pesan singkat yang akan muncul di HP warga..." required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Link Tujuan (Opsional)</label>
                        <input type="text" name="url" class="form-control" placeholder="https://jagakarsa.go.id/berita/..." value="<?= base_url() ?>">
                        <small class="text-muted">Link yang akan terbuka saat notifikasi diklik</small>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary py-2">
                            <i class="bi bi-send-fill me-2"></i> Kirim ke Semua Subscriber
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="stats-card mb-4">
            <div class="stats-icon primary">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="stats-info">
                <h3><?= $subscriber_count ?? 0 ?></h3>
                <p>Total Subscriber Aktif</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 fw-bold">Panduan</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled small mb-0">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Gunakan kalimat yang singkat dan padat.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Hindari spam, kirim hanya informasi penting.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pastikan link tujuan aktif dan valid.</li>
                    <li><i class="bi bi-info-circle-fill text-info me-2"></i> Notifikasi dikirim serentak ke semua browser yang sudah mengaktifkan izin.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
