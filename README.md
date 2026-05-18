# Group Website - PHP Native Version

## Deskripsi Project

Project ini adalah website profil kelompok yang dikembangkan sebagai latihan dasar **Web Application Development (WAD)**.  
Versi awal project dibuat menggunakan HTML, CSS, dan JavaScript sederhana. Setelah itu project dikembangkan menjadi **PHP Native** agar lebih sesuai dengan materi perkuliahan, terutama pada bagian:

- Introduction PHP
- PHP Basic
- PHP Function
- PHP Array
- PHP Form
- PHP CRUD

Pada versi yang sekarang, website sudah tidak hanya bersifat statis, tetapi mulai menggunakan logika backend sederhana dengan PHP.

## Tujuan Project

Tujuan dari project ini adalah:

- Menampilkan data anggota kelompok dalam bentuk website profile.
- Menerapkan dasar-dasar PHP pada project nyata yang sederhana.
- Mengubah tampilan statis menjadi halaman dinamis berbasis data.
- Menjadi fondasi untuk pengembangan ke tahap berikutnya seperti form input dan CRUD.

## Fitur yang Sudah Dibuat

- Menampilkan daftar anggota kelompok pada halaman utama.
- Menampilkan foto, nama, dan NIM setiap anggota.
- Menampilkan detail profil anggota berdasarkan parameter URL, misalnya `index.php?id=1`.
- Menggunakan array PHP sebagai sumber data utama.
- Menggunakan function PHP untuk mengambil data member berdasarkan ID.
- Menggunakan styling responsive agar tampilan tetap rapi di desktop dan mobile.

## Konsep PHP yang Digunakan

### 1. PHP Basic

Project ini sudah menggunakan sintaks dasar PHP seperti:

- Variabel
- Kondisi `if`
- Output data dengan `<?= ?>`
- Pengambilan parameter dari URL

Contoh pada project:

- Menentukan apakah halaman menampilkan daftar member atau detail member.
- Menampilkan judul halaman secara dinamis.

### 2. PHP Array

Data anggota disimpan dalam **array associative** pada file `index.php`.

Setiap anggota memiliki data:

- `name`
- `student_id`
- `major`
- `batch`
- `image`
- `background`

Keuntungan penggunaan array:

- Data lebih terstruktur
- Tidak perlu menulis HTML yang sama berulang-ulang
- Mudah dikembangkan ke database di tahap CRUD

### 3. PHP Function

Project ini menggunakan function:

```php
function getMemberById(array $members, int $id): ?array
```

Fungsi ini digunakan untuk:

- Mengambil data member berdasarkan ID
- Menghindari penulisan logika berulang
- Membuat kode lebih rapi dan mudah dipahami

### 4. Dynamic Rendering

Daftar member ditampilkan menggunakan perulangan `foreach`, sehingga card profile dibuat secara dinamis dari data array.

Keuntungan pendekatan ini:

- Struktur HTML lebih singkat
- Penambahan anggota baru cukup menambah data pada array
- Lebih dekat ke pola kerja aplikasi web sesungguhnya

## Struktur File

```text
project wad/
|-- images/
|   |-- fajar.jpg
|   |-- fauzan.jpg
|   |-- febri.jpg
|-- index.html
|-- index.php
|-- style.css
```

Keterangan:

- `index.html` adalah versi awal project yang masih statis.
- `index.php` adalah versi pengembangan yang sudah menggunakan PHP Native.
- `style.css` berisi styling utama website.
- `images/` berisi foto anggota kelompok.

## Cara Menjalankan Project

Pastikan PHP sudah terpasang di komputer.  
Jalankan perintah berikut di terminal pada folder project:

```powershell
php -S localhost:8000
```

Lalu buka browser dan akses:

```text
http://localhost:8000/
```

atau

```text
http://localhost:8000/index.php
```

## Alur Kerja Halaman

### Halaman Utama

Saat `index.php` dibuka tanpa parameter, halaman akan menampilkan daftar semua anggota kelompok.

### Halaman Detail

Saat user menekan tombol `Read Profile`, halaman akan membuka:

```text
index.php?id=1
```

Parameter `id` akan dibaca oleh PHP, lalu function `getMemberById()` mencari data anggota yang sesuai dan menampilkannya.

## Perubahan dari Versi HTML ke PHP

Sebelum menggunakan PHP:

- Data masih ditulis manual dan berulang
- Navigasi profile menggunakan JavaScript hide/show
- Belum ada pemisahan antara data dan tampilan

Setelah menggunakan PHP:

- Data disimpan dalam array
- Tampilan daftar dibuat dengan `foreach`
- Detail member ditampilkan berdasarkan `id`
- Struktur project lebih siap untuk dikembangkan ke form dan CRUD

## Kelebihan Project Saat Ini

- Sudah menerapkan dasar backend sederhana
- Kode lebih rapi dibanding versi HTML statis
- Mudah dijelaskan sebagai implementasi materi PHP Basic, Function, dan Array
- Mudah dikembangkan ke fitur berikutnya

## Kekurangan / Pengembangan Selanjutnya

Saat ini project masih memiliki beberapa batasan:

- Data masih disimpan di dalam array, belum di database
- Belum ada form input data anggota
- Belum ada fitur edit dan hapus data
- Belum menggunakan framework seperti Laravel

Pengembangan berikutnya yang disarankan:

1. Menambahkan **PHP Form** untuk input data anggota.
2. Menyimpan data ke file JSON atau database MySQL.
3. Mengembangkan fitur **CRUD**: Create, Read, Update, Delete.
4. Jika diperlukan, project bisa dilanjutkan ke Laravel sebagai tahap lanjutan.

## Kesimpulan

Project ini menunjukkan proses pengembangan dari website statis menjadi website dinamis sederhana menggunakan **PHP Native**.  
Implementasi saat ini sudah sesuai untuk menjelaskan materi:

- PHP Basic
- PHP Function
- PHP Array

Dan project ini juga sudah siap dijadikan dasar untuk masuk ke materi berikutnya seperti:

- PHP Form
- PHP CRUD
- Framework / Laravel

## Catatan Presentasi ke Dosen

Kalau dijelaskan secara singkat, inti project ini bisa disampaikan seperti ini:

> Project ini awalnya berupa website profil kelompok statis berbasis HTML dan CSS.  
> Lalu dikembangkan menjadi PHP Native dengan memindahkan data anggota ke array PHP, menampilkan data menggunakan `foreach`, dan membuat detail profil berdasarkan parameter `id` di URL.  
> Jadi, project ini sudah menerapkan konsep PHP Basic, PHP Function, dan PHP Array, serta siap dikembangkan ke tahap Form dan CRUD.
