<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>

    <?php
    // Username & Password
    $db_user = "PA0001";
    $db_pass = "726987";

    // Connect to oracle
    $konek = oci_connect($db_user,$db_pass, "10.252.209.213/db.project.mis.pens.ac.id");
    if (!$conn) {
       $m = oci_error();
       echo $m['message'], "\n";
       echo "Koneksi Error";
       exit;
    }
    else {
       print "Koneksi DB Sukses";
    }
    // Close Oracle connection
    oci_close($conn);
    ?>
</body>

</html>