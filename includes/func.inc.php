<?php
/**
 * fungsi untuk mendapat koneksi ke db
 * @param  string $db_user username untuk login db
 * @param  string $db_pass password untuk login db
 * @return oci_resource          objek koneksi db
 */
$db_user = "PA0001";
$db_pass = "726987";

function konekDb($db_user, $db_pass) {
    $con = mysqli_connect("localhost", $db_user, $db_pass, "nama_database");
    // Ganti "localhost" dengan host MySQL Anda dan "nama_database" dengan nama database yang digunakan.

    if (!$con) {
        responseError('ERR-DB');
    } else{
        echo "nromal";
    }
    return $con;
    // Jangan letakkan oci_close($con); di sini, karena kode di bawah return tidak akan dieksekusi.
}

?>