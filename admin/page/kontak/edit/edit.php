<?php
include '../../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_kontak'];
    $gambar = $_POST['gambar'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $sql = "UPDATE kontak SET gambar = '$gambar', alamat = '$alamat', status = '$status' WHERE id_kontak = '$id'";

    if ($conn->query($sql)) {
        ?>
        <script>
            window.location = "../../page.php?mod=kontak";
        </script>
        <?php
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>