<?php include '_component/header.php'; ?>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <?php include '_component/wrapper.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pesanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">jsGrid</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar pesanan</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 600px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Nama</th>
                                            <th>Menu dipesan</th>
                                            <th>Total</th>
                                            <th>Bukti pembayaran</th>
                                            <th>Tanggal pesanan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>5</td>
                                            <td>John Doe</td>
                                            <td>Magelangan</td>
                                            <td>Rp12.000</td>
                                            <td><img src="https://placehold.co/400x400" alt=""></td>
                                            <td>05-06-2024</td>
                                            <td><span class="tag tag-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Wahyu</td>
                                            <td>Es teh</td>
                                            <td>Rp3.000</td>
                                            <td><img src="https://placehold.co/400x400" alt=""></td>
                                            <td>05-06-2024</td>
                                            <td><span class="tag tag-success">Approved</span></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar pesanan selesai</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 600px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Nama</th>
                                            <th>Menu dipesan</th>
                                            <th>Total</th>
                                            <th>Bukti pembayaran</th>
                                            <th>Tanggal pesanan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>5</td>
                                            <td>John Doe</td>
                                            <td>Magelangan</td>
                                            <td>Rp12.000</td>
                                            <td><img src="https://placehold.co/400x400" alt=""></td>
                                            <td>05-06-2024</td>
                                            <td><span class="tag tag-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Wahyu</td>
                                            <td>Es teh</td>
                                            <td>Rp3.000</td>
                                            <td><img src="https://placehold.co/400x400" alt=""></td>
                                            <td>05-06-2024</td>
                                            <td><span class="tag tag-success">Approved</span></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include '_component/footer.php'; ?>