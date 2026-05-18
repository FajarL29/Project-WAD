# Dokumentasi Fungsi PHP - Index.php

Dokumen ini menjelaskan secara detail tentang semua fungsi dan logika PHP yang digunakan dalam file `index.php`.

---

## 📋 Daftar Isi

1. [Array Member](#array-member)
2. [Fungsi PHP](#fungsi-php)
3. [Variabel & Logika](#variabel--logika)
4. [Alur Eksekusi](#alur-eksekusi)

---

## 🗄️ Array Member

### Definisi

```php
$members = [
    1 => [...],
    2 => [...],
    3 => [...],
];
```

### Struktur Data

Setiap member memiliki struktur array associative dengan kunci:

| Kunci | Tipe | Deskripsi |
|-------|------|-----------|
| `name` | string | Nama lengkap anggota kelompok |
| `student_id` | string | Nomor Induk Mahasiswa (NIM) |
| `major` | string | Program studi / jurusan |
| `batch` | string | Tahun angkatan |
| `image` | string | Path/lokasi file foto anggota |
| `background` | string | Deskripsi profil / latar belakang anggota |

### Contoh Data

```php
1 => [
    'name' => 'Muhamad Febrian',
    'student_id' => '001202505021',
    'major' => 'Informatics',
    'batch' => '2025',
    'image' => 'images/febri.jpg',
    'background' => 'My name is Muhamad Febrian, and I am passionate...',
],
```

### Keuntungan Struktur Ini

✅ Data terstruktur dan terorganisir  
✅ Mudah diakses menggunakan ID atau key  
✅ Mudah ditambah atau dimodifikasi  
✅ Siap untuk dikembangkan ke database  

---

## 🔧 Fungsi PHP

### 1. `getMemberById()`

#### Definisi

```php
function getMemberById(array $members, int $id): ?array
{
    return $members[$id] ?? null;
}
```

#### Penjelasan Parameter

| Parameter | Tipe | Deskripsi |
|-----------|------|-----------|
| `$members` | array | Array yang berisi semua data member |
| `$id` | int | ID/kunci dari member yang dicari |

#### Tipe Return

- **`?array`** = Mengembalikan array atau `null`
  - Jika member ditemukan → mengembalikan **array data member**
  - Jika member tidak ditemukan → mengembalikan **`null`**

#### Cara Kerja

```php
return $members[$id] ?? null;
```

Operasi ini menggunakan **Null Coalescing Operator** (`??`):

- Coba akses `$members[$id]`
- Jika key ada → kembalikan nilainya
- Jika key tidak ada → kembalikan `null`

#### Contoh Penggunaan

```php
// Mencari member dengan ID 1
$member = getMemberById($members, 1);
// Result: Array dengan data "Muhamad Febrian"

// Mencari member dengan ID yang tidak ada (misalnya 999)
$member = getMemberById($members, 999);
// Result: null
```

#### Keuntungan Fungsi Ini

✅ Menghindari error jika ID tidak ditemukan  
✅ Membuat kode lebih rapi dan reusable  
✅ Mudah ditest dan di-debug  
✅ Siap untuk dikembangkan (misal: return dari database)  

---

## 📌 Variabel & Logika

### 1. `$selectedId`

```php
$selectedId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
```

**Fungsi:** Mengambil parameter `id` dari URL query string dan memvalidasinya

**Breakdown:**
- `INPUT_GET` = Ambil data dari URL (contoh: `?id=1`)
- `'id'` = Nama parameter yang dicari
- `FILTER_VALIDATE_INT` = Validasi bahwa value adalah integer

**Hasil:**
- Jika ada parameter `?id=1` → `$selectedId = 1` (integer)
- Jika ada parameter `?id=abc` → `$selectedId = false` (bukan integer)
- Jika tidak ada parameter → `$selectedId = null` (tidak ada)

**Contoh:**

```
URL: index.php?id=2
Result: $selectedId = 2 (integer)

URL: index.php?id=invalid
Result: $selectedId = false

URL: index.php (tanpa parameter)
Result: $selectedId = null
```

---

### 2. `$selectedMember`

```php
$selectedMember = $selectedId ? getMemberById($members, $selectedId) : null;
```

**Fungsi:** Mencari data member berdasarkan `$selectedId`

**Cara Kerja (Ternary Operator):**

```
$selectedMember = (kondisi) ? nilai_jika_true : nilai_jika_false
```

| Kondisi | Hasil |
|---------|-------|
| Jika `$selectedId` ada dan valid | Panggil `getMemberById()` untuk cari data |
| Jika `$selectedId` tidak ada/null | Set `$selectedMember = null` |

**Contoh Eksekusi:**

```php
// Skenario 1: User buka index.php?id=1
$selectedId = 1;
$selectedMember = getMemberById($members, 1);
// Result: Array data "Muhamad Febrian"

// Skenario 2: User buka index.php (tanpa parameter)
$selectedId = null;
$selectedMember = null;
// Result: null
```

---

### 3. `$isDetailPage`

```php
$isDetailPage = $selectedMember !== null;
```

**Fungsi:** Flag boolean untuk menentukan halaman apa yang ditampilkan

**Cara Kerja:**
- Jika `$selectedMember` berisi data → `$isDetailPage = true` (tampilkan halaman detail)
- Jika `$selectedMember = null` → `$isDetailPage = false` (tampilkan halaman list)

**Kegunaan dalam Template:**

```php
<?php if ($isDetailPage): ?>
    <!-- Tampilkan halaman DETAIL member -->
<?php else: ?>
    <!-- Tampilkan halaman LIST semua member -->
<?php endif; ?>
```

---

## 🔄 Alur Eksekusi

### Skenario 1: Buka Halaman Utama (`index.php`)

```
1. URL: http://localhost:8000/index.php

2. PHP Processing:
   ├─ $selectedId = null (tidak ada parameter ?id)
   ├─ $selectedMember = null (tidak ada ID)
   └─ $isDetailPage = false

3. Output:
   ├─ Tampilkan header "Group Website"
   ├─ Loop melalui $members dengan foreach
   └─ Tampilkan 3 card profil member
```

**Template yang Dijalankan:**

```php
<?php else: ?>
    <!-- Halaman LIST -->
    <div class="member-grid">
        <?php foreach ($members as $id => $member): ?>
            <!-- Tampilkan card member -->
        <?php endforeach; ?>
    </div>
<?php endif; ?>
```

---

### Skenario 2: Buka Halaman Detail (`index.php?id=1`)

```
1. URL: http://localhost:8000/index.php?id=1

2. PHP Processing:
   ├─ $selectedId = 1 (diambil dari ?id=1)
   ├─ $selectedMember = getMemberById($members, 1)
   │  └─ Result: Array data "Muhamad Febrian"
   └─ $isDetailPage = true

3. Output:
   ├─ Tampilkan judul: "Muhamad Febrian"
   ├─ Tampilkan foto profil besar
   ├─ Tampilkan detail info (NIM, Major, Batch)
   ├─ Tampilkan deskripsi background
   └─ Tampilkan tombol "Kembali"
```

**Template yang Dijalankan:**

```php
<?php if ($isDetailPage): ?>
    <!-- Halaman DETAIL -->
    <div class="profile-detail-card">
        <h1><?= htmlspecialchars($selectedMember['name']); ?></h1>
        <!-- Tampilkan detail member -->
    </div>
<?php endif; ?>
```

---

### Skenario 3: Buka dengan ID Tidak Valid (`index.php?id=999`)

```
1. URL: http://localhost:8000/index.php?id=999

2. PHP Processing:
   ├─ $selectedId = 999 (ada parameter ?id=999)
   ├─ $selectedMember = getMemberById($members, 999)
   │  └─ Result: null (ID 999 tidak ada di array)
   └─ $isDetailPage = false

3. Output:
   ├─ Tampilkan halaman LIST (sama seperti skenario 1)
   └─ Tidak ada error, aman
```

Ini menunjukkan keamanan function `getMemberById()` yang menggunakan `??` operator.

---

## 🛡️ Security Features

### 1. `htmlspecialchars()`

Digunakan di seluruh output untuk mencegah XSS (Cross-Site Scripting):

```php
<!-- Aman dari XSS injection -->
<h1><?= htmlspecialchars($selectedMember['name']); ?></h1>
<img src="<?= htmlspecialchars($selectedMember['image']); ?>">
```

**Cara Kerja:** Mengkonversi karakter khusus menjadi HTML entities:
- `<` → `&lt;`
- `>` → `&gt;`
- `"` → `&quot;`
- `&` → `&amp;`

---

### 2. `FILTER_VALIDATE_INT`

Memastikan parameter `id` adalah integer yang valid:

```php
$selectedId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
```

**Keamanan:**
- Menolak input non-integer
- Mencegah SQL injection (jika kelak diganti ke database)
- Memvalidasi tipe data sebelum digunakan

---

## 📈 Pengembangan Selanjutnya

Struktur PHP saat ini sudah siap untuk pengembangan:

### 1. Migrasi ke Database

```php
function getMemberById(int $id): ?array
{
    // Ganti array dengan query database
    $result = $pdo->prepare("SELECT * FROM members WHERE id = ?");
    $result->execute([$id]);
    return $result->fetch(PDO::FETCH_ASSOC);
}
```

---

### 2. Tambah Form Input

```php
// Simpan data member baru ke array/database
$newMember = [
    'name' => $_POST['name'],
    'student_id' => $_POST['student_id'],
    // ...
];
$members[] = $newMember;
```

---

### 3. Implementasi CRUD

- **Create** → Form untuk tambah member baru
- **Read** → Halaman list & detail (sudah ada)
- **Update** → Form untuk edit data member
- **Delete** → Tombol untuk hapus member

---

### 4. Migrasi ke Framework (Laravel)

```php
// Contoh dengan Laravel
class MemberController extends Controller
{
    public function show($id)
    {
        $member = Member::find($id);
        return view('members.show', compact('member'));
    }
}
```

---

## 📚 Kesimpulan

| Komponen | Fungsi | Status |
|----------|--------|--------|
| `$members` Array | Menyimpan data member | ✅ Implemented |
| `getMemberById()` | Cari member by ID | ✅ Implemented |
| Validasi Input | Validasi parameter URL | ✅ Implemented |
| Security (htmlspecialchars) | Cegah XSS | ✅ Implemented |
| Database Integration | Simpan ke DB | ⏳ Future |
| Form Input | Input data baru | ⏳ Future |
| CRUD Operations | Edit & Hapus | ⏳ Future |

Project ini sudah menerapkan konsep PHP dasar dengan baik dan siap untuk dikembangkan ke tahap berikutnya! 🚀
