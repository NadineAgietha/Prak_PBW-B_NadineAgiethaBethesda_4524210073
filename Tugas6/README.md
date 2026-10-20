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

## 1. Jalankan seluruh contoh pertemuan 6 hingga menghasilkan output tanpa error kritis
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center;">
  <tr>
    <td align="center">
      <img src="image/koneksi_p6.png" width="400"><br>
      <i>koneksi.php</i>
    </td>
    <td align="center">
      <img src="image/store_sebelum.png" width="400"><br>
      <i>store.php</i>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="image/index_sebelum.png" width="400"><br>
      <i>index.php</i>
    </td>
    <td align="center">
      <img src="image/berhasil_edit.png" width="400"><br>
      <i>update.php</i>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="image/create_sebelum.png" width="400"><br>
      <i>create.php</i>
    </td>
    <td align="center">
      <img src="image/edit_sebelum.png" width="400"><br>
      <i>edit.php</i>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="image/delete_sebelum.png" width="400"><br>
      <i>delete.php</i>
    </td>
    <td align="center">
      <img src="image/simpan_sebelum.png" width="400"><br>
      <i>simpan.php</i>
    </td>
  </tr>
</table>

## 2. Buat minimal dua modifkasi bermakna pada program
1.)  **`createmodif.php`** <br>
    Menambahkan atribut HTML5 `min="0.00"` dan `max="4.00"` pada input IPK, serta `min="2000"` `max="2100"` pada Angkatan untuk validasi sisi *client*.
  
2.) **`storemodif.php`** <br>
    Menambahkan `mysqli_real_escape_string`, validasi IPK, dan pengecekan duplikasi NIM/Email. Jika gagal, memunculkan *alert*.
  
3.) **`updatemodif.php`** <br>
    Sama seperti store, menambahkan pembersihan input, validasi IPK, dan pengecekan agar email yang diubah tidak menabrak email milik mahasiswa lain.
  
4.) **`editmodif.php`** <br>
    Membuat input NIM menjadi `readonly` (tidak bisa diedit) agar integritas *Primary Key* terjaga, serta menambahkan `htmlspecialchars()` pada form.
 
5.) **`deletemodif.php`** <br>
      Menambahkan pengecekan `isset($_GET['nim'])` agar tidak terjadi *error* jika URL diakses tanpa parameter, dan menggunakan `mysqli_real_escape_string`.

6.) **`indexmodif.php`** <br>
    *   Menambahkan **Form Pencarian** (berdasarkan NIM atau Nama) di atas tabel data.
    *   Menggunakan `htmlspecialchars()` pada setiap *output* data di tabel untuk mencegah eksekusi 

## 3. Tuliskan penjelasan singkat untuk 5 kode penting
## 4. Screenshot sebelum dan sesudah modifkasi
## 5. Tuliskan satu error yang pernah muncul, penyebab, dan langkah perbaikan
