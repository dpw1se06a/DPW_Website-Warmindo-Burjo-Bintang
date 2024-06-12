<?php include '_component/header.php'; ?>

<!--  -->

<!--  -->

<style>
    .judul-about-1: d
</style>

<!-- menu card -->
<div class="content ">
<div class="container menu-wrapper mt-30 text-center ">
    <br>
    <div class="judul-menu ">
      <h1 class="lobster-regular judul-about-1 ">Menu</h1>
    </div>
    <div class="row">
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT * FROM cards";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-3 mb-4">
                    <div class="card" id="menu">
                        <img src="<?php echo $row["image"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["title"] ?></h5>
                            <p class="card-text"><?php echo $row["description"] ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>0 data</p>";
        }
        mysqli_close($conn);
        ?>
    </div>
  </div>
</div>

    <!-- end menu card -->
   
    <!-- end content -->
    <?php include '_component/footer.php'; ?>

