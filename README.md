# U-Find

Sistem Lost & Found sederhana dengan pola MVC PHP Native.
Struktur folder sama persis dengan folder `MVC`.

## 1. Fitur

1. Landing Page (`index.php` -> `HomeView.php`)
   - Judul, deskripsi, tombol Login / Daftar
   - Tabel barang terbaru dari database
2. Login & Register
   - `index.php?page=login` -> `AuthControl.php:login()` -> `Views/LoginView.php`
   - `index.php?page=register` -> `AuthControl.php:register()` -> `Views/RegisterView.php`
   - Role otomatis: `user` -> dashboard user, `admin` -> dashboard admin
   - `index.php?page=logout` untuk keluar
3. Dashboard User (`index.php?page=user`)
   - Report Lost Item / Report Found Item (nama, deskripsi, lokasi, jenis)
   - Submit -> Status PENDING
   - Lihat tabel + hapus + klaim barang approved
   - Lihat daftar klaim (pending/approved/rejected)
4. Dashboard Admin (`index.php?page=admin`)
   - Review laporan: setuju (APPROVED) / tolak (REJECTED) / hapus
   - Review klaim: setuju (APPROVED + barang jadi CLAIMED) / tolak (REJECTED)
   - Kolom tambahan pelapor

## 2. Struktur Folder

```
L&F/
 index.php
 Controllers/
  HomeControl.php
  AuthControl.php
  DashboardControl.php
 Models/
  HomeModel.php
  AuthModel.php
  DashboardModel.php
 Views/
  HomeView.php
  LoginView.php
  RegisterView.php
  UserView.php
  AdminView.php
 database/
  lostfound.sql
 README.md
 .gitignore
```

Pola kode ikut `MVC/`:
- `index.php` = require controller + `$controls->index()`
- Controller = `cek_data_get($jenis)`, `alert()` + `window.location.href`
- Model = `conn()` (localhost/root/lostfound/3360) + `mysqli_query`
- View = `form method="get"`, `table border="1"`, `foreach($data as $isi)`

## 3. Cara Jalan di Laragon

1. Copy folder `L&F` ke `C:\laragon\www\your-folder\L&F`
2. Start Laragon
3. Buka phpMyAdmin (`http://localhost:8080` atau sesuai setting)
4. Import `database/lostfound.sql`
   - Buat DB `lostfound`, tabel `pengguna` + `barang`
5. Buka browser:
   - Landing: `http://localhost/your-folder/L&F/index.php`
   - Login: `http://localhost/your-folder/L&F/index.php?page=login`
   - User: `http://localhost/your-folder/L&F/index.php?page=user`
   - Admin: `http://localhost/your-folder/L&F/index.php?page=admin`

Kalau port MySQL kamu 3306 (default), ubah `$port` di:
- `Models/HomeModel.php:14`
- `Models/AuthModel.php:11`
- `Models/DashboardModel.php:14`

## 4. Akun Default

| Username | Password | Role |
|----------|----------|------|
| admin | admin123 | admin |
| user | user123 | user |

Register baru bisa pilih role `user` / `admin` via dropdown.

## 5. Database + Workflow

- `pengguna(id, name, email, username, password, role)`
- `barang(id_barang, nama_barang, deskripsi, lokasi, jenis[hilang/ditemukan], status[pending/approved/rejected/claimed], pelapor)`
- `klaim(id_klaim, id_barang, pengklaim, alasan, status[pending/approved/rejected])`
- File: `database/lostfound.sql` (import ulang setelah update)
- Alur: lapor -> PENDING -> admin setuju/tolak -> APPROVED / REJECTED -> user klaim -> PENDING -> admin setuju (CLAIMED) / tolak
- Landing tampil semua barang (semua status)
