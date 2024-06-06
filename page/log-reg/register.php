<?php include '_component/header_1.php'; ?>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="log-reg/style.css">
<?php include '_component/header_2.php'; ?>
<!-- content home -->
<div class="content">
    <div class="container background-content" style="width: 50%">
        <!-- menu -->
        <!-- makanan -->
        <div class="judul text-center">
            <h1 class="lobster-regular" style="font-size: 60px">Register</h1>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $no_hp = $_POST['no_hp'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password) {
                echo "<div class='alert alert-danger'>Password dan konfirmasi password tidak cocok.</div>";
            } else {
                // Memindahkan ke halaman proses jika password cocok
                header("Location: log-reg/proses-register.php?nama=$nama&email=$email&no_hp=$no_hp&password=$password");
                exit();
            }
        }
        ?>
        <div class="register">
            <form action="page.php?mod=register" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No Handphone</label>
                <input type="text" class="form-control" name="no_hp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <div class="mb-5">
                <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
        </div>

    </div>
</div>

<!-- end content -->
<?php include '_component/footer.php'; ?>