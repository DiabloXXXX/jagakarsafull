# Railway Deployment untuk CodeIgniter 4

## Environment Variables yang dibutuhkan di Railway:

```
DB_HOST=your-mysql-host
DB_USERNAME=your-mysql-username
DB_PASSWORD=your-mysql-password
DB_DATABASE=jagakarsa
DB_PORT=3306
CI_ENVIRONMENT=production
```

## Setup di Railway:

1. **Buat project baru di Railway**
2. **Deploy from GitHub repo**
3. **Add MySQL database** (dari Railway Marketplace)
4. **Set environment variables** dari MySQL yang di-provision Railway
5. **Deploy akan otomatis**

## Database Setup:

Railway akan auto-provision MySQL. Setelah database dibuat, Railway akan auto-inject env vars:
- MYSQLHOST → DB_HOST
- MYSQLUSER → DB_USERNAME  
- MYSQLPASSWORD → DB_PASSWORD
- MYSQLDATABASE → DB_DATABASE
- MYSQLPORT → DB_PORT

Atau bisa manual set DB_* variables.

## Migration:

Setelah deploy sukses, jalankan migration via Railway CLI:
```bash
railway run php spark migrate
```

Atau lewat Railway dashboard → Service → Variables → Add custom start command:
```
php spark migrate && php -S 0.0.0.0:$PORT -t public
```
