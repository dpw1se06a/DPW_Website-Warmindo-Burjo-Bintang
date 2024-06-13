<?php
// Koneksi ke database
include '../../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ids']) && !empty($_POST['ids'])) {
        $ids = $_POST['ids'];
        $ids_string = implode(',', $ids);
        // SQL query untuk update status
        $sql = "UPDATE keranjang SET status = 'checkout' WHERE id_keranjang IN ($ids_string)";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: ../../page.php?mod=checkout");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "No items selected";
    }
}

// Menutup koneksi
$conn->close();
?>
