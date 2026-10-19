<?php
include "koneksi.php";

// Fitur pencarian
$cari = isset($_GET['cari']) ? mysqli_real_escape_string($koneksi, $_GET['cari']) : '';
$sql  = "SELECT * FROM mahasiswa";
if ($cari != '') {
    $sql .= " WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%'";
}
$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f4f6f8; }
        h2 { color: #2c3e50; }
        table { border-collapse: collapse; width: 100%; background: #fff; box-shadow: 0 2px 6px rgba(0,0,0,.1); }
        th, td { padding: 10px 14px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #3498db; color: #fff; }
        tr:hover { background: #ecf0f1; }
        .cari { margin-bottom: 15px; }
        input[type=text] { padding: 7px; width: 220px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 7px 14px; background: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #2980b9; }
    </style>
</head>
<body>
    <h2>📋 Data Mahasiswa</h2>
    <form class="cari" method="get">
        <input type="text" name="cari" placeholder="Cari NIM / Nama..." value="<?= htmlspecialchars($cari) ?>">
        <button type="submit">Cari</button>
    </form>
    <table>
        <tr>
            <th>No</th><th>NIM</th><th>Nama</th><th>Email</th><th>Prodi</th><th>Angkatan</th><th>IPK</th>
        </tr>
        <?php $no = 1; while ($data = mysqli_fetch_assoc($query)): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($data['nim']) ?></td>
            <td><?= htmlspecialchars($data['nama']) ?></td>
            <td><?= htmlspecialchars($data['email']) ?></td>
            <td><?= htmlspecialchars($data['prodi']) ?></td>
            <td><?= htmlspecialchars($data['angkatan']) ?></td>
            <td><?= htmlspecialchars($data['ipk']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="form.php">➕ Tambah Data</a>
</body>
</html>