<?php
session_start();
?>
<?php include '_component/header.php'; ?>
<?php include "../config/connect.php"; ?>
<div class="container background-content" style="margin-top: 100px">
    <?php
    if (isset($_GET['id'])) {
        $id_berita = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM berita WHERE id_berita = $id_berita";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
    <br>
    <br>
    <div class="judul">
        <h2 class="text-center">
            <?php echo $row["judul"] ?>
        </h2>
    </div>
    <br><br>
    <div class="gambar-berita">
        <img src="<?php echo $row["gambar"]; ?>" alt="">
    </div>
    </section>

    <section class="container isi-berita">
        <br><br>
        <br>
        <div class="konten">
            <?php
                // Memisahkan setiap paragraf dalam konten
                $paragraf = explode("\n", $row["konten"]);
                foreach ($paragraf as $p) {
                    echo "<p style='text-align: justify; text-justify: inter-word;'>$p</p>";
                }
                ?>
        </div>
        <?php
        } else {
            echo "Berita tidak ditemukan.";
        }
    } else {
        echo "Parameter id tidak ditemukan.";
    }
    ?>
    </section>
    <section class="container berita" style="padding-top: 20px">
        <div class="cover">
            <h2 class="text-center">Berita lainnya</h2>
            <button class="left" onclick="leftScroll()">
                <p><i class="arrow left"></i></p>
            </button>
            <div class="scroll-images row">
                <?php 
                    $sql = "SELECT * FROM berita";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id_berita_selengkapnya = $row["id_berita"];
                            if($id_berita_selengkapnya == $id_berita) continue;
                            ?>
                <div class="col card-berita">
                    <div class="card h-100">
                        <img src="<?php echo $row["gambar"]?>" class="card-img-top" style="" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["judul"]; ?></h5>
                        </div>
                        <div class="card-footer">
                            <a href="page.php?mod=berita-selengkapnya&id=<?php echo $id_berita_selengkapnya;?>"
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

<br>
<br>
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
<?php include '_component/footer.php'; ?>