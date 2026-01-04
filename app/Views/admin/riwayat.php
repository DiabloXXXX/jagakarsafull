<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('page-Content'); ?>

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">Riwayat Perubahan</h1>
        <p class="text-muted mb-0">Log semua aktivitas di panel admin</p>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="get" action="<?= base_url('admin/riwayat') ?>" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Module</label>
                <select name="module" class="form-select">
                    <option value="">Semua Module</option>
                    <?php foreach ($modules as $mod): ?>
                        <option value="<?= esc($mod) ?>" <?= $currentModule === $mod ? 'selected' : '' ?>><?= ucfirst(esc($mod)) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Action</label>
                <select name="action" class="form-select">
                    <option value="">Semua Action</option>
                    <?php foreach ($actions as $act): ?>
                        <option value="<?= esc($act) ?>" <?= $currentAction === $act ? 'selected' : '' ?>><?= ucfirst(esc($act)) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Cari</label>
                <input type="text" name="search" class="form-control" placeholder="Cari deskripsi..." value="<?= esc($search ?? '') ?>">
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">
                    <i class="bi bi-search me-1"></i> Filter
                </button>
                <a href="<?= base_url('admin/riwayat') ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Activity Log Table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 160px;">Waktu</th>
                        <th style="width: 120px;">User</th>
                        <th style="width: 100px;">Action</th>
                        <th style="width: 100px;">Module</th>
                        <th>Deskripsi</th>
                        <th style="width: 120px;">IP Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($activities)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox display-4 d-block mb-3"></i>
                                Belum ada aktivitas tercatat
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($activities as $activity): ?>
                            <tr>
                                <td>
                                    <small class="text-muted">
                                        <?= date('d M Y', strtotime($activity['created_at'])) ?><br>
                                        <span class="text-dark"><?= date('H:i:s', strtotime($activity['created_at'])) ?></span>
                                    </small>
                                </td>
                                <td>
                                    <span class="fw-semibold"><?= esc($activity['username'] ?? 'System') ?></span>
                                </td>
                                <td>
                                    <?php
                                    $actionBadge = [
                                        'create' => 'success',
                                        'update' => 'warning',
                                        'delete' => 'danger',
                                        'login' => 'info',
                                        'logout' => 'secondary'
                                    ];
                                    $badge = $actionBadge[$activity['action']] ?? 'secondary';
                                    ?>
                                    <span class="badge bg-<?= $badge ?>"><?= ucfirst(esc($activity['action'])) ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark"><?= ucfirst(esc($activity['module'])) ?></span>
                                </td>
                                <td>
                                    <?= esc($activity['description']) ?>
                                </td>
                                <td>
                                    <code class="small"><?= esc($activity['ip_address'] ?? '-') ?></code>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <?php if (!empty($activities) && $pager): ?>
    <div class="card-footer bg-white">
        <div class="d-flex justify-content-center">
            <?= $pager->links() ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>
