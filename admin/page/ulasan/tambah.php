<?php
// Include wrapper file
$header_file = '_component/header.php';
if (file_exists($header_file)) {
    include $header_file;
} else {
    echo "Wrapper file not found.";
}

// Koneksi ke database
$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "reviews"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);
// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $tentang = $_POST['tentang'];
    $pesan = $_POST['pesan'];
    $tanggal = date("Y-m-d H:i:s");

    // Query untuk menyimpan data ke tabel
    $sql = "INSERT INTO reviews (nama, email, telepon, tentang, pesan, tanggal) VALUES ('$nama', '$email', '$telepon', '$tentang', '$pesan', '$tanggal')";

    if ($conn->query($sql) === TRUE) {
        echo "Ulasan berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!-- Aside -->
<body class="hold-transition sidebar-mini">
    <?php 
        // Include wrapper file
        $wrapper_file = '_component/wrapper.php';
        if (file_exists($wrapper_file)) {
            include $wrapper_file;
        } else {
            echo "Wrapper file not found.";
        }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ulasan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Ulasan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Ulasan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="reviewForm" action="koneksi.php" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">No Telepon</label>
                            <input type="text" class="form-control" id="telepon" placeholder="No Telepon" name="telepon" required>
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
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea class="form-control" id="pesan" placeholder="Pesan" name="pesan" required></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

    <?php 
        // Include footer file
        $footer_file = '_component/footer.php';
        if (file_exists($footer_file)) {
            include $footer_file;
        } else {
            echo "Footer file not found.";
        }
    ?>
