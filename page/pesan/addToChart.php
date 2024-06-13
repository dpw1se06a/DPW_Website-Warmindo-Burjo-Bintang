<?php
session_start();
include "../config/connect.php";
// Ambil data dari POST
$user_id = $_SESSION['user_id'];
$id_menu = $_POST['id_menu'];
$jumlah = $_POST['jumlah'];

$sql = "INSERT INTO keranjang(user_id, id_menu, jumlah, status) 
        VALUES (" . $user_id .", " . $id_menu .", " . $jumlah . ", 'pending')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: page.php?mod=keranjang");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Simpan data ke database, misalnya menggunakan PDO

?>
