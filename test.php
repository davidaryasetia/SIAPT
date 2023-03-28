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
     * 
    */

    
     $db_user = "PA0001";
     $db_pass = "726987";
     function koneksiDB($db_user, $db_pass){
        $con=oci_connect($db_user, $db_pass, "db.project.mis.pens.ac.id");
        if(!$con){
            responseError('ERR-DB');
        }
        else {
            print "Connected To db";
        }
     }

     

    //  View Data Barang
    $nomor = 4;

    echo "<strong>View Data Barang</strong>";
    $sql = "SELECT NAMA_BARANG, STOK FROM BARANG WHERE NOMOR=1 ORDER BY NAMA_BARANG";
    $data = array('1 => $NOMOR');
    $hasil = query_view($con, $sql, $data);
    
    oci_fetch_all($hasil, $rows, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

    foreach ($row as $hasil){
        echo "Nama Barang :" . $hasil['NAMA_BARANG'] . " -Stok :" . $hasil['STOK'] . "<br>";
        echo "Nama Barang :" . $hasil['NAMA_BARANG'] . " -Stok :" . $hasil['STOK'] . "<br>";
        echo "Nama Barang :" . $hasil['NAMA_BARANG'] . " -Stok :" . $hasil['STOK'] . "<br>";
        echo "Nama Barang :" . $hasil['NAMA_BARANG'] . " -Stok :" . $hasil['STOK'] . "<br>";

    }

    ?>
</body>
</html>