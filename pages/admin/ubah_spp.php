<?php
session_start();
if($_SESSION['status_login']!=true){
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
<?php 
include "navbar.php"; 
?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index_admin.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#siswa" aria-expanded="false" aria-controls="siswa">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Data Siswa</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="siswa">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="tampil_siswa.php">Siswa</a></li>
                <li class="nav-item"> <a class="nav-link" href="tampil_kelas.php">Kelas</a></li>
                <li class="nav-item"> <a class="nav-link" href="tampil_spp.php">SPP</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tampil_petugas.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Data Petugas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="transaksi">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Transaksi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="list_kelas.php">Pembayaran</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">History</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="login.php"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="logout.php"> Logout </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
     
      <!-- partial -->
      <?php
      include "koneksi.php";
      $qry_get_spp= mysqli_query($conn, "SELECT * FROM spp WHERE id_spp= '".$_GET['id_spp']."'");
      $dt_spp =mysqli_fetch_array($qry_get_spp); ?>
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ubah SPP</h4>
                  <form action="proses_ubah_spp.php" method="POST">
                  <p class="card-description">
                    Ubah Data SPP di sini.
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" name="tahun" class="form-control" value="<?= $dt_spp['tahun']; ?>" disabled="disabled">
                        </div>
                        <div class="form-group">
                        <label>Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" value="<?= $dt_spp['angkatan']; ?>" disabled="disabled">
                        </div>
                        <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="nominal" class="form-control" value="<?= $dt_spp['nominal']; ?>">
                        </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="tampil_spp.php" class="btn btn-light">Cancel</button>
                  </form>
                </form>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
