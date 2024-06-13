<?php

if($_GET['mod'] == "home"){
    include"home/home.php";
} 
// berita
elseif($_GET['mod'] == "berita"){
    include "berita/index.php";
} 
// fasilitas
elseif($_GET['mod'] == "fasilitas"){
    include "fasilitas/fasilitas.php";
} 
// kontak
elseif($_GET['mod'] == "kontak"){
    include "kontak/index.php";
} 
// menu
elseif($_GET['mod'] == "menu"){
    include "menu/index.php";
} 
// pesan
elseif($_GET['mod'] == "pesan"){
    include "pesan/index.php";
} elseif($_GET['mod'] == "keranjang"){
    include "pesan/keranjang.php";
} elseif($_GET['mod'] == "detail-produk"){
    include "pesan/detail-produk.php";
} elseif($_GET['mod'] == "addToChart"){
    include "pesan/addToChart.php";
} elseif($_GET['mod'] == "editPesanan"){
    include "pesan/pesanan/edit.php";
} elseif($_GET['mod'] == "checkout"){
    include "pesan/checkout.php";
} elseif($_GET['mod'] == "upload"){
    include "pesan/pesanan/upload.php";
}
// tentang
elseif($_GET['mod'] == "tentang"){
    include "tentang/index.php";
}
// ulasan
elseif($_GET['mod'] == "ulasan"){
    include "ulasan/index.php";
} elseif($_GET['mod'] == "get_review"){
    include "ulasan/get_review.php";
}  
// login register
elseif($_GET['mod'] == "login"){
    include "log-reg/index.php";
} elseif($_GET['mod'] == "logout"){
    // include "log-reg/logout.php?logout";
    header("Location: log-reg/logout.php?logout");

}

?>