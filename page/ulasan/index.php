<?php include '_component/header.php'; ?>
<link rel="stylesheet" href=".../style.css">
<link rel="stylesheet" href="ulasan/style.css">

<!-- Navbar -->
<div class="logo-navbar">
    <a href="../">
        <img src="../assets/logo/logo.png" alt="Warmindo Burjo Bintang">
    </a>
</div>
<nav class="navbar navbar-expand-lg red-nav poppins-semibold">
    <div class="container-fluid" style="justify-content: flex-end;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation" style="background-color: #fff;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-end margin-all" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <!-- Navbar Items Here -->
            </ul>
        </div>
    </div>
</nav>
<!-- navbar start -->

<div class="container">
    <h2 class="text-center">Berikan Ulasan</h2>
    <p class="text-center">Sampaikan kritik, saran, pertanyaan, bagi cerita / pengalaman Anda dengan Burjo Bintang. Masukan Anda sangat berarti untuk meningkatkan pelayanan kami.</p>

    <form id="reviewForm" action="submit_review.php" method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Nomor Telepon:</label>
            <input type="text" class="form-control" id="telepon" name="telepon" required>
        </div>
        <div class="mb-3">
            <label for="tentang" class="form-label">Tentang:</label>
            <select class="form-select" id="tentang" name="tentang" required>
                <option value="Pelayanan">Pelayanan</option>
                <option value="Makanan">Makanan</option>
                <option value="Fasilitas">Fasilitas</option>
                <option value="Harga">Harga</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan:</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    <div id="reviews">
        <!-- Ulasan akan dimuat di sini oleh JavaScript -->
    </div>
</div>

<?php include '_component/footer.php'; ?>
