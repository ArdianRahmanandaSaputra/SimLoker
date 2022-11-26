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
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <script src="js/jquery-3.1.0.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">


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
        </ol>

        <a href='pendaftaran_kerja.php' class="btn btn-primary page-scroll"><i class="fas fa-plus"></i> Tambah Data</a>
        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#cetakModal1"><i class="far fa-file-pdf"> Cetak PDF</i></a>
        <a class="btn btn-success" style="margin-left: 2px;" href="#" data-toggle="modal" data-target="#cetakModal"><i class="far fa-file-excel"> Cetak Excel</i></a>
        <br><br>

        <!-- Icon Cards-->
        <div class="table-responsive">
          <table id="tabel-data" class="table table-bordered table-striped table-hover js-basic-example dataTabl">
            <thead>
              <tr>
                <th>Pelamar</th>
                <th>Posisi</th>
                <th>Nama Perusahaan</th>
                <th>Tgl. Melamar</th>  
              </tr>
            </thead>
            <tbody>
              <?php
              include "../koneksi.php";
              $sql = ociparse($conn, "SELECT * FROM PENDAFTARAN ORDER BY TANGGAL_MELAMAR");
              ociexecute($sql);
              while ($row = oci_fetch_array($sql)) {
              ?>
                <tr>
                  <td><?php echo $row["NAMA"]; ?></td>
                  <td><?php echo $row["POSISI"]; ?></td>
                  <td><?php echo $row["NAMA_PERUSAHAAN"]; ?></td>
                  <td><?php echo $row["TANGGAL_MELAMAR"]; ?></td>
                </tr>

              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="body">
         
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
     <!-- Cetak Modal-->
  <div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p>Pilih Tanggal yang akan di export</p>
          <form action="cetak_excel.php" method="POST">
          <div class="row">
            <div class="col-md-6">
              <label>Dari</label>
              <input type="date" class="form-control" name="tgl1">
            </div>
            <div class="col-md-6">
              <label>Sampai</label>
              <input type="date" class="form-control" name="tgl2">
            </div>
            <button type="submit" class="btn btn-primary" name="tampilkan" style="float: bottom; height: 38px; margin-top: 32px; margin-left: 10px;"> Cetak</button>
          </div>
          </form></div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

    <!-- Cetak Modal-->
  <div class="modal fade" id="cetakModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p>Pilih Tanggal yang akan di export</p>
          <form action="cetak_pdf.php" method="POST">
          <div class="row">
            <div class="col-md-6">
              <label>Dari</label>
              <input type="date" class="form-control" name="tgl1">
            </div>
            <div class="col-md-6">
              <label>Sampai</label>
              <input type="date" class="form-control" name="tgl2">
            </div>
            <button type="submit" class="btn btn-primary" name="tampilkan" style="float: bottom; height: 38px; margin-top: 32px; margin-left: 10px;"> Cetak</button>
          </div>
          </form></div>
        <div class="modal-footer">
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
    <script src="js/script.js"></script>

</body>

</html>

<script>
  $(document).ready(function() {
    $('#tabel-data').DataTable();
  });
</script>