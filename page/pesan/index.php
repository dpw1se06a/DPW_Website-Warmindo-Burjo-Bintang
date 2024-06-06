<?php
session_start();
?>
<?php include '_component/header.php'; ?>
<?php include "../config/connect.php"; ?>
<!-- content home -->
<div class="content">
    <div class="container background-content">
        <!-- carousel -->
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="padding-top: 20px; padding-bottom: 40px">
            <div class="carousel-inner">
                <?php 
                    $sql = "SELECT * FROM carousel_produk";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id_carousel = $row["id_gambar"];
                            ?>
                <div class="carousel-item <?php if($id_carousel == 1) {
                    echo " active";
                } ?>">
                    <img src="pesan/assets/img/carousel/<?php echo $row["gambar"]; ?>" class="d-block w-100" alt="...">
                </div>
                <?php
                        }
                    } else {
                        echo "No data";
                    }
                    
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- menu -->
        <!-- makanan -->
        <div class="judul text-center">
            <h1 class="lobster-regular">Makanan</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4" style="padding-bottom: 40px">
            <?php 
                    $sql = "SELECT * FROM menu";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id_menu = $row["id_menu"];
                            if ($row["kategori"] == "minuman") continue;
                            ?>
            <div class="col">
                <div class="card h-100">
                    <img src="pesan/assets/img/menu/<?php echo $row["gambar"]?>" class="img-menu card-img-top" alt="..." style="width: 100%; height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["nama"]?></h5>
                        <p class="card-text">harga: Rp<?php echo $row["harga"]?></p>
                        <a href="page.php?mod=detail-produk&id=<?php echo $id_menu; ?>" class="btn btn-danger">Selengkapnya</a>
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
        <div class="judul text-center">
            <h1 class="lobster-regular">Minuman</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4" style="padding-bottom: 40px">
            <?php 
                    $sql = "SELECT * FROM menu";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id_menu = $row["id_menu"];
                            if ($row["kategori"] == "makanan") continue;
                            ?>
            <div class="col">
                <div class="card h-100">
                    <img src="pesan/assets/img/menu/<?php echo $row["gambar"]?>" class="img-menu card-img-top" alt="..." style="width: 100%; height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["nama"]?></h5>
                        <p class="card-text">harga: Rp<?php echo $row["harga"]?></p>
                        <a href="page.php?mod=detail-produk&id=<?php echo $id_menu; ?>" class="btn btn-danger">Selengkapnya</a>
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
</div>

<!-- end content -->
<?php include '_component/footer.php'; ?>