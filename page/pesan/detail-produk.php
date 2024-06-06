<?php
session_start();
?>
<?php include '_component/header.php'; ?>
<?php include "../config/connect.php"; ?>

<div class="content">
    <div class="container background-content">
        <?php
    if (isset($_GET['id'])) {
        $id_menu = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM menu WHERE id_menu = $id_menu";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
        <div class="nav-scroller mb-4">
            <div class="container-fluid pt-2 pb-2">
                <a href="page.php?mod=home" class="btn btn-danger">Halaman Utama</a> > <a href="page.php?mod=menu" class="btn btn-danger">Menu</a> > <a href="#" class="btn btn-danger"><?php echo $row["nama"] ?></a> 
            </div>
        </div>
        <div class="row mb-4">
            
            <div class="col-sm-12 col-lg-5">
                <img src="pesan/assets/img/menu/<?php echo $row["gambar"] ?>" class="img-fluid">
            </div>
            <div class="col-sm-12 col-lg-7">
                <div class="card card-body shadow-sm">
                    <h4 class="text-website">
                        <?php echo $row["nama"] ?>
                    </h4>
                    <h4 class="text-website">
                        Rp<?php echo $row["harga"] ?>
                    </h4>

                    <hr>
                    <p class="b text-muted">Kuantitas</p>
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="input-group-text">-</button>
                                </div>
                                <input type="text" class="form-control" value="1">
                                <div class="input-group-append">
                                    <button class="input-group-text">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-5">
                                <a href="page.php?mod=keranjang&id=<?php echo $id_menu; ?>" class="hvnb">
                                    <button class="btn btn-danger">
                                        Beli Sekarang
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <?php
                        }
                    } else {
                        echo "No data";
                    }
                ?>
    </div>
</div>

<?php include '_component/footer.php'; ?>