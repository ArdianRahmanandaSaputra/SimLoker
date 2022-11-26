<html>

<head>
    <title>Cetak</title>
    <style>
        .content img {
            width: 60px;
            height: 60px;
            float: left;
            margin-left: 15px;
            margin-top: 5px;
        }

        .content p {
            text-align: center;
            margin-left: 20px
        }

        td img {
            width: 50px;
            height: 50px;
        }

        .content h3 {
            text-align: left;
            margin-left: 5px;
        }

        .content h2 {
            text-align: left;
            margin-left: 5px;
        }
    </style>
</head>
<?php
    include "../koneksi.php";
    $ID = $_GET["ID"];
    
    $sql = "SELECT * FROM PENDAFTARAN WHERE ID = '$ID'";
    $result = oci_parse($conn, $sql);
        oci_execute($result);
        $row = oci_fetch_array($result);
    ?>
<body>
            <div class="content">
                <table border="1" width="600" height="400">
                    <tr>
                        <td>
                            <a href="data_pelamar.php"><img src="../img/lpk.jpg"></a>
                            <p><span style="font-size:25px;">LPK Surya Citra Sentosa</span><br>
                                <span style="font-size:15px;">Jl. Merdeka No.110 Mojokerto</span><br>
                                <span style="font-size:12px;">Telp. (0321) 123123 / Fax. (0321) 851542</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="1000" height="120">
                            <h3 style="margin-left:200;">BUKTI PENDAFTARAN</h3>
                            <h3>ID Pendaftaran : <?php echo $row['ID']; ?></h3>
                            <h3>Nama Pendaftar: <?php echo $row['NAMA']; ?></h3>
                            <h3>Nama Perusahaan: <?php echo $row['NAMA_PERUSAHAAN']; ?></h3>
                            <h3>Posisi: <?php echo $row['POSISI']; ?></h3>
                            <h3>Tgl Melamar: <?php echo $row['TANGGAL_MELAMAR']; ?></h3>
                            <h5 style="color: red;">*Kartu Jangan Sampai Hilang</h5>
                        </td>
                    </tr>
                </table>
            </div>
    <?php
    ?>

    <script>
        window.print();
    </script>
</body>

</html>

</html>