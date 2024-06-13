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
                        <h1>Menu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Menu</li>
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
                                                data-target="#tambahDataMenu">
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
                                            <th class="w-auto">Judul</th>
                                            <th class="w-auto">Deskripsi</th>
                                            <th class="w-auto">Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM cards";
                                        $q = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($q)) {
                                            $data[] = $row;
                                        }
                                        foreach ($data as $row):
                                        ?>
                                        <tr>
                                            <td><img src="<?= $row['image'] ?>" width="100px"></td>
                                            <td><?= $row['title'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editDataMenu<?= $row['id'] ?>"> Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#hapusDataMenu<?= $row['id'] ?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal tambah -->
                                        <div class="modal fade" id="tambahDataMenu" tabindex="-1"
    aria-labelledby="tambahDataMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahDataMenuLabel">
                    Tambah Data
                </h1>
            </div>
            <form method="POST" action="page.php?mod=addMenu">
                <div class="modal-body">
                     <div class="mb-3">
                        <label for="title" class="form-label">judul</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="image" name="image">
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
                                        <div class="modal fade" id="editDataMenu<?= $row['id'] ?>" tabindex="-1"
                                            aria-labelledby="editDataMenu<?= $row['id'] ?>Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="editDataMenu<?= $row['id'] ?>Label">
                                                            Edit <?= $row['title'] ?>
                                                        </h1>
                                                    </div>
                                                    <form method="POST" action="page.php?mod=updateMenu">
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" id="id"
                                                                name="id" value="<?= $row['id'] ?>"
                                                                hidden="true">
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Judul</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title" value="<?= $row['title'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">Deskripsi</label>
                                                                <input type="text" class="form-control" id="description"
                                                                    name="description" value="<?= $row['description'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="image" class="form-label">Gambar</label>
                                                                <input type="text" class="form-control" id="image"
                                                                    name="image" value="<?= $row['image'] ?>">
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
                                        <div class="modal fade" id="hapusDataMenu<?= $row['id'] ?>" tabindex="-1"
                                            aria-labelledby="editDataMenu<?= $row['id'] ?>Label"
                                            aria-hidden="true">
                                            <div class="
modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="editDataMenu<?= $row['id'] ?>Label">
                                                            Hapus <?= $row['title'] ?>
                                                        </h1>
                                                    </div>
                                                    <form method="POST" action="page.php?mod=deleteMenu">
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" id="id"
                                                                name="id" value="<?= $row['id'] ?>"
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
