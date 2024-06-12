<?php

$mod = isset($_GET['mod']) ? $_GET['mod'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

if($_GET['mod'] == "dashboard"){
    include"dashboard/dashboard.php";
}  elseif($_GET['mod'] == "user"){
    include "dashboard/user.php";
} elseif($_GET['mod'] == "data-user"){
    include "dashboard/data-user.php";
} 
elseif($_GET['mod'] == "tentang"){
    include "tentang/tentang.php";
} elseif($_GET['mod'] == "menu"){
    include "menu/menu.php";
} elseif($_GET['mod'] == "pesan"){
    include "pesan/pesan.php";
} elseif($_GET['mod'] == "konfirmasi-pesan"){
    include "pesan/konfirmasi-pesan.php";
} elseif($_GET['mod'] == "berita"){
    include "berita/berita.php";
} elseif($_GET['mod'] == "ulasan"){
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

switch ($mod) {
    case 'updateTentang':
        include 'tentang/edit/edit.php';
        break;
    case 'addTentang':
        include 'tentang/edit/tambah.php';
        break;
    case 'deleteTentang':
        include 'tentang/edit/hapus.php';
        break;

        case 'updateMenu':
            include 'Menu/edit/edit.php';
            break;
        case 'addMenu':
            include 'Menu/edit/tambah.php';
            break;
        case 'deleteMenu':
            include 'Menu/edit/hapus.php';
            break;
}



?>