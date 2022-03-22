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
            <a class="nav-link" href="data_siswa.php">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Data Siwa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tampil_petugas.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Data Petugas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tampil_transaksi.php">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Transaksi</span>
            </a>
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
      $qry_get_siswa= mysqli_query($conn, "SELECT * FROM siswa WHERE nisn= '".$_GET['nisn']."'");
      $dt_siswa =mysqli_fetch_array($qry_get_siswa); ?>
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ubah Siswa</h4>
                  <form action="proses_ubah_siswa.php" method="POST">
                  <p class="card-description">
                    Ubah Data Siswa di sini.
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label>NISN</label>
                      <input type="text" name="nisn" class="form-control" value="<?= $dt_siswa['nisn']; ?>">
                    </div>
                    <div class="form-group">
                      <label>NIS</label>
                      <input type="text" name="nis" class="form-control" value="<?= $dt_siswa['nis']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Nama Siswa</label>
                      <input type="text" name="nama" class="form-control" value="<?= $dt_siswa['nama']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                      <select name="id_kelas" class="form-control" value="<?= $dt_siswa['id_kelas']; ?>">
                          <?php include "koneksi.php";
                          $qry_kelas=mysqli_query($conn, "SELECT*FROM kelas");
                          while($dt_kelas=mysqli_fetch_assoc($qry_kelas)){
                            echo '<option value="'.$dt_kelas['id_kelas'].'">'.$dt_kelas['nama_kelas']. " | " .$dt_kelas['kompetensi_keahlian'].'</option>'; 
                          }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" value="<?= $dt_siswa['alamat']; ?>">
                    </div>
                    <div class="form-group">
                      <label>No. Telp</label>
                      <input type="text" name="no_telp" class="form-control"value="<?= $dt_siswa['no_telp']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="tampil_kelas.php" class="btn btn-light">Cancel</button>
                  </form>
                </form>
               </div>
             </div>
            </div>
            </div>
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
