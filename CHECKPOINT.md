# Audit checkpoint

Referensi: modul-laravel-12, pertemuan 1–10 (dibaca 3 November 2026).

| Checkpoint | Temuan awal | Hasil penyesuaian |
|---|---|---|
| P1–P5 | Struktur Laravel, routing, Blade, CRUD buku/kategori/anggota tersedia; migration role kosong | Migration tambahan role, validasi ISBN unik, layout bersama |
| P6 | Tidak ada commit P6 | Sesuai modul: UTS laporan, bukan fitur kode baru |
| P7 | Commit sudah ada, tetapi perubahan lokal mengembalikan LoanController menjadi stub dan kategori ke ID | CRUD loans dipulihkan, relasi kategori, pengembalian dan badge status |
| P8 | Belum tersedia | Login/logout, auth/admin middleware, petugas otomatis, profil/ganti password |
| P9 | Belum tersedia | 11 endpoint API, Resource JSON, filter buku, pagination dan validasi |
| P10 | Belum tersedia | Dashboard/laporan HTTP Client, fallback koneksi, seeder/factory Indonesia, pagination custom, README/DEMO |

Perubahan P8–P10 disimpan sebagai satu commit finalisasi di branch dev, kemudian digabungkan ke master (branch utama repository ini). Laporan UTS, screenshot dan bukti Postman harus mencerminkan demonstrasi yang benar-benar dilakukan. API.md menyediakan respons hasil eksekusi aplikasi saat pengujian, bukan klaim screenshot Postman.

## Verifikasi akhir
- 7 tes PHPUnit, 129 assertions: PASS (SQLite terpisah). Runner sesi memuat bootstrap langsung karena is_readable PHP di sandbox Windows mengembalikan false; kode vendor tidak diubah.
- 66 file PHP lolos pemeriksaan syntax; template Blade berhasil dikompilasi.
- HTTP lokal: login/logout, dashboard, buku/edit buku, anggota, kategori, profil, loans dan laporan berhasil (200). Dashboard dan laporan benar-benar mengonsumsi server API port 8011.
- Migrasi tambahan role sudah diterapkan di MySQL lokal. Seeder dijalankan sekali; 1 buku awal dipertahankan sehingga total menjadi 21 buku, 15 anggota, 10 peminjaman dan 3 user demo.
- Bug lama pada books/edit (berisi form anggota) sudah diperbaiki. Penghapusan data yang masih dipakai relasi menampilkan pesan, bukan error 500.


Screenshot dan demonstrasi Postman belum dibuat. Sesuai instruksi pengguna, finalisasi sesi ini hanya mencakup commit, push, dan merge; laporan UTS P6 tidak dibuat.
