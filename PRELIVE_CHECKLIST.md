# Pre-Live Validation Checklist

Dokumen ini berisi langkah cepat untuk validasi sebelum go-live.

## 1) Set Variable Sekali

Ganti nilai sesuai domain production kamu:

```bash
export BASE_URL="https://domainkamu.com"
export INTERNAL_KEY="ISI_INTERNAL_SYSTEM_KEY"
```

Untuk Windows PowerShell:

```powershell
$env:BASE_URL="https://domainkamu.com"
$env:INTERNAL_KEY="ISI_INTERNAL_SYSTEM_KEY"
```

## 2) Health Check Endpoint Publik

Semua harus `200`.

```bash
curl -I "$BASE_URL/"
curl -I "$BASE_URL/masuk"
curl -I "$BASE_URL/daftar"
curl -I "$BASE_URL/service"
curl -I "$BASE_URL/api/docs"
```

## 3) Cek Asset (CSS/JS/Image)

Pastikan bukan 404, dan content-type sesuai.

```bash
curl -I "$BASE_URL/css/main.min.css"
curl -I "$BASE_URL/js/main.min.js"
curl -I "$BASE_URL/new/assets/css/swiper.min.css"
```

## 4) Validasi Route Internal Terkunci

Tanpa key harus `403`, dengan key valid biasanya `200` (atau response bisnis yang expected).

```bash
# Tanpa key (harus 403)
curl -i "$BASE_URL/sistem/get-produkVip"

# Dengan key (harus lolos filter internal)
curl -i -H "X-Internal-Key: $INTERNAL_KEY" "$BASE_URL/sistem/get-produkVip"
```

## 5) Validasi API Method Restriction

Sekarang endpoint API hanya menerima POST.

```bash
# Harus 404 (GET ditolak)
curl -i "$BASE_URL/api/profile"

# Harus diterima route (POST)
curl -i -X POST "$BASE_URL/api/profile"
```

Catatan: response bisnis bisa gagal jika body/signature tidak valid, itu normal. Yang penting route & method sudah benar.

## 6) Validasi 404 Behavior

Unknown route harus `404` (bukan 200).

```bash
curl -i "$BASE_URL/halaman-tidak-ada"
```

## 7) Security Header Check

Cek minimal header ini muncul:

- `X-Content-Type-Options`
- `X-Frame-Options`
- `Referrer-Policy` (jika set di web server)

```bash
curl -I "$BASE_URL/" | grep -Ei "x-content-type-options|x-frame-options|referrer-policy"
```

PowerShell:

```powershell
(Invoke-WebRequest -Uri "$env:BASE_URL/" -Method Head).Headers
```

## 8) SSL / HTTPS Check

Pastikan HTTP redirect ke HTTPS.

```bash
curl -I "http://domainkamu.com"
```

Harus mengarah ke `https://...` (301/302).

## 9) Database & Session Sanity Check

- Login normal
- Session tidak sering logout sendiri
- Tabel `ci_sessions` bertambah saat ada user login

Contoh SQL:

```sql
SELECT COUNT(*) FROM ci_sessions;
```

## 10) Functional Smoke (Manual)

Lakukan minimal:

- Login user
- Register user baru
- Buka halaman order game
- Jalankan simulasi payment sampai invoice terbentuk
- Login admin dan cek dashboard

## 11) Go/No-Go Decision

Go-live jika semua poin ini terpenuhi:

- [ ] Endpoint publik utama `200`
- [ ] Asset static load normal
- [ ] Route internal terkunci (`403` tanpa key)
- [ ] API method restriction sesuai (`GET` ditolak, `POST` routed)
- [ ] Unknown route -> `404`
- [ ] HTTPS + security headers aktif
- [ ] Login/order/admin flow lolos smoke test

Jika ada yang gagal, perbaiki dulu sebelum traffic production dibuka.
