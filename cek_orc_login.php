<?php 
session_start();
include 'koneksi.php';

$USERNAME = $_POST['USERNAME'];
$PASSWORD = $_POST['PASSWORD'];
$sql = "SELECT * FROM USERS WHERE USERNAME='$USERNAME' AND PASSWORD='$PASSWORD'";
$result = oci_parse($conn, $sql);
oci_execute($result);
$row = oci_fetch_array($result);

	if ($row['ROLE']=='Admin') {
		$_SESSION['USERNAME'] = $USERNAME;
		$_SESSION['ROLE'] = "Admin";
		header("location:u_admin/index_admin.php");	
	}