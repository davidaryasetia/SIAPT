<?php
/**
 * fungsi untuk mendapat koneksi ke db
 * @param  string $db_user username untuk login db
 * @param  string $db_pass password untuk login db
 * @return oci_resource          objek koneksi db
 */
$db_user="PA0001";
$db_pass="726987";

function konekDb($db_user, $db_pass) {
    $con=oci_connect($db_user,$db_pass,"10.252.209.213/orcl.mis.pens.ac.id");
    if(!$con) {
        responseError('ERR-DB');
    }
	return $con;
	oci_close($con);
}
?>