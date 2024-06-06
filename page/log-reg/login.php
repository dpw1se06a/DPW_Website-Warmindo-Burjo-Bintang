<?php include '_component/header_1.php'; ?>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="log-reg/style.css">
<?php include '_component/header_2.php'; ?>
<?php include "../config/connect.php"; ?>
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
            $email = $_POST['email'];
            $password = $_POST['password'];
            header("Location: log-reg/proses-login.php?email=$email&password=$password");
            exit();
        }
        ?>
        <div class="register">
            <form action="page.php?mod=login" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>

    </div>
</div>

<!-- end content -->
<?php include '_component/footer.php'; ?>