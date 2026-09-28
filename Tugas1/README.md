<div align="center">

<h1 style="font-size: 18px; margin-bottom: 5px; border: none;">
LAPORAN PRAKTIKUM <br>
PEMROGRAMAN BERBASIS WEB
</h1>

<p font-size: 12px; color: #555;">
<i>"Laporan ini disusun guna memenuhi penilaian dalam mata kuliah Prak. PBW"</i>
</p>

<br>

<img src="asset/asset/logo-UP.webp" width="400">

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

# TUGAS 1
<font-size: 12px; color: #555;">
## 1. Jalankan seluruh contoh pertemuan 1 hingga menghasilkan output tanpa error kritis
- **`Biodata.php`**
![Biodata Sebelum](https://raw.githubusercontent.com/NadineAgietha/Prak_PBW-B_NadineAgiethaBethesda_4524210073/main/Tugas1/asset/asset/biodata_sebelum.png)

- **`Kalkulator.php`**
![Kalkulator Sebelum](asset/asset/kalkulator_sebelum.png)
in
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
### 1.) Menggunakan array asosiatif untuk menyimoan array yang indeksnya berupa nama (key), bukan angka. Fungsinya untuk menyimpan data mahasiswa di dalam satu variabel. Data bisa dipanggil lewat nama key, misalnya `$mahasiswa['nim']`.
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


## 4. Screenshot sebelum dan sesudah modifkasi


## 5. Tuliskan satu error yang pernah muncul, penyebab, dan langkah perbaikan
