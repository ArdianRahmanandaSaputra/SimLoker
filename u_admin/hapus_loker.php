<?php 
include "../koneksi.php";
if (isset($_GET["ID_LOKER"])) {
$ID_LOKER=$_GET["ID_LOKER"];
$sql = ociparse($conn, "DELETE FROM LOKER WHERE ID_LOKER = '".$ID_LOKER	."'");
$result = oci_execute($sql);

if (oci_num_rows($sql) > 0) {
	echo "
	<script>
	alert('Berhasil Dihapus');
	document.location.href='data_loker.php'
	</script>
	";

}else{
	echo "
	<script>
	alert('Gagal Dihapus');
	document.location.href='data_loker.php'
	</script>
	";
}

}
 ?>