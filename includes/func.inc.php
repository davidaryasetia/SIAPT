<?php 
/**
 * Fungsi Koneksi ke db
 * @param string $db_user username -> login db
 * @param string $db_pass password -> login db
 * @return oci_resource object host / koneksi -> db
 * 
 */

 function koneksiDB($db_user, $db_pass){
	$con=oci_connect($db_user, $db_pass, "db.project.mis.pens.ac.id");
	if(!$con){
		responseError('ERR-DB');
	}
	return $con;
 }

 /**
  * Eksekusi quert db
  * @param oci_resource $con variable koneksi oci
  * @param string $sql quert yang dijalankan
  * @param oci_resource resource oci
  */
  
  //Fungsi view data
  function query_view($con, $sql, $data){
	$parse = oci_parse($con, $sql);
	foreach ($data as $key => $val) {
		oci_bind_by_name($parse, $key, $data[$key]);
	}
	oci_execute($parse);
	return $parse;
  }
?>