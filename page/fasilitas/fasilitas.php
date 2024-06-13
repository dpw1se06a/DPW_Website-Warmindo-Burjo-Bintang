<?php
session_start();
?>
<?php include '_component/header.php'; ?>
<?php include "../config/connect.php"; ?>
<!-- content home -->
<div class="content">
    <div class="container background-content">
        <!-- about -->
        <div class="about container row">
            <div class="col-md-6 isi-about">
                <div class="judul-about">
                    <h1 class="lobster-regular judul-about-1">Fasilitas Kami</h1>
                </div>
                <div class="teks-about" style="padding-top: 20px; padding-bottom: 20px;">
                    <p class="poppins-regular teks-about-1" style="font-size: 20px; text-align: justify;">Pelayanan yang
                        ramah dan bersahabat merupakan fasilitas utama kami. Lokasi yang nyaman dan nongkrongable akan
                        memberikan kenyamanan makanmu sehari-hari. Senyum ramah kami akan menghiasi harimu. <br>
                        Mari Makan Bersama Warmindo Bintang ❤️⭐🌟</p>
                </div>
                <!-- <div class="button-about">
                        <a href="#"><button class="btn-selengkapnya poppins-regular">Fasilitas Andalan</button></a>
                    </div> -->
            </div>
            <div class="col-md-6 img-about">
                <div class="row">
                    <div class="item-about col-md-4">
                        <img src="https://placehold.co/500x300" alt="...">
                    </div>
                </div>
            </div>
            <div class="menu-dashboard container">
                <div class="menu-dashboard-content">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php
                        $sql    = "SELECT * FROM fasilitas";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col">
                            <div class="card h-100 card-custom">
                                <div class="card-img-container">
                                    <img src="<?php echo $row['gambar']; ?>" class="card-img-top img-fluid" alt="...">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                            echo "0 data";
                        }
                    ?>
                    </div>
                </div>
            </div>


            <!-- end about -->
            <!-- menu start -->
            <!-- <div class="menu-dashboard container">
                <div class="menu-dashboard-content">
                    <div class="row row-cols-md-2 row-cols-lg-3 g-4">
                        <?php
                        $sql    = "SELECT * FROM fasilitas";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo $row['gambar'];?>" class="card-img-top" alt="..."
                                    style="width: 250px; height: 250px;">
                                <div class="card-body">
                                    <p class="card-text" style="text-align: center; font: poppins-regular;">
                                        <?php echo $row['nama'];?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        } else {
                            echo "0 data";
                        }
                    ?>
                </div>
            </div>

        </div> -->
            <!-- menu end -->
        </div>
    </div>
    <!-- end content -->
    <?php include '_component/footer.php'; ?>