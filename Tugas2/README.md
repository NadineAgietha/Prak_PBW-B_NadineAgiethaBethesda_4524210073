<div align="center">

<h1 style="font-size: 18px; margin-bottom: 5px; border: none;">
LAPORAN PRAKTIKUM <br>
PEMROGRAMAN BERBASIS WEB
</h1>

<p font-size: 12px; color: #555;">
<i>"Laporan ini disusun guna memenuhi penilaian dalam mata kuliah Prak. PBW"</i>
</p>

<br>

<img src="../asset/logo_UP.webp" width="300">

<br><br>

<p style="font-size: 14px; margin-bottom: 5px;">
<b>Disusun Oleh:</b>
</p>

<p style="font-size: 15px; margin-top: 5px;">
<b>Nadine Agietha Bethesda</b><br>
4524210073
</p>

<br>

<p style="font-size: 14px; margin-bottom: 5px;">
<b>Dosen:</b>
</p>

<p style="font-size: 14px; margin-top: 5px;">
Ari Wibowo, S.Kom., M.Kom., C. Pro
</p>

<br><br><br>

<h3 style="font-size: 16px; margin-bottom: 5px; border: none;">
S1-TEKNIK INFORMATIKA <br>
FAKULTAS TEKNIK UNIVERSITAS PANCASILA <br>
<b>2026/2027</b> 
</h3>

</div>

## TUGAS 2
## 1. Jalankan seluruh contoh pertemuan 1 hingga menghasilkan output tanpa error kritis
- **`hitung.php`**
![Hitung Sebelum](../asset/hitung_sebelum.png)

- **`identitas.php`**
![Identitas Sebelum](../asset/identitas_sebelum.png)

## 2. Buat minimal dua modifkasi bermakna pada program
### 1.) Menambahkan field 'prodi' dan 'semester'. Field ini digunakan untuk menambahkan informasi lengkap mahasiswa, field baru akan otomatis ikut karena proses looping 'foreach' menampilkan semua isi array.
Code:
```php
$mahasiswa = [
    'nim'      => '4524210073',
    'nama'     => 'Nadine Agietha',
    'prodi'    => 'Teknik Informatika',
    'semester' => '5',
    'ipk'      => '3.83',
];
```

### 2.) Menambahkan fungsi 'statusKelulusan()' supaya predikat kelulusan muncuk otomatis berdasarkan IPK tanpa harus diketik manual.
Code:
```php
function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}
```


## 3. Tuliskan penjelasan singkat untuk 5 kode penting
## 1.) Menggunakan array asosiatif untuk menyimoan array yang indeksnya berupa nama (key), bukan angka. Fungsinya untuk menyimpan data mahasiswa di dalam satu variabel. Data bisa dipanggil lewat nama key, misalnya `$mahasiswa['nim']`.
Code:
```php
$mahasiswa = [
    'nim'      => '4524210073',
    'nama'     => 'Nadine Agietha',
    'prodi'    => 'Teknik Informatika',
    'semester' => '5',
    'ipk'      => '3.83',
];
```

### 2.) Fungsi `statusKelulusan()` untuk menentukan predikat kelulusan berdasarkan nilai IPK yang dimasukkan.
Code:

```php
function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}
```
### 3.) Looping foreach digunakan untuk menampilkan semau data mahasiswa tanpa perlu menulis <li> satu per satu. ucfirst() untuk membuat huruf awal kapital, dan htmlspecialchars() untuk menyimoan karakter unik.
Code: 
```php
<?php foreach ($mahasiswa as $kunci => $nilai): ?>
    <li><?= ucfirst($kunci) ?>: <?= htmlspecialchars((string)$nilai) ?></li>
<?php endforeach; ?>
```
### 4.) Variabel `$_POST` digunakan untuk mengambil angka dan operator dari form. perator `??` memberi nilai default jika data kosong, `(float)` memastikan tipe data angka.
Code:
```php
$a = (float) ($_POST['a'] ?? 0);
$b = (float) ($_POST['b'] ?? 0);
$operator = $_POST['operator'] ?? '+';
```

### 5.) Menggunakan `$b` digunakan untuk mencegah error dengan mengecek apakah ada nilai 0 sebelum pada pembagian dilakukan.
Code:
```php
case '/':
    if ($b == 0) {
        $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
    } else {
        $hasil = $a / $b;
    }
    break;
```

## 4. Screenshot sebelum dan sesudah modifkasi
## a. hitung.php
**Sebelum:**
![Hitung Sebelum](../asset/hitung_sebelum.png)

**Sesudah:**
![Hitung Sesudah](../asset/hitung_sesudah.png)

## b.identitas.php
**Sebelum:**
![Identitas Sebelum](../asset/identitas_sebelum.png)

**Sesudah:**
![Identitas Sesudah](../asset/identitas_sesudah.png)

## 5. Tuliskan satu error yang pernah muncul, penyebab, dan langkah perbaikan
| Item | Keterangan |
|------|------------|
| **Error** | `Uncaught InvalidArgumentException: Harga tidak boleh negatif!` |
| **Penyebab** | Saat membuat object `new Produk('Produk Rusak', -5000)`, nilai `$harga` bernilai negatif. Validasi di constructor melempar exception, tetapi tidak ada `try-catch` yang menangkapnya. |
| **Perbaikan** | Bungkus pembuatan object dalam blok `try { ... } catch (InvalidArgumentException $e) { ... }` agar program tidak crash. |
