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
    if ($action == "tambah") {
        include "ulasan/tambah.php";
    } elseif ($action == "edit") {
        include "ulasan/edit.php";
    } elseif ($action == "delete") {
        include "ulasan/hapus.php";
    } elseif ($action == "data") {
        include "ulasan/datatabel.php";
    }
} elseif($_GET['mod'] == "fasilitas"){
    include "fasilitas/fasilitas.php";
    if ($action == "tambah") {
        include "fasilitas/tambah.php";
    } elseif ($action == "edit") {
        include "fasilitas/edit.php";
    } elseif ($action == "delete") {
        include "fasilitas/hapus.php";
    } elseif ($action == "data") {
        include "fasilitas/datatabel.php";
    }
} elseif($_GET['mod'] == "kontak"){
    include "kontak/kontak.php";
}

?>