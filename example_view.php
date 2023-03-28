<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
/*****************
example code akses table oracle
contoh table BARANG dengan kolom sbb :
NOMOR NUMBER(10)
NAMA_BARANG VARCHAR2(100)
STOK NUMBER(2)
//*****************/

include "includes/func.inc.php";

$db_user = "pa_example";
$db_pass = "123";
$con = konekDb($db_user, $db_pass);

echo "<strong>VIEW DATA BARANG</strong><br><br>";
$sql = "SELECT nama_barang, stok FROM barang ORDER BY nama_barang";
$hasil = query_view($con, $sql);

oci_fetch_all($hasil, $rows, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
    
foreach ($rows as $hasil) {
        echo "Nama Barang : " . $hasil['NAMA_BARANG'] ." - Stok : " . $hasil['STOK'] . "<br>";
    }
?>
</body>
</html>
