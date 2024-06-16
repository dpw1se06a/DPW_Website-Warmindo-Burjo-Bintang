<?php
session_start();
include "../config/connect.php";

// Ambil data dari POST
$user_id = $_SESSION['user_id'];
$id_menu = $_POST['id_menu'];
$jumlah = $_POST['jumlah'];

// Insert a new record into the transaksi table
$sqlTransaksi = "INSERT INTO transaksi(user_id, bukti, status) 
        VALUES ($user_id, 'default', 'default')";
if ($conn->query($sqlTransaksi) === TRUE) {
    echo "New record in transaksi created successfully";
} else {
    die("Error: " . $sqlTransaksi . "<br>" . $conn->error);
}

// Retrieve the id_transaksi for the current user
$sqlSelect = "SELECT id_transaksi FROM transaksi WHERE user_id = $user_id ORDER BY id_transaksi DESC LIMIT 1";
$result = mysqli_query($conn, $sqlSelect);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_transaksi = $row['id_transaksi'];
    echo "id_transaksi: " . $id_transaksi;
} else {
    die("Error: Could not retrieve id_transaksi. " . $sqlSelect . "<br>" . $conn->error);
}

// Insert a new record into the keranjang table
$sql = "INSERT INTO keranjang(user_id, id_transaksi, id_menu, jumlah, status) 
        VALUES ($user_id, $id_transaksi, $id_menu, $jumlah, 'pending')";
if ($conn->query($sql) === TRUE) {
    echo "New record in keranjang created successfully";
    header("Location: page.php?mod=keranjang");
} else {
    die("Error: " . $sql . "<br>" . $conn->error);
}

?>
