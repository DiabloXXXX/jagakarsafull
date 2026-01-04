<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>429 - Terlalu Banyak Request</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }
        .container {
            text-align: center;
            padding: 40px;
            max-width: 500px;
        }
        .error-code {
            font-size: 120px;
            font-weight: 800;
            background: linear-gradient(135deg, #f39c12, #e74c3c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .error-title {
            font-size: 24px;
            margin: 20px 0;
            color: #ecf0f1;
        }
        .error-message {
            color: #bdc3c7;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .icon {
            font-size: 60px;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(52, 152, 219, 0.3);
        }
        .countdown {
            margin-top: 20px;
            color: #95a5a6;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">🛑</div>
        <div class="error-code">429</div>
        <h1 class="error-title">Terlalu Banyak Request</h1>
        <p class="error-message">
            <?= $message ?? 'Anda telah mengirim terlalu banyak request. Untuk keamanan, akses Anda sementara dibatasi. Silakan tunggu beberapa menit sebelum mencoba lagi.' ?>
        </p>
        <a href="/" class="btn">Kembali ke Beranda</a>
        <p class="countdown">Halaman akan dapat diakses kembali dalam beberapa menit</p>
    </div>
</body>
</html>
