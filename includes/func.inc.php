<?php
/**
 * fungsi untuk mendapat koneksi ke db
 * @param  string $db_user username untuk login db
 * @param  string $db_pass password untuk login db
 * @return oci_resource          objek koneksi db
 */
function konekDb($db_user, $db_pass) {
    $con=oci_connect($db_user,$db_pass,"10.252.209.213/orcl.mis.pens.ac.id");
    if(!$con) {
        responseError('ERR-DB');
    }
    return $con;
}


/**
 * eksekusi query db
 * untuk memudahkan penulisan saja 
 * karena oracle membutuhkan 
 * beberapa langkah
 * 
 * @param  oci_resource $con variable koneksi oci
 * @param  string $sql query yang di jalankan
 * @return oci_resource      resouce oci
 */
function query_view($con, $sql, $data)
{
    $parse = oci_parse($con, $sql);
	foreach ($data as $key => $val) {    
    	oci_bind_by_name($parse, $key, $data[$key]);
	}
    oci_execute($parse);
    return $parse;
}

function query_insert($con, $sql, $data)
{
    $parse = oci_parse($con, $sql);
	foreach ($data as $key => $val) {    
    	oci_bind_by_name($parse, $key, $data[$key]);
	}
    oci_execute($parse);
	if (oci_num_rows($parse)>0)
    	return "Success Insert";
	else
		return "Failed Insert";	
}

function query_update($con, $sql, $data)
{
    $parse = oci_parse($con, $sql);
	foreach ($data as $key => $val) {    
    	oci_bind_by_name($parse, $key, $data[$key]);
	}
    oci_execute($parse);
	if (oci_num_rows($parse)>0)
    	return "Success Update";
	else
		return "Failed Update";	
}

function query_delete($con, $sql, $data)
{
    $parse = oci_parse($con, $sql);
	foreach ($data as $key => $val) {    
    	oci_bind_by_name($parse, $key, $data[$key]);
	}
    oci_execute($parse);
	if (oci_num_rows($parse)>0)
    	return "Success Delete";
	else
		return "Failed Delete";	
}
?>