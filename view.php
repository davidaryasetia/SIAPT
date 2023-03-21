<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
</head>
<body>
    <?php
    /** 
     * View Data Barang
     */

     include "includes/func.inc.php";
     $db_user = "PA0001";
     $db_pass = "726987";
     $con = koneksiDB($db_user, $db_pass);

    //  View Data Barang
    $nomor = 4;

    echo "Data Barang";
    $sql = "SELECT nama_barang, stok
            FROM barang 
            WHERE nomor=:v1
            ORDER BY nama_barang";

    $data = array(':v1' => $Nomor);
    $hasil = query_view($con, $sql, $data);

    oci_fetch_all($hasil, $row, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

    foreach ($rows as $hasil){
        echo "Nama Barang : " . $hasil['NAMA_BARANG'] . " - Stok : " . $hasil['STOK'] . "<br>";
    }
    ?>
</body>
</html>