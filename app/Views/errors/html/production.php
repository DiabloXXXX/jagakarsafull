<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terjadi Kesalahan - Kelurahan Jagakarsa</title>
    
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
                        },
                        danger: '#EF4444'
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
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-xl p-8 sm:p-12 max-w-lg w-full text-center border-t-8 border-danger">
        <div class="mb-6 inline-flex p-4 bg-red-50 rounded-full text-danger">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>

        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">Terjadi Kesalahan Sistem</h1>
        
        <p class="text-gray-600 mb-8 leading-relaxed">
            Maaf, terjadi gangguan teknis pada server kami. Tim teknis kami telah diberitahu dan sedang memperbaikinya.
        </p>

        <div class="space-y-3">
            <a href="<?= base_url('/') ?>" 
               class="block w-full py-3 bg-primary hover:bg-primary-dark text-white font-semibold rounded-lg shadow transition-colors">
                Coba Muat Ulang Beranda
            </a>
            
            <a href="javascript:history.back()" 
               class="block w-full py-3 bg-white text-gray-700 hover:bg-gray-50 font-semibold rounded-lg border border-gray-200 transition-colors">
                Kembali ke Halaman Sebelumnya
            </a>
        </div>
        
        <div class="mt-8 pt-6 border-t border-gray-100 text-xs text-gray-400">
            &copy; <?= date('Y') ?> Kelurahan Jagakarsa
        </div>
    </div>

</body>
</html>
