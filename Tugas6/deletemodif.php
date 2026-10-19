<?php
include "koneksi.php";

if (isset($_GET['nim']) && !empty($_GET['nim'])) {
    $nim = mysqli_real_escape_string($koneksi, $_GET['nim']);

    $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'");

    if ($query) {
        echo "<script>
            alert('Data mahasiswa berhasil dihapus');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus');
            window.history.back();
        </script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>