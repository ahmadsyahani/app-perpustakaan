# Sistem Perpustakaan Digital Kampus

Laravel 12 — implementasi modul P1–P10 dari https://github.com/civeryoshioka/modul-laravel-12.

## Instalasi

Memerlukan PHP >=8.2, Composer, dan MySQL atau SQLite.

```sh
git clone https://github.com/ahmadsyahani/app-perpustakaan.git
cd app-perpustakaan
git checkout dev
composer install
cp .env.example .env
php artisan key:generate
```

Di PowerShell gunakan `Copy-Item .env.example .env`. Untuk proyek yang sudah punya `.env`, pertahankan file tersebut. Atur DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, dan DB_PASSWORD sesuai database lokal. Buat database MySQL terlebih dahulu jika belum ada.

Tambahkan `INTERNAL_API_URL=http://127.0.0.1:8011` dan `APP_FAKER_LOCALE=id_ID`.

```sh
php artisan migrate
php artisan db:seed
```

Seeder menambahkan 5 kategori, 20 buku, 15 anggota, 10 peminjaman, dan 3 akun demo. Jalankan sekali pada database demo baru. Menjalankan ulang seeder akan menambah data buku/anggota/peminjaman dan mengembalikan password akun demo. Untuk database lama, cukup `php artisan migrate`; jalankan seeder hanya jika data demo diperlukan. Tidak perlu menjalankan migrate:fresh pada database tugas yang sudah berisi data.

## Menjalankan aplikasi

Terminal pertama:
```sh
php artisan serve --port=8000
```
Terminal kedua, folder proyek yang sama:
```sh
php artisan serve --port=8011
```

Buka http://127.0.0.1:8000/login. Dashboard dan laporan memanggil API di port 8011 dengan Laravel HTTP Client. Dua proses diperlukan agar server PHP lokal tidak deadlock. Jika server kedua mati, dashboard tetap tampil dengan angka nol dan laporan kosong.

| Role | Email | Password demo |
|---|---|---|
| Admin | admin@pens.ac.id | password |
| Petugas | petugas1@pens.ac.id | password |
| Petugas | petugas2@pens.ac.id | password |

Kategori hanya bisa dikelola admin. Semua halaman operasional memerlukan login. Profil mendukung ganti password. API sengaja publik mengikuti cakupan P9; autentikasi token belum termasuk modul ini.

## Pengujian

```sh
php artisan test
php artisan route:list --path=api
```

PHPUnit menggunakan SQLite `:memory:` sehingga tidak menghapus database lokal. Pengujian mencakup login/logout, role admin, profil/password, peminjaman/pengembalian, 11 endpoint API, serta dashboard/laporan saat API berhasil maupun gagal.

Lihat `API.md`, `DEMO.md`, dan `CHECKPOINT.md` untuk dokumentasi dan status tugas.
