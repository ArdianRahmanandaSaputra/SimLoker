<?php
include "../koneksi.php";

session_start();

if ($_SESSION['ROLE'] == "") {
  header("location:index.php?pesan=gagal");
}
$view = $_SESSION['USERNAME'];
$view2 = $_SESSION['ROLE'];
$char = '0987654321ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$random = substr(str_shuffle($char), 0, 6);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ADMIN || LPK Surya Citra Sentosa</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <script src="../js/jquery-2.2.4.min.js"></script> <!-- Load library jquery -->
  <script src="../js/process.js"></script> <!-- Load file process.js -->

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand" href="#">
      <img src="../img/lpk.jpg" width="30" height="30" alt="">
      Administrator
    </a>


    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../u_admin/index_admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Data Master:</h6>
          <a class="dropdown-item" href="data_anggota.php">Data Anggota</a>
          <a class="dropdown-item" href="data_loker.php">Data Loker</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="data_pelamar.php">
          <i class="fas fa-comments"></i>
          <span>Pendaftaran</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="">LPK Surya Citra Sentosa</a>
          </li>
          <li class="breadcrumb-item active">Data Pelamar</li>
          <li class="breadcrumb-item active">Pendaftaran Kerja</li>
          <li class="breadcrumb-item active">Form Pendaftaran</li>
        </ol>
        <!-- Icon Cards-->
        <?php

        include_once '../koneksi.php';

        $sql = "SELECT * FROM LOKER WHERE ID_LOKER ='" . $_GET['ID_LOKER'] . "'";
        $result = oci_parse($conn, $sql);
        oci_execute($result);
        $row = oci_fetch_array($result);

        ?>
        <!-- Area Chart Example-->
        <div class="body">
          <form role="form" action="" method="POST">
            <input type="text" name="ID_A" value="<?php echo $random; ?>" hidden>
            <input type="text" name="ID_LOKER" value="<?php echo $row['ID_LOKER']; ?>" hidden>

          
            <h5 class="card-inside-title">ID Anggota</h5>
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="ID" id="ID" class="form-control" required autocomplete="off"/>
              </div>
            </div>
            <button type="button" class="btn btn-primary" id="btn-search"><i class="fas fa-search"> Cari Anggota</i></button>



            <h5 class="card-inside-title">Nama Perusahaan</h5>
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="NAMA_PERUSAHAAN" class="form-control" value="<?php echo $row['NAMA_PERUSAHAAN']; ?>" readonly />
              </div>
            </div>
            <h5 class="card-inside-title">Posisi</h5>
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="POSISI" value="<?php echo $row['POSISI']; ?>" class="form-control" readonly />
              </div>
            </div>
            <h5 class="card-inside-title">Nama Pelamar</h5>
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="NAMA" id="NAMA" class="form-control" readonly/>
              </div>
            </div>
            <h5 class="card-inside-title">Umur</h5>
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="USIA" class="form-control" autocomplete="off"/>
              </div>
            </div>
            <h5 class="card-inside-title">Pengalaman</h5>
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="PENGALAMAN" class="form-control" />
              </div>
            </div>
            <h5 class="card-inside-title">Pendidikan</h5>
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="PENDIDIKAN" id="PENDIDIKAN" class="form-control" readonly/>
              </div>
            </div>
            <h5 class="card-inside-title">No. Telp</h5>
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="TELP" id="TELP" class="form-control" readonly/>
              </div>
            </div>
            <h5 class="card-inside-title">Tanggal Melamar</h5>
            <div class="form-group">
              <div class="form-line">
                <input type="date" name="TANGGAL_MELAMAR" class="form-control" />
              </div>
            </div>
            <div class="form-group pull-right">
              <a href="index_admin.php" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
              <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-user"></i> Input</button>
            </div>
        </div>
        <!-- DataTables Example -->
        <?php
        include_once '../koneksi.php';
        if (isset($_POST['submit'])) {
          $ID_A = $_POST["ID_A"];
          $NAMA = $_POST["NAMA"];
          $PENGALAMAN = $_POST["PENGALAMAN"];
          $PENDIDIKAN = $_POST["PENDIDIKAN"];
          $TELP = $_POST["TELP"];
          $USIA = $_POST["USIA"];

          $ID_LOKER = $_POST["ID_LOKER"];
          $NAMA_PERUSAHAAN = $_POST["NAMA_PERUSAHAAN"];
          $POSISI = $_POST["POSISI"];
          $TANGGAL_MELAMAR = date("d-m-Y", strtotime($_POST['TANGGAL_MELAMAR']));

          $sql = ociparse($conn, "INSERT INTO PENDAFTARAN (ID, NAMA, USIA, PENGALAMAN, PENDIDIKAN, TELP, ID_LOKER, NAMA_PERUSAHAAN, POSISI, TANGGAL_MELAMAR) VALUES ('$ID_A', '$NAMA', $USIA, '$PENGALAMAN', '$PENDIDIKAN', '$TELP', '$ID_LOKER', '$NAMA_PERUSAHAAN', '$POSISI', to_date('$TANGGAL_MELAMAR','dd-mm-yyyy'))");
          $result = oci_execute($sql);

          if (oci_num_rows($sql) > 0) {
            echo "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href='cetak_bukti_pendaftaran.php?ID=$ID_A'
              </script>
          ";
          }
        }
        ?>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2019</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>

</body>

</html>