<?php include '_component/header.php';?>
<?php include '../../config/koneksi.php';?>

<body class="hold-transition sidebar-mini">
    <?php include '_component/wrapper.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tentang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Tentang</li>
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
                                                data-target="#tambahDataTentang">
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
                                            <th class="w-auto">Upload Date</th>
                                            <th class="w-auto">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM tentang";
                                        $q = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($q)) {
                                            $data[] = $row;
                                        }
                                        foreach ($data as $row):
                                        ?>
                                        <tr>
                                            <td><img src="<?= $row['gambar'] ?>" width="100px"></td>
                                            <td><?= $row['upload_date'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editDataTentang<?= $row['id_tentang'] ?>"> Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#hapusDataTentang<?= $row['id_tentang'] ?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal tambah -->
                                        <div class="modal fade" id="tambahDataTentang" tabindex="-1"
    aria-labelledby="tambahDataTentangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahDataTentangLabel">
                    Tambah Data
                </h1>
            </div>
            <form method="POST" action="page.php?mod=addTentang">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="gambar" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label for="upload_date" class="form-label">Upload Date</label>
                        <input type="date" class="form-control" id="upload_date" name="upload_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
                                         <!-- Tutup -->
                                        <!-- MODAL EDIT -->
                                        <div class="modal fade" id="editDataTentang<?= $row['id_tentang'] ?>" tabindex="-1"
                                            aria-labelledby="editDataTentang<?= $row['id_tentang'] ?>Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="editDataTentang<?= $row['id_tentang'] ?>Label">
                                                            Edit <?= $row['upload_date'] ?>
                                                        </h1>
                                                    </div>
                                                    <form method="POST" action="page.php?mod=updateTentang">
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" id="id_tentang"
                                                                name="id_tentang" value="<?= $row['id_tentang'] ?>"
                                                                hidden="true">
                                                            <div class="mb-3">
                                                                <label for="gambar" class="form-label">Gambar</label>
                                                                <input type="text" class="form-control" id="gambar"
                                                                    name="gambar" value="<?= $row['gambar'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="upload_date" class="form-label">Upload Date</label>
                                                                <input type="date" class="form-control" id="upload_date"
                                                                    name="upload_date" value="<?= $row['upload_date'] ?>">
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
                                        <div class="modal fade" id="hapusDataTentang<?= $row['id_tentang'] ?>" tabindex="-1"
                                            aria-labelledby="editDataTentang<?= $row['id_tentang'] ?>Label"
                                            aria-hidden="true">
                                            <div class="
modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="editDataTentang<?= $row['id_tentang'] ?>Label">
                                                            Hapus <?= $row['upload_date'] ?>
                                                        </h1>
                                                    </div>
                                                    <form method="POST" action="page.php?mod=deleteTentang">
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" id="id_tentang"
                                                                name="id_tentang" value="<?= $row['id_tentang'] ?>"
                                                                hidden="true">
                                                            <div class="mb-3">
                                                                <h4>Konfirmasi hapus </h4>
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
