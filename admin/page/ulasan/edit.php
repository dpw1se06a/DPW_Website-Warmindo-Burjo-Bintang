<?php
include '_component/header.php'; 

// Konfigurasi koneksi database
$servername = "localhost"; // Ganti dengan nama server database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "reviews"; // Ganti dengan nama database Anda

// Buat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>

<!-- Aside -->
<?php include '_component/wrapper.php'; ?>

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
                <h3 class="card-title">Ubah Ulasan</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Tentang</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th> <!-- Menambahkan kolom aksi -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM reviews";
                        $result = $koneksi->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['telepon'] ?></td>
                                    <td><?= $row['tentang'] ?></td>
                                    <td><?= $row['pesan'] ?></td>
                                    <td><?= $row['tanggal'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal<?= $row['id'] ?>">Edit</button>
                                    </td>
                                </tr>
                                <!-- Modal ubah data -->
                                <div class="modal fade" id="editDataModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel<?= $row['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDataModalLabel<?= $row['id'] ?>">Ubah Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="config/proses_ubah.php">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input required type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input required type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telepon">Telepon</label>
                                                        <input required type="text" class="form-control" id="telepon" name="telepon" value="<?= $row['telepon'] ?>">
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
                                                        <textarea required class="form-control" id="pesan" name="pesan"><?= $row['pesan'] ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input required type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $row['tanggal'] ?>">
                                                    </div>
                                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            echo "<tr><td colspan='7'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include '_component/footer.php'; ?>
