<?php
// Include header file
$header_file = '_component/header.php';
if (file_exists($header_file)) {
    include $header_file;
} else {
    echo "Header file not found.";
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement to fetch data
    $stmt = $conn->prepare("SELECT * FROM reviews");
    // Execute the prepared statement
    $stmt->execute();
    // Fetch all rows as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<body class="hold-transition sidebar-mini">
    <?php include '_component/wrapper.php'; ?>
    <div class="content-wrapper">
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
            </div>
        </section>

        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Ulasan Pengguna</h3>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Warmin Burjo Bintang</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>Tentang</th>
                                    <th>Pesan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($results as $row) {
                                        echo "<tr>";
                                        echo "<td>".$row['nama']."</td>";
                                        echo "<td>".$row['email']."</td>";
                                        echo "<td>".$row['telepon']."</td>";
                                        echo "<td>".$row['tentang']."</td>";
                                        echo "<td>".$row['pesan']."</td>";
                                        echo "<td>".$row['tanggal']."</td>";
                                        echo "<td>
                                                <a href='/Website-Warmindo-Burjo-Bintang/admin/page/ulasan/config/prosesubah.php' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editDataModal".$row['id']."'>Edit</a>
                                                <a href='hapus_user.php".$row['id']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this review?\");'>Delete</a>
                                              </td>";
                                        echo "</tr>";

                                        // Modal for edit
                                        echo "
                                        <div class='modal fade' id='editDataModal".$row['id']."' tabindex='-1' role='dialog' aria-labelledby='editDataModalLabel".$row['id']."' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='editDataModalLabel".$row['id']."'>Ubah Data</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method='POST' action='/Website-Warmindo-Burjo-Bintang/admin/page/ulasan/config/prosesubah.php'>
                                                        <div class='modal-body'>
                                                            <input type='hidden' name='id' value='".$row['id']."'>
                                                            <div class='form-group'>
                                                                <label for='nama'>Nama</label>
                                                                <input required type='text' class='form-control' id='nama' name='nama' value='".$row['nama']."'>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label for='email'>Email</label>
                                                                <input required type='email' class='form-control' id='email' name='email' value='".$row['email']."'>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label for='telepon'>Telepon</label>
                                                                <input required type='text' class='form-control' id='telepon' name='telepon' value='".$row['telepon']."'>
                                                            </div>
                                                            <div class='mb-3'>
                                                                <label for='tentang' class='form-label'>Tentang:</label>
                                                                <select class='form-select' id='tentang' name='tentang' required>
                                                                    <option value='Pelayanan' ".($row['tentang'] == 'Pelayanan' ? 'selected' : '').">Pelayanan</option>
                                                                    <option value='Makanan' ".($row['tentang'] == 'Makanan' ? 'selected' : '').">Makanan</option>
                                                                    <option value='Fasilitas' ".($row['tentang'] == 'Fasilitas' ? 'selected' : '').">Fasilitas</option>
                                                                    <option value='Harga' ".($row['tentang'] == 'Harga' ? 'selected' : '').">Harga</option>
                                                                    <option value='Lainnya' ".($row['tentang'] == 'Lainnya' ? 'selected' : '').">Lainnya</option>
                                                                </select>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label for='pesan'>Pesan</label>
                                                                <textarea required class='form-control' id='pesan' name='pesan'>".$row['pesan']."</textarea>
                                                            </div>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                            <button type='submit' class='btn btn-primary'>Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>";
                                    }
                                    
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
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
</body>
</html>
