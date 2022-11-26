<?php
include "koneksi.php"; // Load file koneksi.php

$ID = $_POST['ID']; // Ambil data NIS yang dikirim lewat AJAX

// $query = "SELECT * FROM ANGGOTA WHERE ID = '$ID'";
// $result = oci_parse($conn, $query);
// oci_execute($result);
// $data = oci_fetch_array($result); // ambil data siswa tersebut
// 	$callback = array(
// 		'status' => 'success', // Set array status dengan success
// 		'NAMA' => $data['NAMA'], // Set array nama dengan isi kolom nama pada tabel siswa
// 		'PENDIDIKAN' => $data['PENDIDIKAN'], // Set array nama dengan isi kolom nama pada tabel siswa
// 		'TELP' => $data['TELP'], // Set array nama dengan isi kolom nama pada tabel siswa
// 	);


$query = "SELECT * FROM ANGGOTA WHERE ID = '$ID'";
$result = oci_parse($conn, $query);
$a= oci_execute($result);
$row = oci_num_rows($result);
	if($data = oci_fetch_array($result)){ // Jika data lebih dari 0
		// $data = oci_fetch_array($result); // ambil data siswa tersebut
		$callback = array(
		'status' => 'success', // Set array status dengan success
		'NAMA' => $data['NAMA'], // Set array nama dengan isi kolom nama pada tabel siswa
		'PENDIDIKAN' => $data['PENDIDIKAN'], // Set array nama dengan isi kolom nama pada tabel siswa
		'TELP' => $data['TELP'], // Set array nama dengan isi kolom nama pada tabel siswa
	);
	}else{
		$callback = array('status' => 'failed'); // set array status dengan failed
	}

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>
