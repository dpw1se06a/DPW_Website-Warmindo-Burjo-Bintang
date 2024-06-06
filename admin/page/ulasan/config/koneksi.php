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
        echo "data berhasil tersimpan"
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>