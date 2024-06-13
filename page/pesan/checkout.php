<?php include '_component/header.php'; ?>
<?php include "../config/connect.php"; ?>
<?php
                if ($login->isUserLoggedIn() != true) {
                header("Location: page.php?mod=pesan");
                }
            ?>
<style>
/* Style for the file input */
.upload-form-container input[type="file"] {
    display: block;
    margin: 0 auto 20px auto;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
}

/* Style for the submit button */
.upload-form-container input[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

/* Hover effect for the submit button */
.upload-form-container input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
<div class="content">
    <div class="container background-content">
        <?php
        $sqlUser = "SELECT * FROM user WHERE user_id = ". $user_id;
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
            k.user_id =" . $user_id . " AND status = 'checkout'";
        $dataUser = $conn->query($sqlUser);
        $dataKeranjang = $conn->query($sqlKeranjang);
        foreach($dataUser as $dUser):
            $nama = $dUser['nama'];
            $no_hp = $dUser['no_hp'];
        ?>
        <div class="container background-content-white">
            <div class="judul-checkout text-center lobster-regular">
                <h1>Checkout</h1>
            </div>
            <div class="content-checkout">
                <div class="daftar-pesanan">
                    <h5>Daftar pesanan atas nama <?php echo $nama ?>, No HP <?php echo $no_hp ?>:</h5>
                    <?php endforeach ?>
                    <?php 
                    $number = 1;
                    $array_keranjang = [];
                    foreach($dataKeranjang as $row):
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
                <div class="row Qris" style="display:flex; justify-content:center;">
                    <div class="judul-qris text-center lobster-regular">
                        <h1>Qris</h1>
                    </div>
                    <img src="https://beasiswa.kamajaya.id/wp-content/uploads/2021/04/qris-yayasan-bakti-kamajaya-pf.jpg"
                        alt="..." style="max-width: 400px;">
                </div>
                <br><br>
                <div class="button-konfirmasi">
                    <div class="judul-konfirmasi text-center lobster-regular">
                        <h1>Konfirmasi Pembayaran</h1>
                    </div>
                    <div class="modal-konfirmasi" style="display:flex; justify-content:center;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#konfirmasiModal">
                            Konfirmasi
                        </button>
                    </div>
                    <!-- modal -->
                    <div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pembayaran</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body upload-form-container">
                                    <form action="page.php?mod=upload" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="file" name="file">
                                            <?php foreach($array_keranjang   as $id): ?>
                                            <input type="" name="ids[]" value="<?php echo $id; ?>">
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="pesan/script.js"></script>

<?php include '_component/footer.php'; ?>