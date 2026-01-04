<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Tidak Ditemukan - Kelurahan Jagakarsa</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#86A73A',
                            DEFAULT: '#729030', 
                            dark: '#5F7926',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .blob { position: absolute; filter: blur(40px); z-index: -1; opacity: 0.4; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center overflow-hidden relative">

    <!-- Background Blobs -->
    <div class="blob w-72 h-72 rounded-full bg-primary-light top-0 left-0 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="blob w-96 h-96 rounded-full bg-blue-300 bottom-0 right-0 translate-x-1/3 translate-y-1/3"></div>

    <div class="text-center px-6 max-w-2xl">
        <!-- 404 Text -->
        <h1 class="text-9xl font-extrabold text-primary-dark tracking-widest opacity-20 select-none">404</h1>
        
        <div class="relative -mt-16 sm:-mt-24 mb-8">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">Ups! Halaman Hilang</h2>
            <p class="text-gray-600 text-lg sm:text-xl max-w-md mx-auto">
                Sepertinya halaman yang Anda cari telah dipindahkan, dihapus, atau tidak pernah ada.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="<?= base_url('/') ?>" 
               class="px-8 py-3 bg-primary hover:bg-primary-dark text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 focus:ring-4 focus:ring-primary-light/50">
                🏠 Kembali ke Beranda
            </a>
            
            <a href="<?= base_url('/berita') ?>" 
               class="px-8 py-3 bg-white text-gray-700 hover:text-primary font-semibold rounded-full shadow-md hover:shadow-lg border border-gray-200 transition-all">
                📰 Baca Berita
            </a>
        </div>

        <!-- Search Suggestion (Optional) -->
        <div class="mt-12 pt-8 border-t border-gray-200/60">
            <p class="text-sm text-gray-500 mb-4">Atau butuh bantuan langsung?</p>
            <a href="<?= base_url('/chatbot') ?>" class="inline-flex items-center gap-2 text-primary hover:text-primary-dark font-medium transition-colors group">
                <span class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center group-hover:bg-primary/20">
                    🤖
                </span>
                Tanya Chatbot Kami
            </a>
        </div>
    </div>

</body>
</html>
