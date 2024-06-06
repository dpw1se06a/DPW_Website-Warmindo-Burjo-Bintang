<?php
// Include header file
$header_file = '_component/header.php';
if (file_exists($header_file)) {
    include $header_file;
} else {
    echo "Header file not found.";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "warmindo_bintang";

    try {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare SQL statement to insert data
        $stmt = $conn->prepare("INSERT INTO admin (id_admin, Nama, Gambar, Tanggal) 
                                VALUES (:id_admin, :Nama, :Gambar, :Tanggal)");
        
        // Sanitize and validate input data
        $id_admin = htmlspecialchars($_POST['id_nama']);
        $Nama = htmlspecialchars($_POST['Nama']);
        $Gambar = htmlspecialchars($_POST['Gambar']);
        $Tanggal= date('Y-m-d H:i:s');
        
        // Bind parameters
        $stmt->bindParam(':id_admin', $id_admin);
        $stmt->bindParam(':Nama', $Nama);
        $stmt->bindParam(':Gambar', $Gambar);
        $stmt->bindParam(':Tanggal', $Tanggal);
        
        // Execute the prepared statement
        $stmt->execute();

        // Redirect to success page or display success message
        header("Location: datatabel.php");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Close connection
        $conn = null;
    }
}
?>

<!-- Aside -->

<body class="hold-transition sidebar-mini">
    <?php 
        // Include wrapper file
        $wrapper_file = '_component/wrapper.php';
        if (file_exists($wrapper_file)) {
            include $wrapper_file;
        } else {
            echo "Wrapper file not found.";
        }
    ?>
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
                    <h3 class="card-title">Tambah Fasilitas</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_admin">id_admin</label>
                            <input type="int" class="form-control" id="id_admin" placeholder="id_admin" name="id_admin"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control" id="Nama" placeholder="Nama" name="Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="Gambar">Gambar</label>
                            <input type="text" class="form-control" id="Gambar" placeholder="Gambar" name="Gambar"
                                required>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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