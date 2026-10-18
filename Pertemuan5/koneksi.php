<?php 
$host = '127.0.0.1';
$user = 'root';
$dbname = 'akademik';
$password = '';
$port = '3306';

$koneksi = mysqli_connect ($host, $user, $password, $dbname, $port);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi ke server MYSQL berhasil!\n";
?>