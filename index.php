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
    include "includes/func.inc.php";
    
    $db_user = "PA0001";
    $db_pass = "726987";
    
    $con = konekDb($db_user, $db_pass);
    if (!$con){
        $m = oci_error();
        echo $m['message'], "\n";
        exit;
    }
    else{
        print "connected To Oracle Success";
    }
    ?>





</body>

</html>