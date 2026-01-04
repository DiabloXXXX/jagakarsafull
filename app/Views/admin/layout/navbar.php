<!-- Top Navbar -->
<?php 
$activityModel = new \App\Models\ActivityLogModel();
$recentActivities = $activityModel->getRecent(5);
?>
<nav class="admin-navbar">
    <div class="d-flex align-items-center gap-3">
        <!-- Mobile Toggle -->
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="bi bi-list fs-5"></i>
        </button>
        
        <!-- Search -->
        <div class="navbar-search">
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Cari...">
        </div>
    </div>
    
    <div class="navbar-actions">
        <!-- Notifications / Activity Log -->
        <div class="dropdown">
            <button class="navbar-icon-btn" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell"></i>
                <?php if (count($recentActivities) > 0): ?>
                    <span class="badge"><?= count($recentActivities) ?></span>
                <?php endif; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-end notification-dropdown" style="width: 360px; border-radius: 12px; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.15); margin-top: 8px; padding: 0;">
                <div class="p-3 border-bottom bg-light" style="border-radius: 12px 12px 0 0;">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2"></i>Riwayat Perubahan</h6>
                </div>
                <div style="max-height: 350px; overflow-y: auto;">
                    <?php if (empty($recentActivities)): ?>
                        <div class="p-4 text-center text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            <span>Belum ada aktivitas</span>
                        </div>
                    <?php else: ?>
                        <?php foreach ($recentActivities as $activity): ?>
                            <div class="notification-item p-3 border-bottom">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="notification-icon">
                                        <?php
                                        $iconClass = 'bi-pencil';
                                        $bgColor = '#3b82f6';
                                        switch ($activity['action']) {
                                            case 'create':
                                                $iconClass = 'bi-plus-circle';
                                                $bgColor = '#22c55e';
                                                break;
                                            case 'update':
                                                $iconClass = 'bi-pencil-square';
                                                $bgColor = '#f59e0b';
                                                break;
                                            case 'delete':
                                                $iconClass = 'bi-trash';
                                                $bgColor = '#ef4444';
                                                break;
                                            case 'login':
                                                $iconClass = 'bi-box-arrow-in-right';
                                                $bgColor = '#8b5cf6';
                                                break;
                                            case 'logout':
                                                $iconClass = 'bi-box-arrow-right';
                                                $bgColor = '#6b7280';
                                                break;
                                        }
                                        ?>
                                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle" 
                                              style="width: 36px; height: 36px; background: <?= $bgColor ?>20; color: <?= $bgColor ?>;">
                                            <i class="bi <?= $iconClass ?>"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <strong class="text-dark" style="font-size: 0.875rem;">
                                                <?= esc($activity['username']) ?>
                                            </strong>
                                            <small class="text-muted" style="font-size: 0.75rem;">
                                                <?= date('H:i', strtotime($activity['created_at'])) ?>
                                            </small>
                                        </div>
                                        <p class="mb-0 text-muted" style="font-size: 0.8rem;">
                                            <?= esc($activity['description']) ?>
                                        </p>
                                        <small class="text-muted" style="font-size: 0.7rem;">
                                            <i class="bi bi-folder me-1"></i><?= ucfirst($activity['module']) ?>
                                            &bull; <?= date('d M Y', strtotime($activity['created_at'])) ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="p-2 border-top text-center">
                    <a href="<?= base_url('/admin/riwayat') ?>" class="btn btn-sm btn-light w-100">
                        <i class="bi bi-list-ul me-1"></i> Lihat Semua Riwayat
                    </a>
                </div>
            </div>
        </div>
        
        <!-- User Dropdown -->
        <div class="dropdown">
            <div class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-avatar">
                    <?= strtoupper(substr(session()->get('username') ?? 'A', 0, 1)) ?>
                </div>
                <div class="user-info">
                    <span class="user-name"><?= session()->get('username') ?? 'Admin' ?></span>
                    <span class="user-role">Administrator</span>
                </div>
                <i class="bi bi-chevron-down ms-2" style="color: #64748b; font-size: 0.75rem;"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-end" style="min-width: 200px; border-radius: 12px; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.15); margin-top: 8px;">
                <li>
                    <div class="px-3 py-2 border-bottom">
                        <div class="fw-semibold"><?= session()->get('username') ?? 'Admin' ?></div>
                        <small class="text-muted">admin@jagakarsa.go.id</small>
                    </div>
                </li>
                <li><a class="dropdown-item py-2" href="<?= base_url('/admin/pengaturan') ?>"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item py-2 text-danger" href="<?= base_url('/logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li>
            </ul>
        </div>
    </div>
</nav>
