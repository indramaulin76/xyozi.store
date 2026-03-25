# Deployment Tutorial (Production)

Panduan ini untuk deploy project `TOPUP-GAMES-PG-SAKURUPIAH+DB` ke server production dengan aman.

## 1) Prasyarat Server

- OS Linux (Ubuntu 22.04+ disarankan)
- Web server: Nginx (disarankan) atau Apache
- PHP 8.1-8.3 (hindari 8.4 untuk codebase ini jika belum upgrade framework)
- MySQL 8+
- Composer
- SSL domain aktif (HTTPS)

## 2) Upload Project

1. Upload source code ke server, contoh:
   - `/var/www/topup-app`
2. Pastikan document root web server mengarah ke folder:
   - `/var/www/topup-app/public`
3. Jalankan install dependency:
   - `composer install --no-dev --optimize-autoloader`

## 3) Setup Database

1. Buat database production (contoh: `topupgames_prod`)
2. Buat user DB khusus (jangan pakai root)
3. Grant privilege hanya ke DB app
4. Import SQL awal:
   - file: `DATABASENYA.sql`
5. Jalankan migrasi framework (tabel audit + index tambahan):

```bash
php spark migrate --all
```

Setelah deploy pembaruan refactor provider, migrasi di atas menambahkan tabel `admin_audit_log` dan index pada `produk.kode_produk`, `produk.brand`, `pembelian.order_id`, `pembelian.status_pembelian`.

Contoh SQL:

```sql
CREATE DATABASE topupgames_prod CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'topup_user'@'localhost' IDENTIFIED BY 'GANTI_PASSWORD_KUAT';
GRANT ALL PRIVILEGES ON topupgames_prod.* TO 'topup_user'@'localhost';
FLUSH PRIVILEGES;
```

## 4) Konfigurasi `.env` (WAJIB)

Isi/ubah nilai berikut di server production:

- `CI_ENVIRONMENT = production`
- `app.baseURL = 'https://domainkamu.com/'`
- `database.default.hostname = localhost`
- `database.default.database = topupgames_prod`
- `database.default.username = topup_user`
- `database.default.password = <password-kuat>`
- `database.default.DBDriver = MySQLi`
- `internal.systemKey = <random-strong-secret>`

Rekomendasi tambahan di `.env`:

- `app.forceGlobalSecureRequests = true`
- `cookie.secure = true`
- `cookie.httponly = true`
- `cookie.samesite = 'Lax'`

## 5) Permission Folder

Pastikan web user (`www-data`/`nginx`) bisa tulis:

- `writable/cache`
- `writable/logs`
- `writable/session`
- `writable/uploads`

Contoh:

```bash
sudo chown -R www-data:www-data /var/www/topup-app/writable
sudo chmod -R 775 /var/www/topup-app/writable
```

## 6) Konfigurasi Nginx (Contoh)

```nginx
server {
    listen 80;
    server_name domainkamu.com www.domainkamu.com;
    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl http2;
    server_name domainkamu.com www.domainkamu.com;

    root /var/www/topup-app/public;
    index index.php index.html;

    # SSL (atur sesuai cert kamu)
    ssl_certificate     /etc/letsencrypt/live/domainkamu.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/domainkamu.com/privkey.pem;

    # Security headers basic
    add_header X-Content-Type-Options nosniff always;
    add_header X-Frame-Options SAMEORIGIN always;
    add_header Referrer-Policy strict-origin-when-cross-origin always;
    add_header Permissions-Policy "geolocation=(), microphone=(), camera=()" always;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 7) Endpoint Internal (`/sistem/*`)

Endpoint `sistem/*` sudah diproteksi internal key.

Gunakan header ini saat cron/internal call:

- `X-Internal-Key: <internal.systemKey>`

Contoh test:

```bash
curl -H "X-Internal-Key: YOUR_INTERNAL_KEY" \
  https://domainkamu.com/sistem/update-statusVip
```

Tanpa key yang benar akan dapat `403`.

## 8) Verifikasi Deploy (Smoke Test)

Cek manual:

- `/` -> 200
- `/masuk` -> 200
- `/daftar` -> 200
- `/service` -> 200
- `/api/docs` -> 200

Cek API internal/public:

- `POST /api/profile` (dengan signature valid)
- `POST /api/service`
- `POST /api/status`
- `POST /api/order`

Catatan: endpoint API sekarang dibatasi `POST` saja.

## 9) Keamanan Tambahan (Sangat Disarankan)

- Aktifkan backup database harian
- Pasang WAF/rate-limit di Nginx/Cloudflare
- Rotasi key provider/API berkala
- Ubah seluruh akun admin default
- Jangan commit `.env` ke repository
- Audit route admin yang masih pakai method `GET` untuk aksi hapus, lalu migrasikan ke `POST/DELETE`

## 10) Troubleshooting Cepat

- CSS/JS tidak kebaca:
  - pastikan document root ke `public/`
  - hard refresh browser
- Error DB:
  - cek kredensial `.env`
  - cek user privilege DB
- 500 Internal Server Error:
  - cek log di `writable/logs`

## 11) Rekomendasi Final Go-Live

Checklist final sebelum live:

- [ ] SSL aktif dan redirect HTTP -> HTTPS
- [ ] `.env` production sudah benar
- [ ] DB user non-root dan password kuat
- [ ] `internal.systemKey` terisi strong key
- [ ] Smoke test endpoint utama lulus
- [ ] Backup + monitoring aktif

