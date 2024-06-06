<?php
// **Informasi database**
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "warmindo_bintang";

// **Membuat koneksi**
$koneksi = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// **Mengecek koneksi**
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!";
}
?>