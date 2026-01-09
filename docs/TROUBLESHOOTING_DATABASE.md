# 🔧 Troubleshooting Database Hosting

## ❌ Masalah Umum Database Tidak Bisa Di-Hosting

### **1. Error: "Unable to connect to the database"**

#### **Penyebab:**
- Kredensial database salah
- MySQL server tidak running di hosting
- Port MySQL diblokir firewall
- Database belum dibuat di cPanel/hosting panel

#### **Solusi:**

**A. Cek Kredensial Database di `.env`**

```env
# File: .env (di hosting)
CI_ENVIRONMENT = production

database.default.hostname = localhost  # atau IP server database
database.default.database = nama_database_hosting
database.default.username = user_database_hosting
database.default.password = password_database_hosting
database.default.DBDriver = MySQLi
database.default.port = 3306
```

**B. Verifikasi Database di cPanel**

1. Login ke **cPanel**
2. Buka **MySQL Databases**
3. Pastikan database sudah dibuat
4. Pastikan user sudah di-assign ke database dengan **ALL PRIVILEGES**

**C. Test Koneksi Database**

Buat file `test_db.php` di root folder:

```php
<?php
$host = 'localhost';
$db = 'nama_database';
$user = 'user_database';
$pass = 'password_database';

try {
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }
    echo "✅ Database connected successfully!";
    $conn->close();
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
```

Akses: `https://yourdomain.com/test_db.php`

**⚠️ HAPUS file ini setelah testing!**

---

### **2. Error: "Access denied for user"**

#### **Penyebab:**
- Username atau password salah
- User tidak memiliki permission ke database
- User hanya bisa akses dari IP tertentu

#### **Solusi:**

**A. Reset Password Database User**

Di cPanel → MySQL Databases:
1. Scroll ke **Current Users**
2. Klik **Change Password** di user yang digunakan
3. Set password baru
4. Update `.env` dengan password baru

**B. Assign User ke Database**

Di cPanel → MySQL Databases:
1. Scroll ke **Add User To Database**
2. Pilih user dan database
3. Klik **Add**
4. Centang **ALL PRIVILEGES**
5. Klik **Make Changes**

---

### **3. Error: "Table doesn't exist"**

#### **Penyebab:**
- Database kosong (belum import SQL)
- Nama tabel salah (case-sensitive di Linux)
- SQL import gagal

#### **Solusi:**

**A. Import Database via cPanel**

1. Login ke **cPanel**
2. Buka **phpMyAdmin**
3. Pilih database Anda
4. Klik tab **Import**
5. Pilih file `jagakarsa.sql`
6. Klik **Go**

**B. Import via SSH (lebih cepat untuk file besar)**

```bash
mysql -u username -p database_name < jagakarsa.sql
```

**C. Verifikasi Import Berhasil**

Di phpMyAdmin, cek apakah semua tabel sudah ada:
- `users`
- `berita`
- `beranda`
- `halaman`
- `tugas`
- `pjlp`
- `chatbot_faq`
- `visitor`
- `activity_log`
- `push_subscription`

---

### **4. Error: "SQLSTATE[HY000] [2002] Connection refused"**

#### **Penyebab:**
- MySQL service tidak running
- Port 3306 diblokir
- Hostname salah

#### **Solusi:**

**A. Cek MySQL Service**

Hubungi support hosting untuk memastikan MySQL running.

**B. Coba Hostname Alternatif**

Beberapa hosting menggunakan:
- `localhost`
- `127.0.0.1`
- `mysql.yourdomain.com`
- IP address spesifik (cek di cPanel)

Update `.env`:
```env
database.default.hostname = 127.0.0.1
```

**C. Cek Port**

Beberapa hosting menggunakan port custom:
```env
database.default.port = 3307  # atau port lain
```

---

### **5. Error: "Too many connections"**

#### **Penyebab:**
- Terlalu banyak koneksi database terbuka
- Persistent connection enabled
- Memory limit hosting rendah

#### **Solusi:**

**A. Disable Persistent Connection**

Edit `app/Config/Database.php`:

```php
public array $default = [
    // ...
    'pConnect' => false,  // ✅ Set ke false
    // ...
];
```

