<?php include '_component/header.php';?>
<?php include '../../config/connect.php';?>

<body class="hold-transition sidebar-mini">
    <?php include '_component/wrapper.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kontak</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Kontak</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- HEADER -->
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col m-1">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#tambahDataKontak">
                                                Tambah Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="List" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="w-auto">Gambar</th>
                                            <th class="w-auto">Alamat</th>
                                            <th class="w-auto">Status</th>
                                            <th class="w-auto">aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM kontak";
                                        $q = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($q)) {
                                            $data[] = $row;
                                        }
                                        foreach ($data as $row):
                                        ?>
                                        <tr>
                                            <td><img src="data:image/jpeg;base64,<?= base64_encode($row['gambar']) ?>"
                                                    width="100px"></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td><?= $row['status'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editDataKontak<?= $row['id_kontak'] ?>"> Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#hapusDataKontak<?= $row['id_kontak'] ?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal tambah -->
                                        <div class="modal fade" id="tambahDataKontak" tabindex="-1"
                                            aria-labelledby="tambahDataKontakLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="tambahDataKontakLabel">
                                                            Tambah Data
                                                        </h1>
                                                    </div>

                                                    <form method="POST" action="kontak/edit/tambah.php">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="gambar">Pilih gambar: </label>
                                                                <input type="file" name="gambar" class="form-control"
                                                                    id="gambar" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Alamat</label>
                                                                <input type="text" class="form-control" id="alamat"
                                                                    name="alamat">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="staus" class="form-label">Status</label>
                                                                <input type="text" class="form-control" id="status"
                                                                    name="status">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tutup -->

                                        <!-- MODAL EDIT -->
                                        <div class="modal fade" id="editDataKontak<?= $row['id_kontak'] ?>"
                                            tabindex="-1" aria-labelledby="editDataKontak<?= $row['id_kontak'] ?>Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="editDataKontak<?= $row['id_kontak'] ?>Label">
                                                            Edit <?= $row['alamat'] ?>
                                                        </h1>
                                                    </div>
                                                    <form method="POST" action="kontak/edit/edit.php">
                                                        <div class="modal-body">
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control" id="id_kontak"
                                                                    name="id_kontak" value="<?= $row['id_kontak'] ?>"
                                                                    hidden="true">
                                                                <div class="mb-3">
                                                                    <label for="gambar"
                                                                        class="form-label">Gambar</label>
                                                                    <input type="file" class="form-control" id="gambar"
                                                                        name="gambar">
                                                                              
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="alamat"
                                                                        class="form-label">Alamat</label>
                                                                    <input type="text" class="form-control" id="alamat"
                                                                        name="alamat" value="<?= $row['alamat'] ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="status"
                                                                        class="form-label">Status</label>
                                                                    <input type="text" class="form-control" id="status"
                                                                        name="status" value="<?= $row['status'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- MODAL DELETE -->
                                        <div class="modal fade" id="hapusDataKontak<?= $row['id_kontak'] ?>"
                                            tabindex="-1" aria-labelledby="editDataKontak<?= $row['id_kontak'] ?>Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="editDataKontak<?= $row['id_kontak'] ?>Label">
                                                            Hapus <?= $row['alamat'] ?>
                                                        </h1>
                                                    </div>
                                                    <form method="POST" action="kontak/edit/hapus.php">
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" id="id_kontak"
                                                                name="id_kontak" value="<?= $row['id_kontak'] ?>"
                                                                hidden="true">
                                                            <div class="mb-3">
                                                                <h4>Konfirmasi hapus data</h4>
                                                            </div>
                                                        </div>

                                                        <div class=" modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>





                            </div>

                            <?php endforeach; ?>
                            </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <?php include '_component/footer.php'; ?>
</body>

</html>