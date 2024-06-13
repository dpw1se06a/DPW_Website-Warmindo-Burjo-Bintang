<?php
include '../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "UPDATE cards SET image = '$image', title = '$title', description = '$description' WHERE id = '$id'";

    if ($conn->query($sql)) {
        ?>
        <script>
            window.location = "page.php?mod=menu";
        </script>
        <?php
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>
