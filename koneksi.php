<?php

$conn = oci_connect("LOKER", "132005", "Localhost/XE");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities(
        $e['message'],
        ENT_QUOTES
    ), E_USER_ERROR);
} else {
    // echo "Koneksi ke oracle database sukses";
}
