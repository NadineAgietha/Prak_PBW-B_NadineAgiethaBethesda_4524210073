<?php 
$host = '127.0.0.1';
$user = 'root';
$password = '';
$port = '3306';
$dbname = 'akademik';

$koneksi = mysqli_connect ($host, $user, $password, $dbname);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi ke server MYSQL berhasil!\n";
?>