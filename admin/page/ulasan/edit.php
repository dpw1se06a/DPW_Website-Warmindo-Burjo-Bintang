<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $telepon = $_POST['telepon'];
  $tentang = $_POST['tentang'];
  $pesan = $_POST['pesan'];
  $tanggal = $_POST['tanggal'];

  $sql = "UPDATE reviews SET nama = '$nama', email = '$email', telepon = '$telepon', tentang = '$tentang', pesan = '$pesan', tanggal = '$tanggal' WHERE id = '$id'";

  if ($conn->query($sql)) {
?>
    <script>
      window.location = "page.php?mod=datatabel.php";
    </script>
<?php
  } else {
    echo "Error executing query: " . $conn->error;
  }
}
