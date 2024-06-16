<?php
session_start();
include '../config/connect.php';
$user_id = $_SESSION['user_id'];
// mendapatkan data role untuk user yang sedang login
$query = "SELECT * FROM user JOIN role ON user.role_id = role.role_id WHERE user_id = '$user_id'";
$datas = $conn->query($query);
$data = $datas->fetch_assoc();
// jika nama role bukan admin atau bukan penjual maka di alihkan ke ../index.php
if ($data['name'] != 'admin' && $data['name'] != 'penjual') {
header("Location: ../index.php");
exit();
}

$mod = isset($_GET['mod']) ? $_GET['mod'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

if($_GET['mod'] == "dashboard"){
    include"dashboard/dashboard.php";
}  elseif($_GET['mod'] == "user"){
    include "dashboard/user.php";
} elseif($_GET['mod'] == "data-user"){
    include "dashboard/data-user.php";
} elseif($_GET['mod'] == "carousel"){
    include "dashboard/carousel.php";
} elseif($_GET['mod'] == "carousel-menu"){
    include "dashboard/carousel-menu.php";
} elseif($_GET['mod'] == "addCarouselUtama"){
    include "dashboard/proses/carouselUtama/addCarouselUtama.php";
} elseif($_GET['mod'] == "updateCarouselUtama"){
    include "dashboard/proses/carouselUtama/updateCarouselUtama.php";
} elseif($_GET['mod'] == "deleteCarouselUtama"){
    include "dashboard/proses/carouselUtama/deleteCarouselUtama.php";
} elseif($_GET['mod'] == "addCarouselMenu"){
    include "dashboard/proses/carouselMenu/addCarouselUtama.php";
} elseif($_GET['mod'] == "updateCarouselMenu"){
    include "dashboard/proses/carouselMenu/updateCarouselUtama.php";
} elseif($_GET['mod'] == "deleteCarouselMenu"){
    include "dashboard/proses/carouselMenu/deleteCarouselUtama.php";
} elseif($_GET['mod'] == "tentangKami"){
    include "tentang/tentangKami.php";
} elseif($_GET['mod'] == "editTeksTentangKami"){
    include "tentang/edit/tentangKami/edit.php";
} elseif($_GET['mod'] == "editImgTentangKami"){
    include "tentang/edit/tentangKami/editImg.php";
} elseif($_GET['mod'] == "visiKami"){
    include "tentang/visiKami.php";
} elseif($_GET['mod'] == "produkKami"){
    include "tentang/produkKami.php";
} elseif($_GET['mod'] == "menu"){
    include "menu/menu.php";
}  elseif($_GET['mod'] == "addMenu"){
    include "menu/edit/tambah.php";
}  elseif($_GET['mod'] == "updateMenu"){
    include "menu/edit/edit.php";
}  elseif($_GET['mod'] == "deleteMenu"){
    include "menu/edit/hapus.php";
} elseif($_GET['mod'] == "berita"){
    include "berita/berita.php";
} elseif($_GET['mod'] == "addBerita"){
    include "berita/edit/tambah.php";
} elseif($_GET['mod'] == "updateBerita"){
    include "berita/edit/edit.php";
} elseif($_GET['mod'] == "deleteBerita"){
    include "berita/edit/hapus.php";
} elseif($_GET['mod'] == "pesan"){
    include "pesan/pesan.php";
} elseif($_GET['mod'] == "updatePesanan"){
    include "pesan/proses/updatePesanan.php";
} elseif($_GET['mod'] == "updateSelesai"){
    include "pesan/proses/updateSelesai.php";
} elseif($_GET['mod'] == "konfirmasi-pesan"){
    include "pesan/konfirmasi-pesan.php";
} elseif($_GET['mod'] == "keranjang"){
    include "pesan/keranjang.php";
} elseif($_GET['mod'] == "logout"){
    include "logout/logout.php";
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
?>