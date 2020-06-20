<?php
session_start();

if (isset($_SESSION["login"])) {
  header("Location: index.php");
	exit;
}
require 'fungsi.php';
//cek submit
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE nip = '$username'");
  
  //cek username
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    // cek password
    if ($pwd == $row["pwd"]) {
      //set session
      $_SESSION["login"] = true;
      header("Location: index.php");

    } else {
      echo "<script>
        alert('Password Salah!');
      </script>";
      }
    
  } else {
    echo "<script>
        alert('NIP tidak terdaftar');
      </script>";  
    exit;
    }
  $error = true;

  $result2 = mysqli_query($conn, "SELECT * FROM main WHERE nip = '$username'" );
  // $result3 = mysqli_query($conn, "SELECT * FROM school WHERE nip = '$username'");
  // $result4 = mysqli_query($conn, "SELECT * FROM nosk WHERE nip = '$username'");
  $main = mysqli_fetch_assoc($result2);
  // $school = mysqli_fetch_assoc($result3);
  // $nosk = mysqli_fetch_assoc($result4);
  // $_SESSION["nama"] = $main["nama"];
  $_SESSION["nip"] = $main["nip"];
  // $_SESSION["ttl"] = $main["ttl"];
  // $_SESSION["nosd"] = $school["nosd"];
  // $_SESSION["nosmp"] = $school["nosmp"];
  // $_SESSION["nosma"] = $school["nosma"];
  // $_SESSION["nos1"] = $school["nos1"];
  // $_SESSION["nosk1"] = $nosk["nosk1"];
  // $_SESSION["tglsk1"] = $nosk["tglsk1"];
  // $_SESSION["nosk2"] = $nosk["nosk2"];
  // $_SESSION["tglsk2"] = $nosk["tglsk2"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PMK-Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background-image: url('img/rahmanto.jpg'); background-position: top;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 text-gray-900 my-4">Selamat Datang</h1>
                  </div>
                  <form class="user" action="" method="post">
                    <div class="form-group my-4">
                      <input type="text" class="form-control form-control-user text-center" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan NIP tanpa spasi">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user text-center" id="pwd" name="pwd" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                        <label class="custom-control-label" for="remember">Ingat saya..</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" name="login" type="submit">
                      Login
                    </button>
                    <hr>
                    <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <!--<hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
