<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Kelurahan Jagakarsa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="Kelurahan Jagakarsa, Jakarta Selatan, Layanan Kelurahan, Berita Jagakarsa">
    <meta name="description" content="Website Resmi Kelurahan Jagakarsa - Jakarta Selatan. Informasi layanan, berita, dan kegiatan kelurahan.">
    
    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#225808">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Jagakarsa">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="<?= base_url() ?>/manifest.json">
    
    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" href="<?= base_url() ?>/images/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/images/icons/icon-192x192.png">

    <!-- Favicon -->
    <link href="<?= base_url() ?>/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            dark: '#225808',
                            base: '#518123',
                            light: '#99BD49',
                            lighter: '#B6D455',
                            lightest: '#EBF7A9',
                        },
                        secondary: '#FF9800',
                        accent: {
                            green: '#8ABB63',
                            light: '#C4CC82',
                            pale: '#BBD394',
                        },
                        dark: '#0C1805',
                    },
                }
            }
        }
    </script>

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>/css/style.css" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
            overflow-y: scroll;
        }
        
        /* Better Text Rendering */
        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        
        /* Scroll Progress Bar */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #225808, #99BD49, #FF9800);
            z-index: 9999;
            transition: width 0.1s ease-out;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f8fafc;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #518123, #225808);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #225808, #0C1805);
        }

        /* Enhanced Card Styles */
        .card-modern {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            will-change: transform, box-shadow;
        }
        .card-modern:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }
        
        /* Image Loading Effect */
        .img-loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }
        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        
        /* Blur-up image effect */
        .img-blur-up {
            filter: blur(5px);
            transition: filter 0.5s ease-out;
        }
        .img-blur-up.loaded {
            filter: blur(0);
        }
        
        /* Button Ripple Effect */
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }
        .btn-ripple::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            background-image: radial-gradient(circle, rgba(255,255,255,0.3) 10%, transparent 10%);
            background-repeat: no-repeat;
            background-position: 50%;
            transform: scale(10);
            opacity: 0;
            transition: transform 0.5s, opacity 0.5s;
        }
        .btn-ripple:active::after {
            transform: scale(0);
            opacity: 1;
            transition: 0s;
        }
        
        /* Enhanced Focus States for Accessibility */
        a:focus-visible, button:focus-visible {
            outline: 3px solid #FF9800;
            outline-offset: 2px;
            border-radius: 4px;
        }
        
        /* Smooth Link Underline Animation */
        .link-animated {
            position: relative;
            text-decoration: none;
        }
        .link-animated::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: currentColor;
            transition: width 0.3s ease;
        }
        .link-animated:hover::after {
            width: 100%;
        }
        
        /* Glassmorphism Effect */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #225808 0%, #518123 50%, #99BD49 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Floating Animation */
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        /* Pulse Animation for CTAs */
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(255, 152, 0, 0.4); }
            50% { box-shadow: 0 0 0 15px rgba(255, 152, 0, 0); }
        }

        /* Slide Up Animation for PWA prompts */
        .animate-slide-up {
            animation: slideUp 0.3s ease-out;
        }
        @keyframes slideUp {
            from { transform: translateY(100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            display: none;
            right: 30px;
            bottom: 100px;
            z-index: 99;
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #225808, #518123);
            color: #fff;
            border-radius: 12px;
            text-align: center;
            line-height: 45px;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            transition: all 0.3s;
        }
        
        .back-to-top:hover {
            background: #518123;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scrollProgress"></div>
    
    <!-- Global Preloader -->
    <style>
        #global-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.8s ease-in-out, visibility 0.8s ease-in-out;
        }
        
        .spinner-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
        }

        .spinner-ring {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 100px;
            height: 100px;
            margin: 10px;
            border: 8px solid transparent;
            border-radius: 50%;
            animation: spinner-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: #729030 transparent transparent transparent;
        }

        .spinner-ring:nth-child(1) { animation-delay: -0.45s; }
        .spinner-ring:nth-child(2) { animation-delay: -0.3s; }
        .spinner-ring:nth-child(3) { animation-delay: -0.15s; }
        
        .loading-text {
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            color: #729030;
            letter-spacing: 1px;
            font-size: 14px;
        }

        @keyframes spinner-ring {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        body.loaded #global-loader {
            opacity: 0;
            visibility: hidden;
        }
    </style>

    <div id="global-loader">
        <div class="spinner-wrapper">
            <div class="spinner-ring"></div>
            <div class="spinner-ring"></div>
            <div class="spinner-ring"></div>
            <div class="spinner-ring"></div>
            <div class="loading-text">MEMUAT...</div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.body.classList.add('loaded');
            }, 600); // Minimal delay to show the nice animation
        });
        
        // Optional: Show loader on navigating away
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('a:not([href^="#"]):not([target="_blank"])');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.hostname === window.location.hostname) {
                        // Small delay before showing loader to allow immediate clicks to feel responsive
                        // but show loader for slower navigations
                        setTimeout(() => {
                             document.body.classList.remove('loaded');
                        }, 100);
                    }
                });
            });
        });
    </script>
    <!-- End Preloader -->

    <?= $this->include('layout/navbar'); ?>

    <?= $this->renderSection('page-Content'); ?>

    <?= $this->include('layout/footer'); ?>



    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url() ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?= base_url() ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?= base_url() ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    
    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        // Back to top button logic
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.back-to-top').fadeIn('slow');
            } else {
                $('.back-to-top').fadeOut('slow');
            }
        });
        $('.back-to-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
            return false;
        });
    </script>

    <!-- Template Javascript -->
    <script src="<?= base_url() ?>/js/main.js"></script>

    <!-- Floating Chatbot Widget -->
    <style>
        .chatbot-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            font-family: 'Roboto', sans-serif;
        }

        .chatbot-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #99BD49 0%, #7a9939 100%);
            color: white;
            border: none;
            box-shadow: 0 4px 12px rgba(153, 189, 73, 0.4);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            transition: all 0.3s;
            animation: pulse 2s infinite;
        }

        .chatbot-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(153, 189, 73, 0.6);
        }

        .chatbot-button.active {
            background: #dc3545;
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 4px 12px rgba(153, 189, 73, 0.4);
            }
            50% {
                box-shadow: 0 4px 20px rgba(153, 189, 73, 0.7);
            }
        }

        .chatbot-popup {
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 380px;
            height: 550px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 40px rgba(0, 0, 0, 0.3);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 999;
            animation: slideUp 0.3s ease-out;
        }

        /* Mobile Responsive for Chatbot */
        @media (max-width: 480px) {
            .chatbot-popup {
                width: calc(100vw - 20px);
                height: calc(100vh - 120px);
                right: 10px;
                bottom: 80px;
                border-radius: 12px;
                max-height: 600px;
            }
            
            .chatbot-button {
                width: 50px;
                height: 50px;
                right: 15px;
                bottom: 15px;
            }
            
            .chatbot-button i {
                font-size: 20px;
            }
            
            .widget-bubble {
                max-width: 85%;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .chatbot-popup.show {
            display: flex;
        }

        .chatbot-header {
            background: linear-gradient(135deg, #99BD49 0%, #7a9939 100%);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chatbot-close {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 5px 10px;
        }

        .chatbot-messages {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            background: #f8f9fa;
        }

        .widget-message {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
        }

        .widget-message.user {
            align-items: flex-end;
        }

        .widget-message.bot {
            align-items: flex-start;
        }

        .widget-bubble {
            max-width: 75%;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.4;
        }

        .widget-message.user .widget-bubble {
            background: #99BD49;
            color: white;
            border-bottom-right-radius: 4px;
        }

        .widget-message.bot .widget-bubble {
            background: white;
            color: #333;
            border: 1px solid #dee2e6;
            border-bottom-left-radius: 4px;
        }

        .chatbot-input-area {
            padding: 15px;
            background: white;
            border-top: 1px solid #dee2e6;
        }

        .chatbot-input-group {
            display: flex;
            gap: 10px;
        }

        .chatbot-input-group input {
            flex: 1;
            padding: 10px 12px;
            border: 1px solid #ced4da;
            border-radius: 20px;
            font-size: 14px;
        }

        .chatbot-input-group button {
            background: #99BD49;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .widget-typing {
            display: none;
            padding: 10px 14px;
            background: white;
            border-radius: 12px;
            width: fit-content;
            border: 1px solid #dee2e6;
        }

        .widget-typing span {
            height: 8px;
            width: 8px;
            background: #6c757d;
            border-radius: 50%;
            display: inline-block;
            margin: 0 2px;
            animation: typing 1.4s infinite;
        }

        .widget-typing span:nth-child(2) { animation-delay: 0.2s; }
        .widget-typing span:nth-child(3) { animation-delay: 0.4s; }

        @media (max-width: 480px) {
            .chatbot-popup {
                width: calc(100vw - 40px);
                right: 20px;
                left: 20px;
                height: 500px;
            }
        }
    </style>

    <!-- Chatbot Widget HTML -->
    <div class="chatbot-widget">
        <button class="chatbot-button" id="chatbotToggle" onclick="toggleChatbot()">
            <i class="fas fa-comments"></i>
        </button>

        <div class="chatbot-popup" id="chatbotPopup">
            <div class="chatbot-header">
                <div>
                    <strong><i class="fas fa-robot mr-2"></i> Chatbot Kelurahan</strong>
                    <div style="font-size: 11px; opacity: 0.9;">Tanya apa saja!</div>
                </div>
                <button class="chatbot-close" onclick="toggleChatbot()">×</button>
            </div>

            <div class="chatbot-messages" id="widgetMessages">
                <div class="widget-message bot">
                    <div class="widget-bubble">
                        <i class="fas fa-hand-sparkles text-[#FF9800] mr-1"></i> Halo! Ada yang bisa saya bantu?<br>
                        <small style="opacity: 0.8;">Tanya tentang jam buka, alamat, layanan KTP, KK, dll.</small>
                    </div>
                </div>
                <div class="widget-typing" id="widgetTyping">
                    <span></span><span></span><span></span>
                </div>
            </div>

            <div class="chatbot-input-area">
                <div class="chatbot-input-group">
                    <input type="text" id="widgetInput" placeholder="Ketik pertanyaan..." onkeypress="handleWidgetKeyPress(event)">
                    <button onclick="sendWidgetMessage()">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleChatbot() {
            const popup = document.getElementById('chatbotPopup');
            const button = document.getElementById('chatbotToggle');
            
            if (popup.classList.contains('show')) {
                popup.classList.remove('show');
                button.classList.remove('active');
            } else {
                popup.classList.add('show');
                button.classList.add('active');
                document.getElementById('widgetInput').focus();
            }
        }

        function handleWidgetKeyPress(event) {
            if (event.keyCode === 13) {
                sendWidgetMessage();
            }
        }

        function addWidgetMessage(text, isUser) {
            const messagesDiv = document.getElementById('widgetMessages');
            const typingDiv = document.getElementById('widgetTyping');
            
            const messageDiv = document.createElement('div');
            messageDiv.className = `widget-message ${isUser ? 'user' : 'bot'}`;
            
            const bubble = document.createElement('div');
            bubble.className = 'widget-bubble';
            bubble.innerHTML = text;
            
            messageDiv.appendChild(bubble);
            messagesDiv.insertBefore(messageDiv, typingDiv);
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }

        async function sendWidgetMessage() {
            const input = document.getElementById('widgetInput');
            const message = input.value.trim();
            
            if (!message) return;
            
            addWidgetMessage(message, true);
            input.value = '';
            
            const typingDiv = document.getElementById('widgetTyping');
            typingDiv.style.display = 'block';
            
            try {
                const response = await fetch('/chatbot', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: message })
                });
                
                const data = await response.json();
                
                setTimeout(() => {
                    typingDiv.style.display = 'none';
                    const botResponse = data.messages && data.messages[0] ? data.messages[0].text : 'Maaf, terjadi kesalahan.';
                    addWidgetMessage(botResponse, false);
                }, 500);
                
            } catch (error) {
                typingDiv.style.display = 'none';
                addWidgetMessage('<i class="fas fa-exclamation-circle text-danger mr-1"></i> Koneksi error. Coba lagi.', false);
            }
        }
    </script>
    <!--End of Chatbot Widget-->
    <script>
        // Init AOS with enhanced settings
        AOS.init({
            once: true,
            offset: 80,
            duration: 700,
            easing: 'ease-out-cubic',
        });

        // Scroll Progress Bar
        window.addEventListener('scroll', () => {
            const scrollProgress = document.getElementById('scrollProgress');
            const scrollTop = document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const progress = (scrollTop / scrollHeight) * 100;
            scrollProgress.style.width = progress + '%';
        });

        // Image Lazy Loading with Blur-up Effect
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => {
                img.classList.add('img-blur-up');
                if (img.complete) {
                    img.classList.add('loaded');
                } else {
                    img.addEventListener('load', () => {
                        img.classList.add('loaded');
                    });
                }
            });
        });

        // Add ripple effect to buttons with btn-ripple class
        document.querySelectorAll('.btn-ripple').forEach(button => {
            button.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                this.style.setProperty('--ripple-x', x + 'px');
                this.style.setProperty('--ripple-y', y + 'px');
            });
        });

        // Smooth reveal for cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.card-modern').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });

        // Safety Fallback for Global Loader
        setTimeout(() => {
             const loader = document.getElementById('global-loader');
             if (loader && !document.body.classList.contains('loaded')) {
                 document.body.classList.add('loaded');
             }
        }, 5000);
    </script>

    <!-- PWA Service Worker & Push Notification Registration -->
    <script>
        // Service Worker Registration
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', async () => {
                try {
                    const registration = await navigator.serviceWorker.register('/sw.js', { scope: '/' });
                    console.log('[PWA] Service Worker registered:', registration.scope);
                    
                    // Check for updates
                    registration.addEventListener('updatefound', () => {
                        const newWorker = registration.installing;
                        newWorker.addEventListener('statechange', () => {
                            if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                // New version available
                                showUpdateNotification();
                            }
                        });
                    });
                    
                    // Initialize push notifications after a delay
                    setTimeout(() => initPushNotifications(registration), 3000);
                    
                } catch (error) {
                    console.error('[PWA] Service Worker registration failed:', error);
                }
            });
        }

        // Show update notification
        function showUpdateNotification() {
            if (document.getElementById('pwa-update-banner')) return;
            
            const banner = document.createElement('div');
            banner.id = 'pwa-update-banner';
            banner.innerHTML = `
                <div class="fixed bottom-4 left-4 right-4 md:left-auto md:right-4 md:w-96 bg-white rounded-xl shadow-2xl p-4 z-50 border-l-4 border-green-600">
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-sync text-green-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Update Tersedia</p>
                            <p class="text-sm text-gray-600">Versi baru website tersedia</p>
                        </div>
                        <button onclick="updateApp()" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition">
                            Update
                        </button>
                    </div>
                </div>
            `;
            document.body.appendChild(banner);
        }

        function updateApp() {
            if ('serviceWorker' in navigator && navigator.serviceWorker.controller) {
                navigator.serviceWorker.controller.postMessage({ type: 'SKIP_WAITING' });
            }
            window.location.reload();
        }

        // Push Notification Initialization
        async function initPushNotifications(registration) {
            if (!('PushManager' in window)) {
                console.log('[Push] Push notifications not supported');
                return;
            }

            // Check if already subscribed
            const existingSubscription = await registration.pushManager.getSubscription();
            if (existingSubscription) {
                console.log('[Push] Already subscribed');
                return;
            }

            // Show prompt immediately on first visit (dengan delay 2 detik untuk UX)
            if (!localStorage.getItem('push_prompt_shown')) {
                setTimeout(() => showPushPrompt(registration), 2000);
            }
        }

        // Show push notification prompt
        function showPushPrompt(registration) {
            if (document.getElementById('push-prompt')) return;
            if (document.getElementById('install-prompt')) return;
            localStorage.setItem('push_prompt_shown', 'true');

            const prompt = document.createElement('div');
            prompt.id = 'push-prompt';
            prompt.className = 'animate-slide-up';
            prompt.innerHTML = `
                <div class="fixed bottom-0 left-0 right-0 bg-gradient-to-r from-orange-500 to-orange-600 text-white px-4 py-3 z-50 shadow-lg">
                    <div class="max-w-4xl mx-auto flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="text-sm md:text-base">Ingin dapat notifikasi berita terbaru?</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="subscribeToPush()" class="px-3 py-1.5 bg-white text-orange-600 rounded-lg text-sm font-medium hover:bg-orange-50 transition">
                                Ya
                            </button>
                            <button onclick="dismissPushPrompt()" class="px-3 py-1.5 bg-orange-700/50 text-white rounded-lg text-sm font-medium hover:bg-orange-700 transition">
                                Nanti
                            </button>
                        </div>
                    </div>
                </div>
            `;
            document.body.appendChild(prompt);
            
            // Auto dismiss after 8 seconds
            setTimeout(() => {
                const p = document.getElementById('push-prompt');
                if (p) p.remove();
            }, 8000);
        }

        function dismissPushPrompt() {
            const prompt = document.getElementById('push-prompt');
            if (prompt) prompt.remove();
        }

        // Subscribe to push notifications
        async function subscribeToPush() {
            dismissPushPrompt();
            
            try {
                const permission = await Notification.requestPermission();
                if (permission !== 'granted') {
                    console.log('[Push] Permission denied');
                    return;
                }

                const registration = await navigator.serviceWorker.ready;
                
                // Get VAPID public key
                const response = await fetch('/api/vapid-key');
                const { publicKey } = await response.json();
                
                if (!publicKey) {
                    console.error('[Push] No VAPID key');
                    return;
                }

                // Convert VAPID key to Uint8Array
                const vapidKey = urlBase64ToUint8Array(publicKey);
                
                // Subscribe
                const subscription = await registration.pushManager.subscribe({
                    userVisibleOnly: true,
                    applicationServerKey: vapidKey
                });

                // Send subscription to server
                await fetch('/api/push/subscribe', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(subscription.toJSON())
                });

                console.log('[Push] Subscribed successfully');
                showToast('Notifikasi berhasil diaktifkan!', 'success');
                
            } catch (error) {
                console.error('[Push] Subscription failed:', error);
                showToast('Gagal mengaktifkan notifikasi', 'error');
            }
        }

        // Helper: Convert base64 to Uint8Array
        function urlBase64ToUint8Array(base64String) {
            const padding = '='.repeat((4 - base64String.length % 4) % 4);
            const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
            const rawData = window.atob(base64);
            const outputArray = new Uint8Array(rawData.length);
            for (let i = 0; i < rawData.length; ++i) {
                outputArray[i] = rawData.charCodeAt(i);
            }
            return outputArray;
        }

        // Toast notification helper
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            const bgColor = type === 'success' ? 'bg-green-600' : type === 'error' ? 'bg-red-600' : 'bg-blue-600';
            toast.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300`;
            toast.innerHTML = `
                <div class="flex items-center gap-2">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
                    <span>${message}</span>
                </div>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // PWA Install Prompt
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            
            // Show install button after some interactions
            setTimeout(() => {
                if (deferredPrompt && !localStorage.getItem('pwa_install_dismissed')) {
                    showInstallPrompt();
                }
            }, 10000);
        });

        function showInstallPrompt() {
            if (document.getElementById('install-prompt')) return;
            if (document.getElementById('push-prompt')) {
                setTimeout(() => showInstallPrompt(), 3000);
                return;
            }

            const prompt = document.createElement('div');
            prompt.id = 'install-prompt';
            prompt.className = 'animate-slide-up';
            prompt.innerHTML = `
                <div class="fixed bottom-0 left-0 right-0 bg-gradient-to-r from-green-700 to-green-600 text-white px-4 py-3 z-50 shadow-lg">
                    <div class="max-w-4xl mx-auto flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-mobile-alt text-xl"></i>
                            <span class="text-sm md:text-base">Install aplikasi untuk akses lebih cepat!</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="installPWA()" class="px-3 py-1.5 bg-white text-green-700 rounded-lg text-sm font-medium hover:bg-green-50 transition">
                                Install
                            </button>
                            <button onclick="dismissInstallPrompt()" class="px-3 py-1.5 bg-green-800/50 text-white rounded-lg text-sm font-medium hover:bg-green-800 transition">
                                Nanti
                            </button>
                        </div>
                    </div>
                </div>
            `;
            document.body.appendChild(prompt);
            
            // Auto dismiss after 10 seconds
            setTimeout(() => {
                const p = document.getElementById('install-prompt');
                if (p) p.remove();
            }, 10000);
        }

        function dismissInstallPrompt() {
            const prompt = document.getElementById('install-prompt');
            if (prompt) prompt.remove();
            localStorage.setItem('pwa_install_dismissed', 'true');
        }

        async function installPWA() {
            if (!deferredPrompt) return;
            
            deferredPrompt.prompt();
            const { outcome } = await deferredPrompt.userChoice;
            
            console.log('[PWA] Install prompt outcome:', outcome);
            deferredPrompt = null;
            dismissInstallPrompt();
            
            if (outcome === 'accepted') {
                showToast('Aplikasi berhasil diinstall!', 'success');
            }
        }

        // Track app installed
        window.addEventListener('appinstalled', () => {
            console.log('[PWA] App installed');
            deferredPrompt = null;
        });
    </script>
</body>

</html>