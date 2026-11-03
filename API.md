# Dokumentasi API P9

Seluruh endpoint publik sesuai modul. Gunakan header `Accept: application/json` dan `Content-Type: application/json` untuk body JSON.

Respons berikut direkam langsung melalui HTTP Kernel Laravel dengan database SQLite terpisah saat pengujian, bukan hasil Postman. ID dan waktu dapat berbeda pada database lokal. Ulangi request di Postman untuk screenshot pengumpulan.

| Method | URL | Body | Status | Respons |
|---|---|---|---|---|
| GET | `/api/books?judul=Sejarah+Perdagangan+Rempah&category_id=5` | - | 200 | [Contoh 1](#contoh-1) |
| GET | `/api/books/1` | - | 200 | [Contoh 2](#contoh-2) |
| POST | `/api/books` | `{"judul":"Buku Dokumentasi API","penulis":"Penulis Uji","penerbit":"Penerbit Uji","tahun_terbit":2025,"isbn":"9780000000002","stok":2,"category_id":5}` | 201 | [Contoh 3](#contoh-3) |
| PUT | `/api/books/21` | `{"judul":"Buku Dokumentasi Diperbarui","penulis":"Penulis Uji","penerbit":"Penerbit Uji","tahun_terbit":2025,"isbn":"9780000000002","stok":2,"category_id":5}` | 200 | [Contoh 4](#contoh-4) |
| DELETE | `/api/books/21` | - | 200 | [Contoh 5](#contoh-5) |
| GET | `/api/members` | - | 200 | [Contoh 6](#contoh-6) |
| GET | `/api/members/1` | - | 200 | [Contoh 7](#contoh-7) |
| GET | `/api/loans` | - | 200 | [Contoh 8](#contoh-8) |
| POST | `/api/loans` | `{"member_id":1,"user_id":1,"tanggal_pinjam":"2026-11-01","tanggal_kembali":"2026-11-08","book_ids":[1]}` | 201 | [Contoh 9](#contoh-9) |
| PUT | `/api/loans/11/kembalikan` | - | 200 | [Contoh 10](#contoh-10) |
| GET | `/api/stats` | - | 200 | [Contoh 11](#contoh-11) |
| POST | `/api/books` | `[]` | 422 | [Contoh 12](#contoh-12) |
| PUT | `/api/books/1` | `[]` | 422 | [Contoh 13](#contoh-13) |
| GET | `/api/books/999999` | - | 404 | [Contoh 14](#contoh-14) |
| DELETE | `/api/books/999999` | - | 404 | [Contoh 15](#contoh-15) |
| GET | `/api/members/999999` | - | 404 | [Contoh 16](#contoh-16) |
| POST | `/api/loans` | `[]` | 422 | [Contoh 17](#contoh-17) |
| PUT | `/api/loans/999999/kembalikan` | - | 404 | [Contoh 18](#contoh-18) |

## Contoh 1

`GET /api/books?judul=Sejarah+Perdagangan+Rempah&category_id=5` — status **200**

```json
{
    "data": [
        {
            "id": 1,
            "judul": "Sejarah Perdagangan Rempah",
            "penulis": "Virman Ivan Adriansyah S.T.",
            "penerbit": "Bentang Pustaka",
            "tahun_terbit": 2017,
            "isbn": "9790354101782",
            "stok": 7,
            "sampul": null,
            "category": {
                "id": 5,
                "nama_kategori": "Sejarah"
            },
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        },
        {
            "id": 7,
            "judul": "Sejarah Perdagangan Rempah",
            "penulis": "Dariati Prakasa",
            "penerbit": "Andi Publisher",
            "tahun_terbit": 2002,
            "isbn": "9796507714632",
            "stok": 10,
            "sampul": null,
            "category": {
                "id": 5,
                "nama_kategori": "Sejarah"
            },
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        }
    ],
    "links": {
        "first": "http://localhost/api/books?page=1",
        "last": "http://localhost/api/books?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "page": null,
                "active": false
            },
            {
                "url": "http://localhost/api/books?page=1",
                "label": "1",
                "page": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "page": null,
                "active": false
            }
        ],
        "path": "http://localhost/api/books",
        "per_page": 10,
        "to": 2,
        "total": 2
    }
}
```

## Contoh 2

`GET /api/books/1` — status **200**

```json
{
    "data": {
        "id": 1,
        "judul": "Sejarah Perdagangan Rempah",
        "penulis": "Virman Ivan Adriansyah S.T.",
        "penerbit": "Bentang Pustaka",
        "tahun_terbit": 2017,
        "isbn": "9790354101782",
        "stok": 7,
        "sampul": null,
        "category": {
            "id": 5,
            "nama_kategori": "Sejarah"
        },
        "created_at": "2026-11-03T04:13:11.000000Z",
        "updated_at": "2026-11-03T04:13:11.000000Z"
    }
}
```

## Contoh 3

`POST /api/books` — status **201**

```json
{
    "data": {
        "id": 21,
        "judul": "Buku Dokumentasi API",
        "penulis": "Penulis Uji",
        "penerbit": "Penerbit Uji",
        "tahun_terbit": 2025,
        "isbn": "9780000000002",
        "stok": 2,
        "sampul": null,
        "category": {
            "id": 5,
            "nama_kategori": "Sejarah"
        },
        "created_at": "2026-11-03T04:13:13.000000Z",
        "updated_at": "2026-11-03T04:13:13.000000Z"
    }
}
```

## Contoh 4

`PUT /api/books/21` — status **200**

```json
{
    "data": {
        "id": 21,
        "judul": "Buku Dokumentasi Diperbarui",
        "penulis": "Penulis Uji",
        "penerbit": "Penerbit Uji",
        "tahun_terbit": 2025,
        "isbn": "9780000000002",
        "stok": 2,
        "sampul": null,
        "category": {
            "id": 5,
            "nama_kategori": "Sejarah"
        },
        "created_at": "2026-11-03T04:13:13.000000Z",
        "updated_at": "2026-11-03T04:13:13.000000Z"
    }
}
```

## Contoh 5

`DELETE /api/books/21` — status **200**

```json
{
    "message": "Buku berhasil dihapus."
}
```

## Contoh 6

`GET /api/members` — status **200**

```json
{
    "data": [
        {
            "id": 1,
            "nama": "Lantar Natsir",
            "nim": "5469702982",
            "email": "lantar.natsir756@pens.ac.id",
            "nomor_telepon": "083207098655",
            "alamat": "Gg. Raden No. 19, Bandung 61325, Aceh",
            "status": "aktif",
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        },
        {
            "id": 2,
            "nama": "Enteng Januar",
            "nim": "2524747235",
            "email": "enteng.januar052@pens.ac.id",
            "nomor_telepon": "086322774540",
            "alamat": "Psr. Yos No. 910, Pangkal Pinang 86713, Papua",
            "status": "aktif",
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        },
        {
            "id": 3,
            "nama": "Prasetyo Maheswara",
            "nim": "1387354069",
            "email": "prasetyo.maheswara271@pens.ac.id",
            "nomor_telepon": "086446736010",
            "alamat": "Psr. Veteran No. 631, Sungai Penuh 57787, Sulbar",
            "status": "nonaktif",
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        },
        {
            "id": 4,
            "nama": "Siska Anggraini",
            "nim": "2091431898",
            "email": "siska.anggraini817@pens.ac.id",
            "nomor_telepon": "087305290099",
            "alamat": "Kpg. Banceng Pondok No. 954, Sungai Penuh 26327, Lampung",
            "status": "aktif",
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        },
        {
            "id": 5,
            "nama": "Bakidin Puspasari",
            "nim": "7127718088",
            "email": "bakidin.puspasari327@pens.ac.id",
            "nomor_telepon": "080171874473",
            "alamat": "Kpg. Antapani Lama No. 505, Sabang 45718, DKI",
            "status": "aktif",
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        },
        {
            "id": 6,
            "nama": "Alika Yuniar",
            "nim": "2545952673",
            "email": "alika.yuniar574@pens.ac.id",
            "nomor_telepon": "085696226913",
            "alamat": "Dk. Bakin No. 222, Pagar Alam 92884, Gorontalo",
            "status": "nonaktif",
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        },
        {
            "id": 7,
            "nama": "Jane Kuswoyo",
            "nim": "0439618226",
            "email": "jane.kuswoyo522@pens.ac.id",
            "nomor_telepon": "087924076566",
            "alamat": "Jln. Juanda No. 451, Jambi 12506, Malut",
            "status": "aktif",
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        },
        {
            "id": 8,
            "nama": "Lalita Wacana",
            "nim": "0554661749",
            "email": "lalita.wacana216@pens.ac.id",
            "nomor_telepon": "085668550683",
            "alamat": "Ds. Astana Anyar No. 762, Pekanbaru 42002, Jateng",
            "status": "aktif",
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        },
        {
            "id": 9,
            "nama": "Zulaikha Yuniar",
            "nim": "1261256572",
            "email": "zulaikha.yuniar030@pens.ac.id",
            "nomor_telepon": "086254481848",
            "alamat": "Ds. Yap Tjwan Bing No. 738, Banjarbaru 82381, Kalbar",
            "status": "aktif",
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        },
        {
            "id": 10,
            "nama": "Gandi Pudjiastuti",
            "nim": "0134528238",
            "email": "gandi.pudjiastuti490@pens.ac.id",
            "nomor_telepon": "080222697110",
            "alamat": "Gg. Teuku Umar No. 320, Bima 36189, Kaltara",
            "status": "nonaktif",
            "created_at": "2026-11-03T04:13:11.000000Z",
            "updated_at": "2026-11-03T04:13:11.000000Z"
        }
    ],
    "links": {
        "first": "http://localhost/api/members?page=1",
        "last": "http://localhost/api/members?page=2",
        "prev": null,
        "next": "http://localhost/api/members?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 2,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "page": null,
                "active": false
            },
            {
                "url": "http://localhost/api/members?page=1",
                "label": "1",
                "page": 1,
                "active": true
            },
            {
                "url": "http://localhost/api/members?page=2",
                "label": "2",
                "page": 2,
                "active": false
            },
            {
                "url": "http://localhost/api/members?page=2",
                "label": "Next &raquo;",
                "page": 2,
                "active": false
            }
        ],
        "path": "http://localhost/api/members",
        "per_page": 10,
        "to": 10,
        "total": 15
    }
}
```

## Contoh 7

`GET /api/members/1` — status **200**

```json
{
    "data": {
        "id": 1,
        "nama": "Lantar Natsir",
        "nim": "5469702982",
        "email": "lantar.natsir756@pens.ac.id",
        "nomor_telepon": "083207098655",
        "alamat": "Gg. Raden No. 19, Bandung 61325, Aceh",
        "status": "aktif",
        "created_at": "2026-11-03T04:13:11.000000Z",
        "updated_at": "2026-11-03T04:13:11.000000Z"
    }
}
```

## Contoh 8

`GET /api/loans` — status **200**

```json
{
    "data": [
        {
            "id": 1,
            "member": {
                "id": 7,
                "nama": "Jane Kuswoyo"
            },
            "petugas": {
                "id": 3,
                "name": "Ahmad Fauzi"
            },
            "tanggal_pinjam": "2026-10-19",
            "tanggal_kembali": "2026-10-26",
            "tanggal_dikembalikan": "2026-10-24",
            "status": "dikembalikan",
            "books": [
                {
                    "id": 6,
                    "judul": "Pulang"
                }
            ]
        },
        {
            "id": 2,
            "member": {
                "id": 13,
                "nama": "Padma Maulana"
            },
            "petugas": {
                "id": 2,
                "name": "Siti Rahmawati"
            },
            "tanggal_pinjam": "2026-10-15",
            "tanggal_kembali": "2026-10-22",
            "tanggal_dikembalikan": "2026-10-22",
            "status": "dikembalikan",
            "books": [
                {
                    "id": 1,
                    "judul": "Sejarah Perdagangan Rempah"
                },
                {
                    "id": 18,
                    "judul": "Rekayasa Perangkat Lunak"
                }
            ]
        },
        {
            "id": 3,
            "member": {
                "id": 1,
                "nama": "Lantar Natsir"
            },
            "petugas": {
                "id": 3,
                "name": "Ahmad Fauzi"
            },
            "tanggal_pinjam": "2026-10-31",
            "tanggal_kembali": "2026-11-07",
            "tanggal_dikembalikan": null,
            "status": "terlambat",
            "books": [
                {
                    "id": 6,
                    "judul": "Pulang"
                },
                {
                    "id": 11,
                    "judul": "Wonder Wayang"
                },
                {
                    "id": 16,
                    "judul": "Ayat-Ayat Cinta"
                }
            ]
        },
        {
            "id": 4,
            "member": {
                "id": 2,
                "nama": "Enteng Januar"
            },
            "petugas": {
                "id": 3,
                "name": "Ahmad Fauzi"
            },
            "tanggal_pinjam": "2026-10-29",
            "tanggal_kembali": "2026-11-05",
            "tanggal_dikembalikan": "2026-11-05",
            "status": "dikembalikan",
            "books": [
                {
                    "id": 14,
                    "judul": "Dasar-Dasar Termodinamika"
                }
            ]
        },
        {
            "id": 5,
            "member": {
                "id": 3,
                "nama": "Prasetyo Maheswara"
            },
            "petugas": {
                "id": 1,
                "name": "Bambang Sutrisno"
            },
            "tanggal_pinjam": "2026-10-15",
            "tanggal_kembali": "2026-10-22",
            "tanggal_dikembalikan": null,
            "status": "terlambat",
            "books": [
                {
                    "id": 12,
                    "judul": "Garudayana"
                },
                {
                    "id": 19,
                    "judul": "Wonder Wayang"
                }
            ]
        },
        {
            "id": 6,
            "member": {
                "id": 10,
                "nama": "Gandi Pudjiastuti"
            },
            "petugas": {
                "id": 2,
                "name": "Siti Rahmawati"
            },
            "tanggal_pinjam": "2026-11-02",
            "tanggal_kembali": "2026-11-09",
            "tanggal_dikembalikan": "2026-11-09",
            "status": "dikembalikan",
            "books": [
                {
                    "id": 16,
                    "judul": "Ayat-Ayat Cinta"
                }
            ]
        },
        {
            "id": 7,
            "member": {
                "id": 5,
                "nama": "Bakidin Puspasari"
            },
            "petugas": {
                "id": 1,
                "name": "Bambang Sutrisno"
            },
            "tanggal_pinjam": "2026-10-25",
            "tanggal_kembali": "2026-11-01",
            "tanggal_dikembalikan": null,
            "status": "terlambat",
            "books": [
                {
                    "id": 11,
                    "judul": "Wonder Wayang"
                }
            ]
        },
        {
            "id": 8,
            "member": {
                "id": 6,
                "nama": "Alika Yuniar"
            },
            "petugas": {
                "id": 3,
                "name": "Ahmad Fauzi"
            },
            "tanggal_pinjam": "2026-10-05",
            "tanggal_kembali": "2026-10-12",
            "tanggal_dikembalikan": null,
            "status": "dipinjam",
            "books": [
                {
                    "id": 12,
                    "judul": "Garudayana"
                },
                {
                    "id": 6,
                    "judul": "Pulang"
                },
                {
                    "id": 5,
                    "judul": "Ayat-Ayat Cinta"
                }
            ]
        },
        {
            "id": 9,
            "member": {
                "id": 2,
                "nama": "Enteng Januar"
            },
            "petugas": {
                "id": 1,
                "name": "Bambang Sutrisno"
            },
            "tanggal_pinjam": "2026-11-02",
            "tanggal_kembali": "2026-11-09",
            "tanggal_dikembalikan": null,
            "status": "dipinjam",
            "books": [
                {
                    "id": 17,
                    "judul": "Proklamasi dan Perjuangan Bangsa"
                }
            ]
        },
        {
            "id": 10,
            "member": {
                "id": 13,
                "nama": "Padma Maulana"
            },
            "petugas": {
                "id": 1,
                "name": "Bambang Sutrisno"
            },
            "tanggal_pinjam": "2026-10-27",
            "tanggal_kembali": "2026-11-03",
            "tanggal_dikembalikan": null,
            "status": "terlambat",
            "books": [
                {
                    "id": 20,
                    "judul": "Ekologi dan Lingkungan Hidup"
                },
                {
                    "id": 11,
                    "judul": "Wonder Wayang"
                },
                {
                    "id": 7,
                    "judul": "Sejarah Perdagangan Rempah"
                }
            ]
        }
    ],
    "links": {
        "first": "http://localhost/api/loans?page=1",
        "last": "http://localhost/api/loans?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "page": null,
                "active": false
            },
            {
                "url": "http://localhost/api/loans?page=1",
                "label": "1",
                "page": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "page": null,
                "active": false
            }
        ],
        "path": "http://localhost/api/loans",
        "per_page": 10,
        "to": 10,
        "total": 10
    }
}
```

## Contoh 9

`POST /api/loans` — status **201**

```json
{
    "data": {
        "id": 11,
        "member": {
            "id": 1,
            "nama": "Lantar Natsir"
        },
        "petugas": {
            "id": 1,
            "name": "Bambang Sutrisno"
        },
        "tanggal_pinjam": "2026-11-01",
        "tanggal_kembali": "2026-11-08",
        "tanggal_dikembalikan": null,
        "status": "dipinjam",
        "books": [
            {
                "id": 1,
                "judul": "Sejarah Perdagangan Rempah"
            }
        ]
    }
}
```

## Contoh 10

`PUT /api/loans/11/kembalikan` — status **200**

```json
{
    "data": {
        "id": 11,
        "member": {
            "id": 1,
            "nama": "Lantar Natsir"
        },
        "petugas": {
            "id": 1,
            "name": "Bambang Sutrisno"
        },
        "tanggal_pinjam": "2026-11-01",
        "tanggal_kembali": "2026-11-08",
        "tanggal_dikembalikan": "2026-11-03",
        "status": "dikembalikan",
        "books": [
            {
                "id": 1,
                "judul": "Sejarah Perdagangan Rempah"
            }
        ]
    }
}
```

## Contoh 11

`GET /api/stats` — status **200**

```json
{
    "total_buku": 20,
    "total_anggota": 15,
    "peminjaman_aktif": 2
}
```

## Contoh 12

`POST /api/books` — status **422**

```json
{
    "message": "Judul buku wajib diisi. (and 5 more errors)",
    "errors": {
        "judul": [
            "Judul buku wajib diisi."
        ],
        "penulis": [
            "Nama penulis wajib diisi."
        ],
        "penerbit": [
            "Nama penerbit wajib diisi."
        ],
        "tahun_terbit": [
            "Tahun terbit wajib diisi."
        ],
        "stok": [
            "Stok wajib diisi."
        ],
        "category_id": [
            "Kategori wajib dipilih."
        ]
    }
}
```

## Contoh 13

`PUT /api/books/1` — status **422**

```json
{
    "message": "The judul field is required. (and 5 more errors)",
    "errors": {
        "judul": [
            "The judul field is required."
        ],
        "penulis": [
            "The penulis field is required."
        ],
        "penerbit": [
            "The penerbit field is required."
        ],
        "tahun_terbit": [
            "The tahun terbit field is required."
        ],
        "stok": [
            "The stok field is required."
        ],
        "category_id": [
            "The category id field is required."
        ]
    }
}
```

## Contoh 14

`GET /api/books/999999` — status **404**

```json
{
    "message": "No query results for model [App\\Models\\Book] 999999",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 668,
    "trace": [
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 616,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\nunomaduro\\collision\\src\\Adapters\\Laravel\\ExceptionHandler.php",
            "line": 55,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 182,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "{closure:Illuminate\\Pipeline\\Pipeline::prepareDestination():178}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 821,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 800,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 764,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 753,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 200,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 180,
            "function": "{closure:Illuminate\\Foundation\\Http\\Kernel::dispatchToRouter():197}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "{closure:Illuminate\\Pipeline\\Pipeline::prepareDestination():178}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 51,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 109,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php",
            "line": 74,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php",
            "line": 58,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php",
            "line": 22,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php",
            "line": 26,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePathEncoding",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 175,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 144,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\capture-api.php",
            "line": 17,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\capture-api.php",
            "line": 38,
            "function": "capture"
        }
    ]
}
```

## Contoh 15

`DELETE /api/books/999999` — status **404**

```json
{
    "message": "No query results for model [App\\Models\\Book] 999999",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 668,
    "trace": [
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 616,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\nunomaduro\\collision\\src\\Adapters\\Laravel\\ExceptionHandler.php",
            "line": 55,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 182,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "{closure:Illuminate\\Pipeline\\Pipeline::prepareDestination():178}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 821,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 800,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 764,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 753,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 200,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 180,
            "function": "{closure:Illuminate\\Foundation\\Http\\Kernel::dispatchToRouter():197}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "{closure:Illuminate\\Pipeline\\Pipeline::prepareDestination():178}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 51,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 109,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php",
            "line": 74,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php",
            "line": 58,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php",
            "line": 22,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php",
            "line": 26,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePathEncoding",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 175,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 144,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\capture-api.php",
            "line": 17,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\capture-api.php",
            "line": 39,
            "function": "capture"
        }
    ]
}
```

## Contoh 16

`GET /api/members/999999` — status **404**

```json
{
    "message": "No query results for model [App\\Models\\Member] 999999",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 668,
    "trace": [
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 616,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\nunomaduro\\collision\\src\\Adapters\\Laravel\\ExceptionHandler.php",
            "line": 55,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 182,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "{closure:Illuminate\\Pipeline\\Pipeline::prepareDestination():178}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 821,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 800,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 764,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 753,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 200,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 180,
            "function": "{closure:Illuminate\\Foundation\\Http\\Kernel::dispatchToRouter():197}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "{closure:Illuminate\\Pipeline\\Pipeline::prepareDestination():178}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 51,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 109,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php",
            "line": 74,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php",
            "line": 58,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php",
            "line": 22,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php",
            "line": 26,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePathEncoding",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 175,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 144,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\capture-api.php",
            "line": 17,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\capture-api.php",
            "line": 40,
            "function": "capture"
        }
    ]
}
```

## Contoh 17

`POST /api/loans` — status **422**

```json
{
    "message": "Anggota wajib dipilih. (and 4 more errors)",
    "errors": {
        "member_id": [
            "Anggota wajib dipilih."
        ],
        "user_id": [
            "Petugas (user_id) wajib diisi."
        ],
        "tanggal_pinjam": [
            "Tanggal pinjam wajib diisi."
        ],
        "tanggal_kembali": [
            "Tanggal kembali wajib diisi."
        ],
        "book_ids": [
            "Pilih minimal satu buku."
        ]
    }
}
```

## Contoh 18

`PUT /api/loans/999999/kembalikan` — status **404**

```json
{
    "message": "No query results for model [App\\Models\\Loan] 999999",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 668,
    "trace": [
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 616,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\nunomaduro\\collision\\src\\Adapters\\Laravel\\ExceptionHandler.php",
            "line": 55,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 182,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "{closure:Illuminate\\Pipeline\\Pipeline::prepareDestination():178}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 821,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 800,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 764,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 753,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 200,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 180,
            "function": "{closure:Illuminate\\Foundation\\Http\\Kernel::dispatchToRouter():197}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "{closure:Illuminate\\Pipeline\\Pipeline::prepareDestination():178}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 51,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 109,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php",
            "line": 74,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php",
            "line": 58,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php",
            "line": 22,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php",
            "line": 26,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePathEncoding",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "{closure:{closure:Illuminate\\Pipeline\\Pipeline::carry():194}:195}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 175,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\test-project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 144,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\capture-api.php",
            "line": 17,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\Ahmad Syahani\\Documents\\Codex\\2026-11-03\\hal\\work\\capture-api.php",
            "line": 42,
            "function": "capture"
        }
    ]
}
```

Catatan tambahan: DELETE /api/books/{id} mengembalikan 409 jika buku masih digunakan dalam loan_items. Hapus transaksi terkait terlebih dahulu jika memang ingin menghapus buku tersebut.
