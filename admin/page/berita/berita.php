<?php include '_component/header.php';?>
<?php include '../../config/connect.php';?>

<?php
include '../../functions/sorting.php';
?>

<body class="hold-transition sidebar-mini">
    <?php include '_component/wrapper.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Berita</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Berita</li>
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
                            <div class="modal fade" id="tambahDataMenu" tabindex="-1"
                                aria-labelledby="tambahDataMenuLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="tambahDataMenuLabel">
                                                Tambah Data
                                            </h1>
                                        </div>
                                        <form method="POST" action="page.php?mod=addBerita"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Judul Berita</label>
                                                    <input type="text" class="form-control" id="title" name="judul"
                                                        value="">
                                                </div>
                                                <div class="mb-3">
                                                    <label type="textarea" for="title" class="form-label">Konten</label>
                                                    <textarea class="form-control" id="title" name="konten" value="<?= $row['konten'] ?>"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label type="date" for="title" class="form-label">Tanggal</label>
                                                    <input type="date" class="form-control" id="title" name="tanggal"
                                                        value="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Gambar</label>
                                                    <input type="file" name="file">
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

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="List" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="w-auto">Gambar</th>
                                            <th class="w-auto">Judul</th>
                                            <th class="w-auto">Konten</th>
                                            <th class="w-auto">Tanggal</th>
                                            <th class="w-auto"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM berita";
                                        $q = mysqli_query($conn, $sql);
                                        $data = [];
                                        while ($row = mysqli_fetch_array($q)) {
                                            $data[] = $row;
                                        }
                                        insertionSortDesc($data, "tanggal");
                                        foreach ($data as $row):
                                        ?>
                                        <tr>
                                            <td><img src="../../uploads/berita/<?= $row['gambar'] ?>" width="100px">
                                            </td>
                                            <td><?= $row['judul'] ?></td>
                                            <td><?= $row['konten'] ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editDataMenu<?= $row['id_berita'] ?>"> Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#hapusDataMenu<?= $row['id_berita'] ?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal tambah -->

                                        <!-- Tutup -->
                                        <!-- MODAL EDIT -->
                                        <div class="modal fade" id="editDataMenu<?= $row['id_berita'] ?>" tabindex="-1"
                                            aria-labelledby="editDataMenu<?= $row['id_berita'] ?>Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="editDataMenu<?= $row['id_berita'] ?>Label">
                                                            Edit
                                                        </h1>
                                                    </div>
                                                    <form method="POST" action="page.php?mod=updateBerita"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" id="id" name="id"
                                                                value="<?= $row['id_berita'] ?>" hidden="true">
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Judul
                                                                    Berita</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="judul" value="<?= $row['judul'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Konten</label>
                                                                <textarea class="form-control" id="title" name="konten" value="<?= $row['konten'] ?>"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Tanggal</label>
                                                                <input type="date" class="form-control" id="title"
                                                                    name="tanggal" value="<?= $row['tanggal'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="image" class="form-label">Gambar</label>
                                                                <input type="file" name="file">
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
                                        <div class="modal fade" id="hapusDataMenu<?= $row['id_berita'] ?>" tabindex="-1"
                                            aria-labelledby="editDataMenu<?= $row['id_berita'] ?>Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="editDataMenu<?= $row['id_berita'] ?>Label">
                                                            Hapus
                                                        </h1>
                                                    </div>
                                                    <form method="POST" action="page.php?mod=deleteBerita">
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" id="id" name="id"
                                                                value="<?= $row['id_berita'] ?>" hidden="true">
                                                            <div class="mb-3">
                                                                <h4>Konfirmasi hapus</h4>
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
    </div>
        <?php include '_component/footer.php'; ?>
</body>

</html>