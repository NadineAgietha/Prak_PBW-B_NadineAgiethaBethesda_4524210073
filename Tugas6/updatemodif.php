<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim      = mysqli_real_escape_string($koneksi, trim($_POST['nim']));
    $nama     = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $email    = mysqli_real_escape_string($koneksi, trim($_POST['email']));
    $prodi    = mysqli_real_escape_string($koneksi, trim($_POST['prodi']));
    $angkatan = mysqli_real_escape_string($koneksi, trim($_POST['angkatan']));
    $ipk      = (float) $_POST['ipk'];

    if ($ipk < 0 || $ipk > 4) {
        echo "<script>alert('Gagal: IPK harus antara 0.00 sampai 4.00!'); window.history.back();</script>";
        exit;
    }

    // Cek jika email diganti dengan email milik orang lain
    $cek = mysqli_query($koneksi, "SELECT email FROM mahasiswa WHERE email='$email' AND nim != '$nim'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Gagal: Email sudah digunakan oleh mahasiswa lain!'); window.history.back();</script>";
        exit;
    }

    $query = mysqli_query(
        $koneksi,
        "UPDATE mahasiswa
         SET nama='$nama', email='$email', prodi='$prodi', angkatan='$angkatan', ipk=$ipk
         WHERE nim='$nim'"
    );

    if ($query) {
        echo "<script>
            alert('Data mahasiswa berhasil diubah');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah');
            window.history.back();
        </script>";
    }
}
?>