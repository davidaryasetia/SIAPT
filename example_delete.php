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

//*****Delete Data Barang*******
$Nomor = 4; // nomor barang yang diupdate
//**************
echo "<strong>DELETE DATA BARANG</strong><br><br>";
echo "Nomor : $Nomor<br><br>";

$sql = "DELETE barang WHERE nomor=$Nomor";
$hasil = query_delete($con, $sql);

echo "Status Transaksi : $hasil";
?>
</body>
</html>