**B. Tutup Koneksi Setelah Query**

Di controller, pastikan koneksi ditutup:

```php
$db = \Config\Database::connect();
// ... query ...
$db->close();
```

---

### **6. Error: "Charset/Collation mismatch"**

#### **Penyebab:**
- Database charset berbeda dengan aplikasi
- Tabel menggunakan charset lama

#### **Solusi:**

**A. Set Charset di Database.php**

```php
public array $default = [
    // ...
    'charset'  => 'utf8mb4',
    'DBCollat' => 'utf8mb4_general_ci',
    // ...
];
```

**B. Convert Database Charset**

Di phpMyAdmin:
1. Pilih database
2. Klik **Operations**
3. Scroll ke **Collation**
4. Pilih `utf8mb4_general_ci`
5. Klik **Go**

---

## ✅ Checklist Sebelum Hosting

### **1. File Configuration**

- [ ] File `.env` sudah dibuat dengan kredensial hosting
- [ ] `CI_ENVIRONMENT = production`
- [ ] `app.baseURL` sudah diubah ke domain hosting
- [ ] Database credentials sudah benar

### **2. Database Setup**

- [ ] Database sudah dibuat di cPanel
- [ ] User database sudah dibuat
- [ ] User sudah di-assign ke database dengan ALL PRIVILEGES
- [ ] File `jagakarsa.sql` sudah di-import
- [ ] Semua 10 tabel sudah ada

### **3. File Permissions**

```bash
# Set permission yang benar
chmod 755 /path/to/project
chmod -R 755 app/
chmod -R 777 writable/
chmod 644 .env
```

### **4. Test Connection**

- [ ] Test koneksi database berhasil
- [ ] Halaman login bisa diakses
- [ ] Bisa login ke admin panel
- [ ] Data berita tampil di homepage

---

## 🔐 Security Best Practices

### **1. Jangan Hardcode Credentials**

❌ **JANGAN:**
```php
'username' => 'root',
'password' => 'password123',
```

✅ **GUNAKAN:**
```php
'username' => getenv('DB_USERNAME'),
'password' => getenv('DB_PASSWORD'),
```

### **2. Gunakan Strong Password**

- Minimal 16 karakter
- Kombinasi huruf besar, kecil, angka, simbol
- Jangan gunakan password yang mudah ditebak

### **3. Restrict Database Access**

Di cPanel → Remote MySQL:
- **JANGAN** allow access from anywhere
- Hanya allow dari IP server web Anda

### **4. Regular Backup**

Setup automatic backup di cPanel:
1. Buka **Backup Wizard**
2. Pilih **Backup**
3. Pilih **MySQL Database**
4. Schedule backup harian/mingguan

---

## 📞 Hubungi Support Jika:

1. MySQL service tidak running
2. Tidak bisa akses cPanel
3. Import database gagal terus
4. Error yang tidak ada di dokumentasi ini

**Support Hostinger**: https://www.hostinger.com/contact

---

## 🎯 Quick Fix Commands

### **Reset Database (HATI-HATI!)**

```sql
-- Drop semua tabel
DROP DATABASE IF EXISTS jagakarsa;

-- Buat database baru
CREATE DATABASE jagakarsa CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Import ulang
USE jagakarsa;
SOURCE jagakarsa.sql;
```

### **Check Database Status**

```sql
-- Cek semua tabel
SHOW TABLES;

-- Cek struktur tabel
DESCRIBE users;

-- Cek jumlah data
SELECT COUNT(*) FROM berita;

-- Cek charset database
SELECT DEFAULT_CHARACTER_SET_NAME, DEFAULT_COLLATION_NAME 
FROM information_schema.SCHEMATA 
WHERE SCHEMA_NAME = 'jagakarsa';
```

---

## 📚 Resources

- [CodeIgniter 4 Database Docs](https://codeigniter.com/user_guide/database/index.html)
- [Hostinger MySQL Tutorial](https://www.hostinger.com/tutorials/mysql)
- [phpMyAdmin Documentation](https://docs.phpmyadmin.net/)

---

**Last Updated**: 2026-01-09
**Version**: 1.0.0
