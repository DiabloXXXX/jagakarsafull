<!-- Sidebar -->
<aside class="admin-sidebar" id="adminSidebar">
    <!-- Brand -->
    <div class="sidebar-brand">
        <img src="<?= base_url('images/features/logo.png') ?>" alt="Logo Jagakarsa">
        <span class="sidebar-brand-text">Jagakarsa</span>
    </div>
    
    <!-- Menu -->
    <?php
    $uri = service('uri');
    $segment2 = $uri->getSegment(2);
    ?>
    
    <ul class="sidebar-menu">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="<?= base_url('/admin/dashboard') ?>" class="menu-link <?= ($segment2 == 'dashboard') ? 'active' : '' ?>">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <!-- Section: Menu Utama -->
        <li class="menu-section">Menu Utama</li>
        
        <!-- Kelola Halaman -->
        <li class="menu-item">
            <a href="<?= base_url('/admin/halaman') ?>" class="menu-link <?= ($segment2 == 'halaman') ? 'active' : '' ?>">
                <i class="bi bi-file-earmark-richtext"></i>
                <span>Kelola Halaman</span>
            </a>
        </li>
        
        <!-- Kelola Berita -->
        <li class="menu-item">
            <a href="<?= base_url('/admin/berita') ?>" class="menu-link <?= ($segment2 == 'berita') ? 'active' : '' ?>">
                <i class="bi bi-newspaper"></i>
                <span>Kelola Berita</span>
            </a>
        </li>
        
        <!-- Kelola Prestasi -->
        <li class="menu-item">
            <a href="<?= base_url('/admin/prestasi') ?>" class="menu-link <?= ($segment2 == 'prestasi') ? 'active' : '' ?>">
                <i class="bi bi-trophy"></i>
                <span>Kelola Prestasi</span>
            </a>
        </li>
        
        <!-- Kelola Tugas -->
        <li class="menu-item">
            <a href="<?= base_url('/admin/tugas') ?>" class="menu-link <?= ($segment2 == 'tugas') ? 'active' : '' ?>">
                <i class="bi bi-list-task"></i>
                <span>Kelola Tugas</span>
            </a>
        </li>
        
        <!-- Kelola PJLP -->
        <li class="menu-item">
            <a href="<?= base_url('/admin/pjlp') ?>" class="menu-link <?= ($segment2 == 'pjlp') ? 'active' : '' ?>">
                <i class="bi bi-people"></i>
                <span>Kelola PJLP</span>
            </a>
        </li>
        
        <!-- Kelola Chatbot -->
        <li class="menu-item">
            <a href="<?= base_url('/admin/chatbot') ?>" class="menu-link <?= ($segment2 == 'chatbot') ? 'active' : '' ?>">
                <i class="bi bi-robot"></i>
                <span>Kelola Chatbot</span>
            </a>
        </li>
        
        <!-- Section: Sistem -->
        <li class="menu-section">Sistem</li>
        
        <!-- Pengaturan -->
        <li class="menu-item">
            <a href="<?= base_url('/admin/pengaturan') ?>" class="menu-link <?= ($segment2 == 'pengaturan') ? 'active' : '' ?>">
                <i class="bi bi-gear"></i>
                <span>Pengaturan</span>
            </a>
        </li>
        
        <!-- Kembali ke Website -->
        <li class="menu-item" style="margin-top: 24px;">
            <a href="<?= base_url('/') ?>" class="menu-link" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i>
                <span>Lihat Website</span>
            </a>
        </li>
    </ul>
</aside>
