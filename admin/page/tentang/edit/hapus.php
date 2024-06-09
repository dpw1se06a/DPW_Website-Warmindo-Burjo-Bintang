<?php
include "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_tentang'];

    $query = "DELETE FROM tentang WHERE id_tentang = $id";

    if ($conn->query($query)) {
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
