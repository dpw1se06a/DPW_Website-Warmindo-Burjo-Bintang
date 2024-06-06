<?php include '_component/header.php'; ?>

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
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Warmin Burjo Bintang</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <?php
                        // Koneksi ke database
                        $servername = "localhost";
                        $username = "root"; // ganti dengan username database Anda
                        $password = ""; // ganti dengan password database Anda
                        $dbname = "reviews";

                        // Membuat koneksi
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Cek koneksi
                        if ($conn->connect_error) {
                            die("Koneksi gagal: " . $conn->connect_error);
                        }

                        // Tangani penghapusan data
                        if (isset($_GET['delete_id'])) {
                            $id = intval($_GET['delete_id']);

                            $query = "DELETE FROM reviews WHERE id = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $id);

                            if ($stmt->execute()) {
                                $message = 'success';
                            } else {
                                $message = 'error';
                            }

                            $stmt->close();
                        }
                        ?>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Tentang</th>
                                        <th>Pesan</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM reviews";
                                    $result = $conn->query($query);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                <td>{$row['id']}</td>
                                                <td>{$row['nama']}</td>
                                                <td>{$row['email']}</td>
                                                <td>{$row['telepon']}</td>
                                                <td>{$row['tentang']}</td>
                                                <td>{$row['pesan']}</td>
                                                <td>{$row['tanggal']}</td>
                                                <td class='text-right py-0 align-middle'>
                                                    <div class='btn-group btn-group-sm'>
                                                        <a href='?delete_id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'><i class='fas fa-trash'></i></a>
                                                    </div>
                                                </td>
                                              </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No records found</td></tr>";
                                    }

                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>

</section>
    <!-- /.content -->
</div>
    <?php include '_component/footer.php'; ?>