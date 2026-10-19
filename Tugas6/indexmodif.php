<?php
include "koneksi.php";

// Modifikasi: Fitur Pencarian
$keyword = isset($_GET['cari']) ? mysqli_real_escape_string($koneksi, $_GET['cari']) : '';
$sql = "SELECT * FROM mahasiswa";
if ($keyword != '') {
    $sql .= " WHERE nim LIKE '%$keyword%' OR nama LIKE '%$keyword%'";
}
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Data Mahasiswa</title>
</head>
<body class="bg-gray-50 p-6 font-sans text-gray-800">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Data Mahasiswa</h2>
        
        <div class="flex justify-between items-center mb-4">
            <a href="create.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded transition">
               + Tambah Mahasiswa
            </a>
            
            <!-- Modifikasi: Form Pencarian -->
            <form action="index.php" method="GET" class="flex gap-2">
                <input type="text" name="cari" value="<?= htmlspecialchars($keyword) ?>" placeholder="Cari NIM atau Nama..." 
                       class="p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded transition">Cari</button>
                <?php if($keyword != ''): ?>
                    <a href="index.php" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-200 p-3 font-semibold">NIM</th>
                        <th class="border border-gray-200 p-3 font-semibold">Nama</th>
                        <th class="border border-gray-200 p-3 font-semibold">Email</th>
                        <th class="border border-gray-200 p-3 font-semibold">Prodi</th>
                        <th class="border border-gray-200 p-3 font-semibold">Angkatan</th>
                        <th class="border border-gray-200 p-3 font-semibold">IPK</th>
                        <th class="border border-gray-200 p-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) { 
                    ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border border-gray-200 p-3"><?= htmlspecialchars($data['nim']); ?></td>
                            <td class="border border-gray-200 p-3"><?= htmlspecialchars($data['nama']); ?></td>
                            <td class="border border-gray-200 p-3"><?= htmlspecialchars($data['email']); ?></td>
                            <td class="border border-gray-200 p-3"><?= htmlspecialchars($data['prodi']); ?></td>
                            <td class="border border-gray-200 p-3"><?= htmlspecialchars($data['angkatan']); ?></td>
                            <td class="border border-gray-200 p-3"><?= htmlspecialchars($data['ipk']); ?></td>
                            <td class="border border-gray-200 p-3 text-center">
                                <a href="edit.php?nim=<?= $data['nim']; ?>" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">Edit</a>
                                <span class="mx-1 text-gray-300">|</span>
                                <a href="delete.php?nim=<?= $data['nim']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="text-red-600 hover:text-red-800 hover:underline font-medium">Hapus</a>
                            </td>
                        </tr>
                    <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='7' class='text-center p-4 text-gray-500'>Data tidak ditemukan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>