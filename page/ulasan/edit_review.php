<?php
// Koneksi ke database (gantikan dengan koneksi sesuai dengan informasi database Anda)
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'project';

$koneksi = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Fungsi untuk mengambil data ulasan yang akan diedit
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM reviews WHERE id=$id";
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
        $review = $result->fetch_assoc();
    } else {
        echo "Ulasan tidak ditemukan.";
        exit();
    }
}

// Proses penyuntingan ulasan
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $sql = "UPDATE reviews SET nama='$nama', email='$email', pesan='$pesan' WHERE id=$id";
    if ($koneksi->query($sql) === TRUE) {
        // Redirect kembali ke halaman get_review.php setelah berhasil mengedit
        header("Location: get_review.php?id=$id");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
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
    <title>Edit Ulasan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container edit_review">
        <h2 class="text-center">Edit Ulasan</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="id" value="<?php echo $review['id']; ?>">
            <form id="reviewForm" action="submit_review.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="tentang" class="form-label">Tentang:</label>
                <select class="form-select" id="tentang" name="tentang" required>
                    <option value="Pelayanan">Pelayanan</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Fasilitas">Fasilitas</option>
                    <option value="Harga">Harga</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan:</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
            </div>
            <input type="submit" name="submit" value="Simpan">
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
