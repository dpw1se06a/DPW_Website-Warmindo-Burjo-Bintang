<?php

if($_GET['mod'] == "dashboard"){
    include"dashboard/dashboard.php";
} elseif($_GET['mod'] == "tentang"){
    include "tentang/tentang.php";
} elseif($_GET['mod'] == "menu"){
    include "menu/menu.php";
} elseif($_GET['mod'] == "pesan"){
    include "pesan/pesan.php";
} elseif($_GET['mod'] == "berita"){
    include "berita/berita.php";
} elseif($_GET['mod'] == "ulasan"){
    include "ulasan/ulasan.php";
} elseif($_GET['mod'] == "fasilitas"){
    include "fasilitas/fasilitas.php";
} elseif($_GET['mod'] == "kontak"){
    include "kontak/kontak.php";
}

?>