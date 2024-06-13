<?php
include '../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_tentang'];
    $gambar = $_POST['gambar'];
    $upload_date = $_POST['upload_date'];

    $sql = "UPDATE tentang SET gambar = '$gambar', upload_date = '$upload_date' WHERE id_tentang = '$id'";

    if ($conn->query($sql)) {
        ?>
        <script>
            window.location = "page.php?mod=tentang";
        </script>
        <?php
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>
