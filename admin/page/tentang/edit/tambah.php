<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gambar = $_POST['gambar'];
    $upload_date = $_POST['upload_date'];

    $sql = "INSERT INTO tentang (id_tentang, gambar, upload_date) VALUES (NULL, '$gambar', '$upload_date')";

    if ($conn->query($sql)) {
        ?>
        <script>
            window.location = "page.php?mod=tentang";
        </script>
        <?php
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>
