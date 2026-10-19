<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Ambil data & bersihkan
    $nim      = mysqli_real_escape_string($koneksi, trim($_POST['nim']));
    $nama     = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $email    = mysqli_real_escape_string($koneksi, trim($_POST['email']));
    $prodi    = mysqli_real_escape_string($koneksi, trim($_POST['prodi']));
    $angkatan = mysqli_real_escape_string($koneksi, trim($_POST['angkatan']));
    $ipk      = (float) $_POST['ipk'];

    // 2. Validasi IPK
    if ($ipk < 0 || $ipk > 4) {
        echo "<script>alert('Gagal: IPK harus antara 0.00 sampai 4.00!'); window.history.back();</script>";
        exit;
    }

    // 3. Cek Duplikat NIM / Email
    $cek = mysqli_query($koneksi, "SELECT nim, email FROM mahasiswa WHERE nim='$nim' OR email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Gagal: NIM atau Email sudah terdaftar!'); window.history.back();</script>";
        exit;
    }

    // 4. Simpan Data
    $query = mysqli_query(
        $koneksi,
        "INSERT INTO mahasiswa (nim, nama, email, prodi, angkatan, ipk) 
         VALUES ('$nim', '$nama', '$email', '$prodi', '$angkatan', $ipk)"
    ); 
    
    if ($query) {
        echo "<script>
            alert('Data Mahasiswa Berhasil Disimpan');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Disimpan: " . mysqli_error($koneksi) . "');
            window.history.back();
        </script>";
    }
}
?>