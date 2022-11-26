<?php
include '../koneksi.php';
$tgl1 = date("d-m-Y", strtotime($_POST['tgl1']));
$tgl2 = date("d-m-Y", strtotime($_POST['tgl2']));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px, solid #3c3c3c;
            padding: 3px 8px
        }
    </style>
    <?php
    header("Content-type:application/vnd-ms-excel");
    header("Content-Disposition:attachment; filename=Laporan Pendaftaran.xls");
    ?>
    <h2>Laporan Pendaftaran</h2>
    <h4>Periode <?php echo $tgl1;?> s.d. <?php echo $tgl2;?></h4>
    <hr>
    <table border="1">
        <thead>
            <tr>
            <th>No.</th>
            <th>ID Pendaftaran</th>
            <th>Nama Pelamar</th>
            <th>Nama Perusahaan</th>
            <th>Posisi</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>

</body>

</html>