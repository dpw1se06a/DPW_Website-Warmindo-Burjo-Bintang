<?php

include "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_minuman'];

    echo $id . "<br>";
    $query = "DELETE FROM minuman WHERE id_minuman = $id";

    if ($conn->query($query)) {
        ?>
        <script>
            window.location = "page.php?mod=minuman";
        </script>
        <?php
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}