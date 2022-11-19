<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Admin Paswa</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-danger">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6 bg-light">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">APLIKASI PASWA 2022</h1>
                                    </div>
                                    
                                    <?php
                                    include("connection.php"); 
                                    if (isset($_POST['submit'])) {
                                        $username = mysqli_real_escape_string($mysqli, $_POST['username']);                                        
                                        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
                                        

                                        $result = mysqli_query($mysqli, "SELECT * FROM tab_user 
                                        WHERE username='$username' AND password=md5('$password')")
                                                        or die("Instruksi tidak ditemukan");
                                        $row = mysqli_fetch_assoc($result);
                                        if (is_array($row) && !empty($row)) {
                                            $validuser = $row['username'];
                                            $_SESSION['valid'] = $validuser;
                                            $_SESSION['id'] = $row['id'];
                                        } else {
                                            echo "<script language=javascript>
                                        alert('Username atau Password salah');
                                        window.location='login.php';
                                    </script>";
                                        }

                                        if (isset($_SESSION['valid'])) {
                                            header('Location: dashboard.php');
                                        }
        
                                    }else{
                                    ?>
                                    
                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" value="Login" 
                                        class="btn btn-primary btn-user btn-block">
                                        <a href="index.php" class="btn btn-danger btn-user btn-block">Kembali</a>
                                        <hr>
                                    </form>
                                    <?php } ?>
                                    <div class="text-center">
                                        <a href="registrasi.php" class="btn btn-secondary btn-user btn-block">Registrasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>