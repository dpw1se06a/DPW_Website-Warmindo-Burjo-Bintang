<?php
include '../../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gambar = $_FILES['gambar'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    // Check if image is valid
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($gambar['type'], $allowedTypes)) {
        $imgContent = file_get_contents($gambar['tmp_name']);

        // Use prepared statement to insert data
        $stmt = $conn->prepare("INSERT INTO kontak (gambar, alamat, status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $imgContent, $alamat, $status);

        if ($stmt->execute()) {
            ?>
            <script>
                window.location = "../../page.php?mod=kontak";
            </script>
            <?php
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid file type. Only JPG, PNG, and GIF types are allowed.";
    }
}
?>
