<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    // Sanitize and validate input
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $image = $conn->real_escape_string($_POST['image']);

    // Prepare SQL statement
    $sql = "INSERT INTO cards (title, description, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sss", $title, $description, $image);

        // Execute the statement
        if ($stmt->execute()) {
            ?>
            <script>
                window.location = "page.php?mod=menu";
            </script>
            <?php
            exit;
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }
}
?>
