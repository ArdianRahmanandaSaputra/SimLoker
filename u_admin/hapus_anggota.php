<?php 
include "../koneksi.php";
if (isset($_GET["ID"])) {
$ID=$_GET["ID"];
$sql = ociparse($conn, "DELETE FROM ANGGOTA WHERE ID = '".$ID."'");
$result = oci_execute($sql);

if (oci_num_rows($sql) > 0) {
	echo "
	<script>
	alert('Berhasil Dihapus');
	document.location.href='data_anggota.php'
	</script>
	";

}else{
	echo "
	<script>
	alert('Gagal Dihapus');
	document.location.href='data_anggota.php'
	</script>
	";
}

}
 ?>