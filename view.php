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
        print "connected To Oracle Success" ;
    }
   
    $query= ' SELECT PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM||" " ||JURUSAN.JURUSAN AS "Program Studi",
     SUM (CASE WHEN MAHASISWA.ANGKATAN=2018 THEN 1 ELSE 0 END) AS "TS-2",
     SUM (CASE WHEN MAHASISWA.ANGKATAN=2019 THEN 1 ELSE 0 END) AS "TS-1",
     SUM (CASE WHEN MAHASISWA.ANGKATAN=2020 THEN 1 ELSE 0 END) AS "TS"
    FROM PROGRAM_STUDI
    INNER JOIN PROGRAM ON PROGRAM_STUDI.PROGRAM=PROGRAM.NOMOR
    INNER JOIN JURUSAN ON PROGRAM_STUDI.JURUSAN=JURUSAN.NOMOR
    INNER JOIN DEPARTEMEN ON PROGRAM_STUDI.DEPARTEMEN=DEPARTEMEN.NOMOR
    INNER JOIN KELAS ON PROGRAM.NOMOR=KELAS.PROGRAM AND JURUSAN.NOMOR=KELAS.JURUSAN
    INNER JOIN MAHASISWA ON KELAS.NOMOR=MAHASISWA.KELAS
    INNER JOIN STATUS ON MAHASISWA.STATUS=STATUS.KODE
    WHERE STATUS.STATUS="Mahasiswa Luar Negeri" AND
     STATUS.STATUS NOT IN ("Cuti", "DO", "Mengundurkan Diri", "Meninggal")
    GROUP BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM, JURUSAN.JURUSAN, PROGRAM_STUDI.GELAR
    ORDER BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM';
    $stmt = oci_parse($con, $query);
    oci_execute($stmt);
    
    while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo $row['PROGRAM_STUDI.NOMOR'] . " - " . $row[' PROGRAM.PROGRAM||" " ||JURUSAN.JURUSAN AS "Program Studi'] . " - " . $row['SUM (CASE WHEN MAHASISWA.ANGKATAN=2018 THEN 1 ELSE 0 END) AS "TS-2",'] . "<br>";
    }
    

    
 


    ?>





</body>

</html>