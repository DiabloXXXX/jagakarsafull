<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kelurahan Jagakarsa</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('images/features/logo.png') ?>">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom Admin Styles -->
    <style>
        :root {
            --primary-dark: #225808;
            --primary-base: #518123;
            --primary-light: #99BD49;
            --primary-lighter: #B6D455;
            --primary-lightest: #EBF7A9;
            --secondary: #FF9800;
            --sidebar-width: 280px;
            --navbar-height: 70px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            min-height: 100vh;
        }
        
        /* ==================== SIDEBAR ==================== */
        .admin-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, #1a1f2e 0%, #252b3b 100%);
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        .sidebar-brand {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        
        .sidebar-brand img {
            width: 42px;
            height: 42px;
            border-radius: 12px;
        }
        
        .sidebar-brand-text {
            color: #fff;
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .sidebar-menu {
            padding: 16px 12px;
            list-style: none;
        }
        
        .menu-section {
            color: rgba(255,255,255,0.4);
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 16px 16px 8px;
        }
        
        .menu-item {
            margin-bottom: 4px;
        }
        
        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .menu-link:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
            transform: translateX(4px);
        }
        
        .menu-link.active {
            background: linear-gradient(135deg, var(--primary-base) 0%, var(--primary-light) 100%);
            color: #fff;
            box-shadow: 0 4px 15px rgba(81, 129, 35, 0.4);
        }
        
        .menu-link i {
            font-size: 1.25rem;
            width: 24px;
            text-align: center;
        }
        
        /* ==================== MAIN CONTENT ==================== */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* ==================== NAVBAR ==================== */
        .admin-navbar {
            height: var(--navbar-height);
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .navbar-search {
            position: relative;
            width: 320px;
        }
        
        .navbar-search input {
            width: 100%;
            padding: 10px 16px 10px 44px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9rem;
            transition: all 0.2s;
            background: #f8fafc;
        }
        
        .navbar-search input:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(153, 189, 73, 0.15);
            background: #fff;
        }
        
        .navbar-search i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }
        
        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .navbar-icon-btn {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            border: none;
            background: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }
        
        .navbar-icon-btn:hover {
            background: var(--primary-lightest);
            color: var(--primary-base);
        }
        
        .navbar-icon-btn .badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 18px;
            height: 18px;
            background: #ef4444;
            color: #fff;
            font-size: 0.65rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px 8px 8px;
            border-radius: 50px;
            background: #f8fafc;
            cursor: pointer;
            border: 1px solid #e2e8f0;
            transition: all 0.2s;
        }
        
        .user-dropdown:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
        }
        
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-base), var(--primary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-name {
            font-weight: 600;
            font-size: 0.875rem;
            color: #1e293b;
        }
        
        .user-role {
            font-size: 0.75rem;
            color: #64748b;
        }
        
        /* ==================== CONTENT AREA ==================== */
        .admin-content {
            flex: 1;
            padding: 32px;
        }
        
        /* ==================== FOOTER ==================== */
        .admin-footer {
            padding: 20px 32px;
            background: #fff;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: #64748b;
            font-size: 0.875rem;
        }
        
        /* ==================== CARDS ==================== */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }
        
        .card-header {
            background: transparent;
            border-bottom: 1px solid #f1f5f9;
            padding: 20px 24px;
            font-weight: 600;
        }
        
        .card-body {
            padding: 24px;
        }
        
        /* ==================== BUTTONS ==================== */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-base) 0%, var(--primary-light) 100%);
            border: none;
            padding: 10px 24px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-base) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(81, 129, 35, 0.35);
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary-light);
            color: var(--primary-base);
            padding: 10px 24px;
            font-weight: 600;
            border-radius: 10px;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary-light);
            border-color: var(--primary-light);
            color: #fff;
        }
        
        /* ==================== STATS CARDS ==================== */
        .stats-card {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.1);
        }
        
        .stats-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .stats-icon.primary {
            background: linear-gradient(135deg, var(--primary-base), var(--primary-light));
            color: #fff;
        }
        
        .stats-icon.warning {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: #fff;
        }
        
        .stats-icon.info {
            background: linear-gradient(135deg, #0ea5e9, #38bdf8);
            color: #fff;
        }
        
        .stats-icon.success {
            background: linear-gradient(135deg, #10b981, #34d399);
            color: #fff;
        }
        
        .stats-info h3 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 4px;
        }
        
        .stats-info p {
            color: #64748b;
            font-size: 0.875rem;
            margin: 0;
        }
        
        /* ==================== FORM CONTROLS ==================== */
        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 12px 16px;
            font-size: 0.9rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(153, 189, 73, 0.15);
        }
        
        .form-label {
            font-weight: 500;
            color: #475569;
            margin-bottom: 8px;
        }
        
        /* ==================== TABLE ==================== */
        .table {
            border-radius: 12px;
        }
        
        .table-responsive {
            overflow: visible !important;
        }
        
        .card-body .table-responsive {
            overflow-x: auto !important;
        }
        
        .table thead th {
            background: #f8fafc;
            border: none;
            padding: 16px;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }
        
        .table tbody td {
            padding: 16px;
            vertical-align: middle;
            border-color: #f1f5f9;
        }
        
        /* Dropdown fix for tables */
        .table .dropdown-menu {
            position: absolute !important;
            z-index: 1050;
        }
        
        /* ==================== BADGES ==================== */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.75rem;
        }
        
        .badge-success {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }
        
        .badge-warning {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }
        
        .badge-primary {
            background: rgba(153, 189, 73, 0.15);
            color: var(--primary-base);
        }
        
        /* ==================== MOBILE SIDEBAR TOGGLE ==================== */
        .sidebar-toggle {
            display: none;
            width: 42px;
            height: 42px;
            border: none;
            background: #f1f5f9;
            border-radius: 10px;
            color: #64748b;
            cursor: pointer;
        }
        
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        
        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            
            .admin-sidebar.active {
                transform: translateX(0);
            }
            
            .sidebar-overlay.active {
                display: block;
            }
            
            .admin-main {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .navbar-search {
                width: 200px;
            }
        }
        
        @media (max-width: 768px) {
            .admin-content {
                padding: 20px;
            }
            
            .admin-navbar {
                padding: 0 20px;
            }
            
            .navbar-search {
                display: none;
            }
            
            .user-info {
                display: none;
            }
        }
        
        /* ==================== ANIMATIONS ==================== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.5s ease-out forwards;
        }
        
        /* ==================== SCROLLBAR ==================== */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
        }
    </style>
</head>
<body>
    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <!-- Sidebar -->
    <?= $this->include('admin/layout/sidebar') ?>
    
    <!-- Main Content -->
    <main class="admin-main">
        <!-- Navbar -->
        <?= $this->include('admin/layout/navbar') ?>
        
        <!-- Page Content -->
        <div class="admin-content">
            <?= $this->renderSection('page-Content') ?>
        </div>
        
        <!-- Footer -->
        <?= $this->include('admin/layout/footer') ?>
    </main>
    
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts -->
    <script>
        // Mobile Sidebar Toggle
        const sidebar = document.getElementById('adminSidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            });
        }
        
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            });
        }
        
        // Active menu highlight
        document.querySelectorAll('.menu-link').forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>
