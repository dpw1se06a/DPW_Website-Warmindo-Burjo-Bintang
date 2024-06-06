<?php
session_start();
?>
<?php include '_component/header.php'; ?>
<?php include "../config/connect.php"; ?>
<!-- content home -->
<div class="content">
    <div class="container background-content">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="padding-top: 20px;">
            <div class="carousel-inner">
                <?php 
                    $sql = "SELECT * FROM slider";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id_carousel = $row["id_slider"];
                            ?>
                <div class="carousel-item <?php if($id_carousel == 1) {
                    echo " active";
                } ?>">
                    <img src="berita/assets/img/carousel/<?php echo $row["gambar"]; ?>" class="d-block w-100" alt="...">
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
        <section class="container berita" style="padding-top: 20px">
            <div class="cover">
                <h2 class="text-center">Berita</h2>
                <button class="left" onclick="leftScroll()">
                    <p><i class="arrow left"></i></p>
                </button>
                <div class="scroll-images row">
                    <?php 
                    $sql = "SELECT * FROM berita";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id_berita = $row["id_berita"];
                            ?>
                    <div class="col card-berita">
                        <div class="card h-100">
                            <img src="<?php echo $row["gambar"]?>" class="card-img-top" style="" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["judul"]; ?></h5>
                            </div>
                            <div class="card-footer">
                                <a href="page.php?mod=berita-selengkapnya&id=<?php echo $id_berita;?>"
                                    class="btn btn-primary">Selengkapnya</a>
                                <br>
                                <small class="text-body-secondary"><?php echo $row["tanggal"];?></small>
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
                <button class="right" onclick="rightScroll()">
                    <p><i class="arrow right"></i></p>
                </button>
        </section>
        <script src="berita/horizontal-scroller.js"></script>
    </div>

    <style>
        .cover {
    position: relative;
    padding: 0px 30px;
    margin-top: 100px;
}

.left {
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
}

.right {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}

.scroll-images {
    position: relative;
    width: 100%;
    padding: 40px 0px;
    height: auto;
    display: flex;
    flex-wrap: nowrap;
    overflow-x: hidden;
    overflow-y: hidden;
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
}

.card-berita {
    display: flex;
    justify-content: center;
    align-items: center;
    min-width: 250px;
    overflow: hidden;
}

.child img,
.child>svg {
    position: absolute;
    margin-top: -195px;
    width: 80px;
    height: 80px;
    object-fit: cover;
    object-position: center;
    border-radius: 50%;
    background: #03A9F4;
}

.scroll-images::-webkit-scrollbar {
    width: 5px;
    height: 8px;
    background-color: #aaa;
}

.scroll-images::-webkit-scrollbar-thumb {
    background-color: black;
}

button {
    background-color: transparent;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 25px;
}

.arrow {
    border: solid black;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: 3px;
}

.right {
    transform: rotate(-22.5deg);
    -webkit-transform: rotate(-22.5deg);
    -moz-transform: rotate(-22.5deg);
    -ms-transform: rotate(-22.5deg);
    -o-transform: rotate(-22.5deg);
}

.left {
    transform: rotate(-115.5deg);
    -webkit-transform: rotate(-115.5deg);
    -moz-transform: rotate(-115.5deg);
    -ms-transform: rotate(-115.5deg);
    -o-transform: rotate(-115.5deg);
}

/* BERITA SELENGKAPNYA */

.gambar-berita img {
    width: 100%;
}
    </style>

    <!-- end content -->
    <?php include '_component/footer.php'; ?>