# Skenario demo P10

1. Nyalakan server utama port 8000 dan server API internal port 8011.
2. Login sebagai admin. Tampilkan dashboard dan cocokkan angka dengan data aktual.
3. Tambah kategori, lalu tambah buku dengan kategori tersebut. Tunjukkan validasi form kosong dan pagination.
4. Tambah anggota dengan NIM/email unik.
5. Buat peminjaman untuk anggota dan buku tadi. Petugas otomatis memakai akun login.
6. Tampilkan daftar/detail peminjaman, badge status, dan edit tanggal kembali.
7. Klik Kembalikan. Periksa status dan tanggal pengembalian.
8. Tampilkan laporan peminjaman yang mengambil JSON dari API internal.
9. Logout dan login sebagai petugas. Tunjukkan kategori tidak tersedia dan akses langsung /categories menghasilkan 403.
10. Buka profil dan demonstrasikan validasi serta perubahan password.
11. Di Postman set Accept: application/json; demonstrasikan 11 endpoint dalam API.md, termasuk 201, 404, dan 422.
12. Matikan sementara server API internal. Dashboard/laporan tetap dapat dibuka. Nyalakan kembali.

Ambil screenshot hasil demo dan respons Postman untuk bukti pengumpulan. Sebelum mengumpulkan, review perubahan, commit di dev, dan ikuti instruksi dosen untuk merge ke branch utama (repository ini memakai master, sementara modul menyebut main).
