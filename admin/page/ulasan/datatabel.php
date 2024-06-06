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
    $dbname = "reviews";

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

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Ulasan Pengguna</h3>
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
                <!-- /.card-header -->
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Loop through each row and display data
                                foreach ($results as $row) {
                                echo "<tr>";
                                echo "<td>".$row['nama']."</td>";
                                echo "<td>".$row['email']."</td>";
                                echo "<td>".$row['telepon']."</td>";
                                echo "<td>".$row['tentang']."</td>";
                                echo "<td>".$row['pesan']."</td>";
                                echo "<td>".$row['tanggal']."</td>";
                                echo "</tr>";
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
        <!-- /.content -->
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
