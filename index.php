<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
  exit;
}
require 'fungsi.php';
$result2 = mysqli_query($conn, "SELECT * FROM main WHERE nip = '".$_SESSION['nip']."'" );
$result3 = mysqli_query($conn, "SELECT * FROM school WHERE nip = '".$_SESSION['nip']."'");
$result4 = mysqli_query($conn, "SELECT * FROM nosk WHERE nip = '".$_SESSION['nip']."'");
$main = mysqli_fetch_assoc($result2);
$school = mysqli_fetch_assoc($result3);
$nosk = mysqli_fetch_assoc($result4);
$_SESSION["nama"] = $main["nama"];
$_SESSION["nip"] = $main["nip"];
$_SESSION["ttl"] = $main["ttl"];
$_SESSION["nosd"] = $school["nosd"];
$_SESSION["tglsd"] = $school["tglsd"];
$_SESSION["nosmp"] = $school["nosmp"];
$_SESSION["tglsmp"] = $school["tglsmp"];
$_SESSION["nosma"] = $school["nosma"];
$_SESSION["tglsma"] = $school["tglsma"];
$_SESSION["nos1"] = $school["nos1"];
$_SESSION["tgls1"] = $school["tgls1"];
$_SESSION["nosk1"] = $nosk["nosk1"];
$_SESSION["tglsk1"] = $nosk["tglsk1"];
$_SESSION["nosk2"] = $nosk["nosk2"];
$_SESSION["tglsk2"] = $nosk["tglsk2"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Peninjauan Masa Kerja</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-fw fa-user-secret"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PMK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-house-damage"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Form Isian
      </div>

      <li class="nav-item">
        <a class="nav-link" href="pendidikan.php">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Pendidikan</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user-ninja"></i>
          <span>Pengalaman Kerja</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="jabatan.php">Surat Keputusan</a>
            <a class="collapse-item" href="masakerja.php">Masa Kerja</a>
          </div>
        </div>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-gradient-info topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        

            <!-- Nav Item - Alerts -->
            

            <!-- Nav Item - Messages -->


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white medium"><?=$_SESSION["nama"]?></span>
                <img class="img-profile rounded-circle" src="img/depag.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">SELAMAT DATANG, <?=$_SESSION["nama"]?>...</h1>
          <h6>Berikut adalah data Anda. Silahkan isi bagian yang masih kosong pada menu "Form Isian".</h6>
          <div class="row">

            <div class="col-md-6 mb-4 mr-n2">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col">
                      <div class="text-md font-weight-bold text-primary text-uppercase mb-1">NIP</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$_SESSION["nip"]?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-sort-numeric-down fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col">
                      <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Tempat, Tanggal Lahir</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$_SESSION["ttl"]?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col">
                      <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Ijazah SD</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$_SESSION["nosd"]." | ". tgl_indo($_SESSION["tglsd"])?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col">
                      <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Ijazah SLTP</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$_SESSION["nosmp"]." | ". tgl_indo($_SESSION["tglsmp"])?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col">
                      <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Ijazah SLTA</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$_SESSION["nosma"]." | ". tgl_indo($_SESSION["tglsma"])?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col">
                      <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Ijazah S1</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$_SESSION["nos1"]." | ". tgl_indo($_SESSION["tgls1"])?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col">
                      <div class="text-md font-weight-bold text-primary text-uppercase mb-1">SK Pengangkatan Pertama</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$_SESSION["nosk1"]." | ". tgl_indo($_SESSION["tglsk1"])?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col">
                      <div class="text-md font-weight-bold text-primary text-uppercase mb-1">SK Pengangkatan Terakhir</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$_SESSION["nosk2"]." | ". tgl_indo($_SESSION["tglsk2"])?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /.container-fluid -->
        
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; AQS2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">So Klar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tindis "Logout" kalo sudah.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
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
