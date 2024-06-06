<?php include '_component/header.php'; ?>

<body class="hold-transition sidebar-mini">
    <?php include '_component/wrapper.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gallery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <main role="main" class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>Produk</h2>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#tambahDataModal">
                                Tambah Data
                            </button>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Tanggal</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            include '../config/koneksi.php';
                // menggunakan query sql agar menampilkan data produk dan join kedalam tabel user agar mendapatkan siapa pemilik produk
                            $query = "SELECT * FROM berita";
                            $datas = $conn->query($query);
                            foreach ($datas as $data):
                            ?>
                                    <tr>
                                        <td>
                                            <?= $data['judul'] ?>
                                        </td>
                                        <td>
                                            <?= $data['konten'] ?>
                                        </td>
                                        <td>
                                            <?= $data['tanggal'] ?>
                                        </td>
                                        <td>
                                            <?= $data['gambar'] ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#editDataModal<?= $data['id_berita']?>">Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#hapusDataModal<?= $data['id_berita']?>">Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Modal ubah data -->
                                    <div class="modal fade" id="editDataModal<?= $data['produk_id'] ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="editDataModalLabel" ariahidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDataModalLabel">Tambah Data Pengguna
                                                    </h5>
                                                    <button type="button" class="close" datadismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="produk/ubah.php">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="produk_id"
                                                            value="<?= $data['produk_id'] ?>">
                                                        <div class=" form-group">
                                                            <label for="nama">Nama</label>
                                                            <input required type="text" class="formcontrol" id="nama"
                                                                name="nama" value="<?= $data['nama'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="harga">Harga</label>
                                                            <input required type="number" class="formcontrol" id="harga"
                                                                name="harga" value="<?= $data['harga'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="number">Stok</label>
                                                            <input required type="number" class="formcontrol"
                                                                id="number" name="stok" value="<?= $data['stok'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btnprimary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Hapus Data -->
                                    <div class="modal fade" id="hapusDataModal<?= $data['produk_id'] ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="hapusDataModalLabel<?= $data['produk_id'] ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="hapusDataModalLabel<?= $data['produk_id'] ?>">
                                                        Konfirmasi Penghapusan</h5>
                                                    <button type="button" class="close" datadismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data pengguna
                                                    ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <a href="produk/hapus.php?id=<?= $data['produk_id'] ?>"
                                                        class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include '_component/footer.php'; ?>