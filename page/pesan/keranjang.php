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
        <div class="list-group shadow-sm mb-4">
			<div class="list-group-item bg-light text-website b">
				<div class="row">
					<div class="col-sm-12 col-lg-1">
					</div>
					<div class="col-sm-12 col-lg-4">
						Produk
					</div>
					<div class="col-sm-12 col-lg-3">
						Harga Satuan
					</div>
					<div class="col-sm-12 col-lg-2">
						Kuantitas
					</div>
					<div class="col-sm-12 col-lg-2">
						Aksi
					</div>
				</div>
			</div>
			<div class="list-group-item">
				<div class="row my-4">
					<div class="col-sm-12 col-lg-1 mb-3">
						<input type="checkbox" name="pilih">
					</div>
					<div class="col-sm-12 col-lg-4 mb-3">
						<a href="" class="hvnb">
							<div class="media">
								<img src="pesan/assets/img/menu/<?php echo $row["gambar"] ?>" width="100" class="mr-3">
								<div class="media-body text-dark">
									<?php echo $row["nama"] ?>
								</div>
							</div>
						</a>
					</div>
					<div class="col-sm-12 col-lg-3 mb-3">
						<h4 class="text-website">Rp<?php echo $row["harga"] ?></h4>
					</div>
					<div class="col-sm-12 col-lg-2 mb-3">
					<div class="row">
						<div class="col-sm-12">
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
					</div>
					<div class="col-sm-12 col-lg-2 mb-3">
						<a href="#" class="b text-website">Hapus</a>
					</div>
				</div>
			</div>
		</div>
		<div class="card card-body shadow-sm">
			<div class="row">
				<div class="col-sm-12 col-lg-6">
					<input type="checkbox" name=""> Pilih Semua
				</div>
				<div class="col-sm-12 col-lg-3">
					<h5><span class="text-muted">Total Pesanan:</span> <span class="text-website">Rp3.000</span></h5>
				</div>
				<div class="col-sm-12 col-lg-3">
					<a href="" class="hvnb">
						<button class="btn btn-danger btn-block">Checkout</button>
					</a>
				</div>
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

<?php include '_component/footer.php'; ?>