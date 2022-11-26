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
    $sql = "SELECT * FROM ANGGOTA WHERE ID = '$ID'";
    $result = oci_parse($conn, $sql);
        oci_execute($result);
        $row = oci_fetch_array($result);
    ?>
<body>
            <div class="content">
                <table border="1" width="400" height="120">
                    <tr>
                        <td>
                            <a href="data_anggota.php"><img src="../img/lpk.jpg"></a>
                            <p><span style="font-size:25px;">LPK Surya Citra Sentosa</span><br>
                                <span style="font-size:15px;">Jl. Merdeka No.110 Mojokerto</span><br>
                                <span style="font-size:12px;">Telp. (0321) 123123 / Fax. (0321) 851542</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="250" height="120">
                            <h3 style="margin-left: 60;">KARTU ANGGOTA LPK SCS</h3>
                            <h3>ID Anggota : <?php echo $row['ID']; ?></h3>
                            <h3>Nama: <?php echo $row['NAMA']; ?></h3>
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