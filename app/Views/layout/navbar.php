<?php $uri = service('uri'); ?>
<header class="sticky top-0 z-50 shadow-md">
    <!-- Top Bar - Hidden on Mobile -->
    <div class="hidden sm:flex bg-primary-dark text-white h-14 items-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto w-full flex items-center justify-end">
            <div class="flex items-center gap-3 text-base sm:text-xl font-semibold cursor-pointer hover:opacity-80 transition-opacity">
                <!-- Map Pin Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <span>Kantor Kelurahan Jagakarsa</span>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="bg-primary-light/95 backdrop-blur-md text-white flex items-center px-4 sm:px-6 lg:px-8 py-3 sm:py-0 sm:h-24">
        <div class="max-w-7xl mx-auto w-full flex items-center justify-between">
            <!-- Logo & Brand -->
            <a href="<?= base_url('/') ?>" class="flex items-center gap-2 sm:gap-4 cursor-pointer hover:opacity-80 transition-opacity">
                <img
                    src="<?= base_url('images/features/logo.png') ?>"
                    alt="Kelurahan Jagakarsa Logo"
                    class="w-12 sm:w-20 h-12 sm:h-20 object-contain flex-shrink-0"
                />
                <span class="text-lg sm:text-2xl lg:text-3xl font-bold">Kelurahan Jagakarsa</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-4 lg:gap-8">
                <div class="relative pb-1">
                    <a href="<?= base_url('/') ?>" class="<?= ($uri->getSegment(1) == '') ? 'text-white' : 'text-white/80' ?> text-xl lg:text-2xl font-bold hover:text-white transition-colors">Beranda</a>
                    <?php if ($uri->getSegment(1) == '') : ?>
                        <div class="absolute -bottom-1 left-0 right-0 h-1 bg-[#FF9800] rounded-t"></div>
                    <?php endif; ?>
                </div>
                
                <!-- Profil Dropdown -->
                <?php 
                $isProfilActive = in_array($uri->getSegment(1), ['tentang', 'visi', 'struktur', 'tugas', 'pjlp']);
                ?>
                <div class="relative group h-full flex items-center">
                    <button class="<?= $isProfilActive ? 'text-white' : 'text-white/80' ?> text-xl lg:text-2xl font-bold hover:text-white transition-colors flex items-center gap-2 cursor-pointer h-full">
                        Profil
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>
                    <?php if ($isProfilActive) : ?>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-[#FF9800] rounded-t"></div>
                    <?php endif; ?>
                    <!-- Dropdown Menu -->
                    <div class="absolute top-full left-0 pt-2 w-56 hidden group-hover:block hover:block z-50">
                        <div class="bg-white text-primary-dark rounded-lg shadow-xl overflow-hidden border border-gray-100">
                            <a href="<?= base_url('tentang') ?>" class="block w-full text-left px-4 py-3 hover:bg-primary-lighter hover:text-white font-semibold text-base transition-colors">Tentang Kelurahan</a>
                            <a href="<?= base_url('visi') ?>" class="block w-full text-left px-4 py-3 hover:bg-primary-lighter hover:text-white font-semibold border-t text-base transition-colors">Visi & Misi</a>
                            <a href="<?= base_url('struktur') ?>" class="block w-full text-left px-4 py-3 hover:bg-primary-lighter hover:text-white font-semibold border-t text-base transition-colors">Struktur Organisasi</a>
                            <a href="<?= base_url('tugas') ?>" class="block w-full text-left px-4 py-3 hover:bg-primary-lighter hover:text-white font-semibold border-t text-base transition-colors">Tugas & Fungsi</a>
                            <a href="<?= base_url('pjlp') ?>" class="block w-full text-left px-4 py-3 hover:bg-primary-lighter hover:text-white font-semibold border-t text-base transition-colors">PJLP</a>
                        </div>
                    </div>
                </div>

                <div class="relative h-full flex items-center">
                    <a href="<?= base_url('lembaga') ?>" class="<?= ($uri->getSegment(1) == 'lembaga') ? 'text-white' : 'text-white/80' ?> text-xl lg:text-2xl font-bold hover:text-white transition-colors h-full flex items-center">Lembaga</a>
                    <?php if ($uri->getSegment(1) == 'lembaga') : ?>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-[#FF9800] rounded-t"></div>
                    <?php endif; ?>
                </div>

                <div class="relative h-full flex items-center">
                    <a href="<?= base_url('layanan') ?>" class="<?= ($uri->getSegment(1) == 'layanan') ? 'text-white' : 'text-white/80' ?> text-xl lg:text-2xl font-bold hover:text-white transition-colors h-full flex items-center">Layanan</a>
                    <?php if ($uri->getSegment(1) == 'layanan') : ?>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-[#FF9800] rounded-t"></div>
                    <?php endif; ?>
                </div>

                <!-- Informasi Dropdown -->
                <?php 
                $isInfoActive = in_array($uri->getSegment(1), ['berita', 'banjir']);
                ?>
                <div class="relative group h-full flex items-center">
                    <button class="<?= $isInfoActive ? 'text-white' : 'text-white/80' ?> text-xl lg:text-2xl font-bold hover:text-white transition-colors flex items-center gap-2 cursor-pointer h-full">
                        Informasi
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>
                    <?php if ($isInfoActive) : ?>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-[#FF9800] rounded-t"></div>
                    <?php endif; ?>
                     <!-- Dropdown Menu -->
                    <div class="absolute top-full left-0 pt-2 w-56 hidden group-hover:block hover:block z-50">
                        <div class="bg-white text-primary-dark rounded-lg shadow-xl overflow-hidden border border-gray-100">
                            <a href="<?= base_url('berita') ?>" class="block w-full text-left px-4 py-3 hover:bg-primary-lighter hover:text-white font-semibold text-base transition-colors">Berita</a>
                            <a href="<?= base_url('banjir') ?>" class="block w-full text-left px-4 py-3 hover:bg-primary-lighter hover:text-white font-semibold border-t text-base transition-colors">Area Rawan Banjir</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-white p-2">
                <svg id="menu-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gradient-to-b from-primary-dark to-primary-base text-white border-t-2 border-secondary shadow-2xl">
        <nav class="flex flex-col p-4 space-y-1">
            <a href="<?= base_url('/') ?>" class="text-left px-4 py-3 rounded-xl font-semibold text-lg flex items-center gap-3 transition-all <?= ($uri->getSegment(1) == '') ? 'bg-white/20 border-l-4 border-secondary' : 'hover:bg-white/10' ?>">
                <i class="fas fa-home w-5"></i>
                Beranda
            </a>
            
            <!-- Mobile Profil Dropdown -->
            <div class="rounded-xl overflow-hidden">
                <button onclick="toggleMobileDropdown('profil')" class="w-full text-left px-4 py-3 hover:bg-white/10 rounded-xl font-semibold text-lg flex items-center justify-between transition-all <?= $isProfilActive ? 'bg-white/20 border-l-4 border-secondary' : '' ?>">
                    <span class="flex items-center gap-3">
                        <i class="fas fa-user-circle w-5"></i>
                        Profil
                    </span>
                    <i class="fas fa-chevron-down text-sm transition-transform" id="profil-chevron"></i>
                </button>
                <div id="mobile-dropdown-profil" class="hidden mt-1 ml-6 border-l-2 border-white/30 pl-4 space-y-1 py-2">
                    <a href="<?= base_url('tentang') ?>" class="block px-3 py-2 rounded-lg font-medium text-base text-white/90 hover:bg-white/15 hover:text-white transition-all <?= ($uri->getSegment(1) == 'tentang') ? 'bg-white/20 text-white' : '' ?>">
                        <i class="fas fa-info-circle mr-2 text-secondary"></i>Tentang Kelurahan
                    </a>
                    <a href="<?= base_url('visi') ?>" class="block px-3 py-2 rounded-lg font-medium text-base text-white/90 hover:bg-white/15 hover:text-white transition-all <?= ($uri->getSegment(1) == 'visi') ? 'bg-white/20 text-white' : '' ?>">
                        <i class="fas fa-bullseye mr-2 text-secondary"></i>Visi & Misi
                    </a>
                    <a href="<?= base_url('struktur') ?>" class="block px-3 py-2 rounded-lg font-medium text-base text-white/90 hover:bg-white/15 hover:text-white transition-all <?= ($uri->getSegment(1) == 'struktur') ? 'bg-white/20 text-white' : '' ?>">
                        <i class="fas fa-sitemap mr-2 text-secondary"></i>Struktur Organisasi
                    </a>
                    <a href="<?= base_url('tugas') ?>" class="block px-3 py-2 rounded-lg font-medium text-base text-white/90 hover:bg-white/15 hover:text-white transition-all <?= ($uri->getSegment(1) == 'tugas') ? 'bg-white/20 text-white' : '' ?>">
                        <i class="fas fa-tasks mr-2 text-secondary"></i>Tugas & Fungsi
                    </a>
                    <a href="<?= base_url('pjlp') ?>" class="block px-3 py-2 rounded-lg font-medium text-base text-white/90 hover:bg-white/15 hover:text-white transition-all <?= ($uri->getSegment(1) == 'pjlp') ? 'bg-white/20 text-white' : '' ?>">
                        <i class="fas fa-hard-hat mr-2 text-secondary"></i>PJLP
                    </a>
                </div>
            </div>

            <a href="<?= base_url('lembaga') ?>" class="text-left px-4 py-3 rounded-xl font-semibold text-lg flex items-center gap-3 transition-all <?= ($uri->getSegment(1) == 'lembaga') ? 'bg-white/20 border-l-4 border-secondary' : 'hover:bg-white/10' ?>">
                <i class="fas fa-users w-5"></i>
                Lembaga
            </a>
            <a href="<?= base_url('layanan') ?>" class="text-left px-4 py-3 rounded-xl font-semibold text-lg flex items-center gap-3 transition-all <?= ($uri->getSegment(1) == 'layanan') ? 'bg-white/20 border-l-4 border-secondary' : 'hover:bg-white/10' ?>">
                <i class="fas fa-hands-helping w-5"></i>
                Layanan
            </a>

            <!-- Mobile Informasi Dropdown -->
            <div class="rounded-xl overflow-hidden">
                <button onclick="toggleMobileDropdown('info')" class="w-full text-left px-4 py-3 hover:bg-white/10 rounded-xl font-semibold text-lg flex items-center justify-between transition-all <?= $isInfoActive ? 'bg-white/20 border-l-4 border-secondary' : '' ?>">
                    <span class="flex items-center gap-3">
                        <i class="fas fa-newspaper w-5"></i>
                        Informasi
                    </span>
                    <i class="fas fa-chevron-down text-sm transition-transform" id="info-chevron"></i>
                </button>
                <div id="mobile-dropdown-info" class="hidden mt-1 ml-6 border-l-2 border-white/30 pl-4 space-y-1 py-2">
                    <a href="<?= base_url('berita') ?>" class="block px-3 py-2 rounded-lg font-medium text-base text-white/90 hover:bg-white/15 hover:text-white transition-all <?= ($uri->getSegment(1) == 'berita') ? 'bg-white/20 text-white' : '' ?>">
                        <i class="fas fa-newspaper mr-2 text-secondary"></i>Berita
                    </a>
                    <a href="<?= base_url('banjir') ?>" class="block px-3 py-2 rounded-lg font-medium text-base text-white/90 hover:bg-white/15 hover:text-white transition-all <?= ($uri->getSegment(1) == 'banjir') ? 'bg-white/20 text-white' : '' ?>">
                        <i class="fas fa-water mr-2 text-secondary"></i>Area Rawan Banjir
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<script>
    // Mobile Menu Toggle with animation
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');
        
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            menu.style.maxHeight = menu.scrollHeight + 'px';
            icon.innerHTML = '<line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line>';
        } else {
            menu.style.maxHeight = '0';
            setTimeout(() => menu.classList.add('hidden'), 300);
            icon.innerHTML = '<line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line>';
        }
    });

    // Mobile Dropdown Toggle with chevron rotation
    function toggleMobileDropdown(id) {
        const dropdown = document.getElementById('mobile-dropdown-' + id);
        const chevron = document.getElementById(id + '-chevron');
        
        // Close other dropdowns
        ['profil', 'info'].forEach(otherId => {
            if (otherId !== id) {
                const otherDropdown = document.getElementById('mobile-dropdown-' + otherId);
                const otherChevron = document.getElementById(otherId + '-chevron');
                if (otherDropdown && !otherDropdown.classList.contains('hidden')) {
                    otherDropdown.classList.add('hidden');
                    if (otherChevron) otherChevron.style.transform = 'rotate(0deg)';
                }
            }
        });
        
        dropdown.classList.toggle('hidden');
        if (chevron) {
            chevron.style.transform = dropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
        }
    }
</script>