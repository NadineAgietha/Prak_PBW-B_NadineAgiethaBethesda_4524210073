<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Ambil & bersihkan data
    $nim      = mysqli_real_escape_string($koneksi, trim($_POST['nim']));
    $nama     = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $email    = mysqli_real_escape_string($koneksi, trim($_POST['email']));
    $prodi    = mysqli_real_escape_string($koneksi, trim($_POST['prodi']));
    $angkatan = (int) $_POST['angkatan'];
    $ipk      = (float) $_POST['ipk'];

    // 2. Validasi dasar
    if (empty($nim) || empty($nama) || empty($email) || empty($prodi)) {
        die("Semua field wajib diisi!");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Format email tidak valid!");
    }
    if ($ipk < 0 || $ipk > 4) {
        die("IPK harus di antara 0.00 - 4.00!");
    }

    // 3. Cek NIM / Email duplikat
    $cek = mysqli_query($koneksi, "SELECT nim, email FROM mahasiswa WHERE nim='$nim' OR email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        die("NIM atau Email sudah terdaftar!");
    }

    // 4. Simpan
    $query = mysqli_query($koneksi,
        "INSERT INTO mahasiswa (nim, nama, email, prodi, angkatan, ipk)
         VALUES ('$nim', '$nama', '$email', '$prodi', $angkatan, $ipk)");

    if ($query) {
        echo "<h3 style='color:green'>✅ Data berhasil disimpan!</h3>";
        echo "<a href='form.php'>Tambah lagi</a> | <a href='data.php'>Lihat Data</a>";
    } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }
}
?>