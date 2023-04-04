<?php

$db_user="PA0001";
$db_pass="726987";


    $con=oci_connect($db_user,$db_pass,"10.252.209.213/orcl.mis.pens.ac.id");
    if(!$con) {
        $m = oci_error();
        echo $m['message'], "\n";
        exit;
    }
    else {
        print "Succeess Connect to oracle";
    }
    return $con;

?>