<?php
    $tgl1 = date("d-m-Y", strtotime($_POST['tgl1']));
    $tgl2 = date("d-m-Y", strtotime($_POST['tgl2']));
?>
<!DOCTYPE html>
<html>

<head>
  <title>Cetak Pemeriksaan</title>
  <style>
    .content img {
      width: 70px;
      height: 70px;
      float: left;
      margin-left: 20px;
    }

    .content p {
      text-align: center;
      margin-left: 20px;
    }

    .content h2 {
      text-align: left;
      margin-left: 5px;
    }

    .content h4 {
      text-align: left;
      margin-left: 5px;
    }
  </style>
</head>

<body>
  <div class="content">
    <table border="0" width="1000">
      <tr>
        <td>
          <a href="data_pelamar.php"><img src="../img/lpk.jpg"></a>
          <p><span style="font-size:25px;">LPK Surya Citra Sentosa</span><br>
            <span style="font-size:15px;">Jl. Merdeka No.110 Mojokerto</span><br>
            <span style="font-size:12px;">Telp. (0321) 123123 / Fax. (0321) 851542</span>
          </p>
          <h2>Laporan Pendaftaran Periode <?php echo $tgl1;?> s.d. <?php echo $tgl2;?></h2>
          <hr>
        </td>
      </tr>
    </table>
  </div>
  <?php
  include "../koneksi.php";
  ?>
  <table colspan="11" border="1" width="1000">
    <tr>
      <th>No.</th>
      <th>ID Pendaftaran</th>
      <th>Nama Pelamar</th>
      <th>Nama Perusahaan</th>
      <th>Posisi</th>
    </tr>
    <?php
    $no = 1;
    $sql = ociparse($conn, "SELECT * FROM PENDAFTARAN WHERE TANGGAL_MELAMAR BETWEEN to_date('$tgl1','dd-mm-yyyy') AND to_date('$tgl2','dd-mm-yyyy')");
    ociexecute($sql);
    while ($data = oci_fetch_array($sql)) {
    ?>
      <tr>
        <th><?php echo $no++; ?></th>
        <td><?php echo $data['ID']; ?></td>
        <td><?php echo $data['NAMA']; ?></td>
        <td><?php echo $data['NAMA_PERUSAHAAN']; ?></td>
        <td><?php echo $data['POSISI']; ?></td>
      </tr>
    <?php
    }
    ?>
  </table>
  <script type="text/javascript">
    window.print();
  </script>
</body>

</html>