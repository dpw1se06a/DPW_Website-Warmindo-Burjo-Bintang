<?php

if($_GET['mod'] == "home"){
    include"home/home.php";
} elseif($_GET['mod'] == "berita"){
    include "berita/index.php";
} elseif($_GET['mod'] == "fasilitas"){
    include "fasilitas/fasilitas.php";
} elseif($_GET['mod'] == "kontak"){
    include "kontak/index.php";
} elseif($_GET['mod'] == "menu"){
    include "menu/index.php";
} elseif($_GET['mod'] == "pesan"){
    include "pesan/index.php";
} elseif($_GET['mod'] == "tentang"){
    include "tentang/index.php";
} elseif($_GET['mod'] == "ulasan"){
    include "ulasan/index.php";
}

?>