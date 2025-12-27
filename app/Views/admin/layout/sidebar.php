<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">Logo
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Jagakarsa</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <?php

        use Faker\Provider\Base;

        $uri = service('uri'); ?>
        <!-- Dashboard -->
        <li class="menu-item <?= ($uri->getSegment(1) == 'dasbor') ? 'active' : '' ?>">
            <a href="<?= base_url('/dasbor/' . session()->get('id')) ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu</span>
        </li>
        <li class="menu-item <?= ($uri->getSegment(1) == 'halaman') ? 'active' : '' ?>">
            <a href="<?= base_url('/halaman') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Kelola Halaman</div>
            </a>
        </li>
        <li class="menu-item <?= ($uri->getSegment(1) == 'adminberita') ? 'active' : '' ?>">
            <a href="<?= base_url('/adminberita') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Authentications">Kelola Berita</div>
            </a>
        </li>
        <li class="menu-item <?= ($uri->getSegment(1) == 'pengaturan') ? 'active' : '' ?>">
            <a href="<?= base_url('pengaturan/' . session()->get('id')) ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Misc">Pengaturan</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->