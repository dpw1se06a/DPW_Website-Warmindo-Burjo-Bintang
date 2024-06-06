<?php
// Koneksi ke database (gantikan dengan koneksi sesuai dengan informasi database Anda)
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'reviews';
$koneksi = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $tentang = $_POST['tentang'];
    $pesan = $_POST['pesan'];

    // Simpan data ke database
    $sql = "INSERT INTO reviews (nama, email, telepon, tentang, pesan) VALUES ('$nama', '$email', '$telepon', '$tentang', '$pesan')";
    if ($koneksi->query($sql) === TRUE) {
        header('Location: get_review.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>

<?php
// Koneksi ke database (gantikan dengan koneksi sesuai dengan informasi database Anda)
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'reviews';

$koneksi = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Fungsi untuk menghapus ulasan
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM reviews WHERE id=$id";
    if ($koneksi->query($sql) === TRUE) {
        // Redirect kembali ke halaman utama setelah berhasil menghapus
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Ambil ulasan dari database
$sql = "SELECT id, nama, email, pesan, tentang, tanggal FROM reviews ORDER BY tanggal DESC";
$result = $koneksi->query($sql);

// Periksa apakah query berhasil
if (!$result) {
    die("Error dalam eksekusi query: " . $koneksi->error);
}

// Buat array untuk menyimpan hasil
$reviews = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}

// Tutup koneksi
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container get_review">
        <h2 class="text-center">Ulasan</h2>
        <?php foreach ($reviews as $review): ?>
        <div class="review">
            <div class="profile">
                <img src="https://via.placeholder.com/50" alt="Profile Picture">
                <div class="profile-info">
                    <div class="name"><?php echo htmlspecialchars($review['nama']); ?></div>
                    <div class="email"><?php echo htmlspecialchars($review['email']); ?></div>
                </div>
            </div>
            <div class="message">
                <?php echo nl2br(htmlspecialchars($review['pesan'])); ?>
            </div>
            <div class="btn-container">
                <a href="edit_review.php?id=<?php echo $review['id']; ?>" class="btn btn-edit">Edit</a>
                <a href="?action=delete&id=<?php echo $review['id']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">Delete</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
