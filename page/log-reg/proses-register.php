<?php
// Aktifkan laporan kesalahan
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Konfigurasi database
include "../../config/connect.php";

// Mendapatkan data dari form
$nama = $_GET['nama'];
$email = $_GET['email'];
$no_hp = $_GET['no_hp'];
$password = $_GET['password'];
$role_id = 3; // Set default role_id sebagai 'user'

// Mengenkripsi password
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Menyiapkan pernyataan SQL
$sql = "INSERT INTO user (role_id, nama, email, no_hp, password) VALUES (?, ?, ?, ?, ?)";

// Menggunakan prepared statement untuk keamanan
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $role_id, $nama, $email, $no_hp, $password);

// Menjalankan pernyataan SQL
if ($stmt->execute()) {
    // Mengarahkan ke halaman login
    header("Location: ../page.php?mod=login");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup statement
$stmt->close();

// Menutup koneksi
$conn->close();
?>
