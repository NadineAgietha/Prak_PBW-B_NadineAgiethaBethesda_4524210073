<div align="center">

<h1 style="font-size: 18px; margin-bottom: 5px; border: none;">
LAPORAN PRAKTIKUM <br>
PEMROGRAMAN BERBASIS WEB
</h1>

<p font-size: 12px; color: #555;">
<i>"Laporan ini disusun guna memenuhi penilaian dalam mata kuliah Prak. PBW"</i>
</p>

<br>

<img src="image/logo_UP.webp" width="300">

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

---

## 1. Jalankan seluruh contoh pertemuan 3 hingga 4 menghasilkan output tanpa error kritis

### A. Uji koneksi database
Memastikan file 'koneksi.php' bisa terhubung dengan server MySQL dan database 'akademik'.
<tr>
    <td><img src="image/success_koneksi.png" width="400"></td>
  </tr>
## 2. Buat modifikasi bermakna pada program

## 3. Tuliskan penjelasan singkat untuk 5 kode penting
### 1. SELECT untuk mengambil data dari tabel tanpa harus mengubah isinya dan dasar untuk semua query bisa baca data
```sql
SELECT nim, nama, ipk FROM mahasiswa;
```

### 2. WHERE untuk memfilter data sesuai kondisi
```sql
SELECT * FROM mahasiswa WHERE ipk >= 3.50;
```

### 3. ORDER BY untuk mengurutkan hasil query. ASC = kecil ke besar, DESC = besar ke kecil.
```sql
SELECT * FROM mahasiswa ORDER BY ipk DESC;
```

### 4. GROUP BY untuk mengelompokkan data agregasi (COUNT, AVG, MAX, MIN, SUM).
```sql
SELECT prodi, COUNT(*) AS jumlah 
FROM mahasiswa 
GROUP BY prodi;
```

### 5. LIMIT untuk mmebatasi jumlah baris hasil query.
```sql
SELECT * FROM mahasiswa ORDER BY ipk DESC LIMIT 2;
```

## 4. Screenshot sebelum dan sesudah modifikasi
<table>
  <tr>
    <th>Sebelum</th>
    <th>Sesudah</th>
  </tr>
  <tr>
    <td><img src="image/select_rekap.png" width="400"></td>
    <td><img src="image/modif_setelah.png" width="400"></td>
  </tr>
</table>

**Penjelasan:**
- **Sebelum:** rekap hanya per prodi (COUNT + AVG)
- **Sesudah:** rekap per prodi + angkatan, dengan tambahan MAX, MIN, dan jumlah mahasiswa aktif


## 5. Tuliskan satu error yang pernah muncul, penyebab, dan langkah perbaikan
### Error unknown column untuk query rekap 

**Screenshot Error:**
![Error CHECK Constraint](image/error_p4.png)

**Pesan Error:**
```
#1054 - Unknown column 'prodi' in 'field list'
```

**Penyebab:**
Query rekap modifikasi memakai kolom prodi, angkatan, dan status yang tidak ada di tabel mahasiswa. Tabel mahasiswa hanya memiliki id_prodi sebagai foreign key yang merujuk ke tabel prodi.

**Query yang Gagal:**
```sql
SELECT prodi, 
       angkatan,
       COUNT(*) AS jumlah, 
       ROUND(AVG(ipk),2) AS rata_ipk,
       MAX(ipk) AS ipk_tertinggi,
       MIN(ipk) AS ipk_terendah,
       SUM(CASE WHEN status = 'Aktif' THEN 1 ELSE 0 END) AS jml_aktif
FROM mahasiswa 
GROUP BY prodi, angkatan;
```

**Query Perbaikan:**
```sql
SELECT p.nama_prodi AS prodi,
       COUNT(*) AS jumlah,
       ROUND(AVG(m.ipk),2) AS rata_ipk,
       MAX(m.ipk) AS ipk_tertinggi,
       MIN(m.ipk) AS ipk_terendah
FROM mahasiswa m
JOIN prodi p ON m.id_prodi = p.id_prodi
GROUP BY p.nama_prodi
ORDER BY jumlah DESC;
```

