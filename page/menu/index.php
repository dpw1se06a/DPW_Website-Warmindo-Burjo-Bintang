<?php include '_component/header.php'; ?>
<?php include "../config/connect.php"; ?>
<?php
$userName = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>
<?php

include "../functions/sorting.php";

// Mengambil data dari database
$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);

$makanan = [];
$minuman = [];

if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["kategori"] == "makanan") {
            $makanan[] = $row;
        } else if ($row["kategori"] == "minuman") {
            $minuman[] = $row;
        }
    }
    // Urutkan makanan dengan insertion sort
    insertionSortDesc($makanan, "harga");

    // Urutkan minuman dengan bubble sort
    bubbleSortDesc($minuman, "harga");
} else {
    echo "No data";
}

?>
<!-- content home -->
<div class="content">
    <div class="container background-content">
        <div class="row">
            <?php
                if ($login->isUserLoggedIn() == true) {
                echo '<div class="nav-content" style="display: flex; justify-content: flex-end;">
                <a href="page.php?mod=keranjang" class="btn btn-danger" style="margin-right: 20px;">Keranjang</a>
                <a href="page.php?mod=checkout" class="btn btn-danger" style="margin-right: 20px;">Checkout</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#pantauPesananModal">Pantau Pesanan</button>
                </div>';
                } else {
                echo '<div class="nav-content" style="display: flex; justify-content: flex-end;">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#alertLoginModal" style="margin-right: 20px;">Keranjang</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#alertLoginModal" style="margin-right: 20px;">Checkout</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#alertLoginModal">Pantau Pesanan</button>
                </div>
                ';
                }
            ?>
        </div>
        <!-- carousel -->
        <?php include '_component/carouselMenu.php'; ?>
        <!-- menu -->
        <!-- makanan -->
        <div class="judul text-center">
            <h1 class="lobster-regular">Makanan</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4" style="padding-bottom: 40px">
            <?php 
    if (count($makanan) > 0) {
        foreach ($makanan as $row) {
            $id_menu = $row["id_menu"];
            ?>
            <div class="col">
                <div class="card h-100">
                    <img src="../uploads/menu/<?php echo $row["gambar"]?>" class="img-menu card-img-top" alt="..."
                        style="width: 100%; height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["nama"]?></h5>
                        <p class="card-text">harga: Rp<?php echo $row["harga"]?></p>
                        <a href="page.php?mod=detail-produk&id=<?php echo $id_menu; ?>"
                            class="btn btn-danger">Selengkapnya</a>
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
    if (count($minuman) > 0) {
        foreach ($minuman as $row) {
            $id_menu = $row["id_menu"];
            ?>
            <div class="col">
                <div class="card h-100">
                    <img src="pesan/assets/img/menu/<?php echo $row["gambar"]?>" class="img-menu card-img-top" alt="..."
                        style="width: 100%; height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["nama"]?></h5>
                        <p class="card-text">harga: Rp<?php echo $row["harga"]?></p>
                        <a href="page.php?mod=detail-produk&id=<?php echo $id_menu; ?>"
                            class="btn btn-danger">Selengkapnya</a>
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
    <!-- Modal Alert Login -->
        <div class="modal fade" id="alertLoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan Login</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Login atau Registrasi akun sebelum memesan makanan yawww!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="page.php?mod=login" class="btn btn-danger">Login/Register</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Pantau Pesanan -->
        <div class="modal fade" id="pantauPesananModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar pesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php 
                        $sqlKeranjang = "SELECT 
                k.id_keranjang,
                k.id_menu,
                k.user_id,
                k.jumlah,
                k.status,
                m.nama,
                m.harga,
                m.kategori,
                m.gambar
            FROM 
                keranjang k
            JOIN 
                menu m
            ON 
                k.id_menu = m.id_menu
            WHERE 
                k.user_id =" . $user_id . " AND status = 'dibayar'";
            $sqlBukti = "SELECT FROM transaksi WHERE user_id =". $user_id;
                        $dataPesanan = $conn->query($sqlKeranjang);
                        $number = 1;
                        $array_keranjang = [];
                        foreach($dataPesanan as $row):
                        $array_keranjang[] = $row['id_keranjang'];
                        $total_harga = $row['jumlah'] * $row['harga'];
                        echo "Pesanan ". $number;
                        echo "<li>" . $row['nama'] . "</li>";
                        echo "<li>" . $row['jumlah'] . "</li>";
                        echo "<li>Rp" . $total_harga . "</li>";
                        echo "<br>";
                        $number++;
                        endforeach;
                    ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end content -->
<?php include '_component/footer.php'; ?>