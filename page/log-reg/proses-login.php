<?php
// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../../config/connect.php";

// Cek apakah form telah disubmit
if (isset($_GET['email'], $_GET['password'])) {
    session_start();
    // Lakukan operasi pengecekan login di database
    $email = mysqli_real_escape_string($conn, $_GET['email']);

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nama'] = $user['nama'];
            header("Location: ../page.php?mod=home");
            exit();
    }
    else{
        echo "login gagal";
    }
    $stmt->close();
    $conn->close();
}
?>
