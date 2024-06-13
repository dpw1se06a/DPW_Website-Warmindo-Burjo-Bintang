<?php
include '../../../config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Use prepared statement to delete data
        $stmt = $conn->prepare("DELETE FROM kontak WHERE id = ?");
        $stmt->bind_param("i", $id);

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
        echo "ID is required.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>