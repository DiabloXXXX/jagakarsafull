<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>
<div class="container-xxl grow container-p-y">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show fw-bold" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card mb-6">
        <div class="card-body pt-4">

            <form id="#" action="<?= base_url('/admin/editstruktur/update') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <h5 class="fw-bold">Ubah Foto Struktur Organisasi</h5>
                <!-- Preview gambar lama -->
                <?php if (!empty($h['gambar_struktur'])) : ?>
                    <div class="mb-2">
                        <img
                            src="<?= base_url('uploads/halaman/' . $h['gambar_struktur']) ?>"
                            alt="Struktur Organisasi"
                            class="img-thumbnail"
                            style="max-height: 200px;">
                    </div>
                <?php endif; ?>

                <!-- Input upload -->
                <input
                    type="file"
                    name="gambar_struktur"
                    class="form-control"
                    accept="image/*">
                <img id="preview" style="max-height:200px; display:none">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary me-3">Simpan</button>
                    <a href="<?= base_url('/halaman') ?>" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function previewImg(input) {
        const img = document.getElementById('preview');
        img.src = URL.createObjectURL(input.files[0]);
        img.style.display = 'block';
    }
</script>
<?= $this->endSection(); ?>