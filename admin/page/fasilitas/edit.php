<?php 
include '_component/header.php'; 

// Konfigurasi koneksi database
$servername = "localhost"; // Ganti dengan nama server database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "warmindo_bintang"; // Ganti dengan nama database Anda

// Buat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

?>

<!-- Aside -->

<body class="hold-transition sidebar-mini">
    <?php include '_component/wrapper.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fasilitas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Fasilitas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ubah Fasilitas</h3>
                </div>
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Warmindo Burjo Bintang</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th> <!-- Menambahkan kolom aksi -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM admin";
                                $result = $koneksi->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $row['id_admin'] ?></td>
                                    <td><?= $row['Nama'] ?></td>
                                    <td><?= $row['Gambar'] ?></td>
                                    <td><?= $row['Tanggal'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#editDataModal<?= $row['id'] ?>">Edit</button>
                                    </td>
                                </tr>
                                <!-- Modal ubah data -->
                                <div class="modal fade" id="editDataModal<?= $row['id'] ?>" tabindex="-1" role="dialog"
                                    aria-labelledby="editDataModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDataModalLabel">Ubah Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="config/proses_ubah.php">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input required type="text" class="form-control" id="nama"
                                                            name="nama" value="<?= $row['Nama'] ?>">
                                                    </div>
                                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No records found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
                </main>
        </section>
        <!-- /.content -->
    </div>

    </section>
    <!-- /.content -->
    </div>
    <?php include '_component/footer.php'; ?>