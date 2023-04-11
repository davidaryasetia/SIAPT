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
    $con = konekDb($db_user, $db_pass);

    $query='SELECT PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM|| " " ||JURUSAN.JURUSAN AS "Program Studi",
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
    WHERE STATUS.STATUS=\'Mahasiswa Luar Negeri\' AND 
          STATUS.STATUS NOT IN (\'Cuti\')
    GROUP BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM, JURUSAN.JURUSAN, PROGRAM_STUDI.GELAR
    ORDER BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM';


    $data= oci_parse($con, $query);
    $r = oci_execute($data);

    // Fetching Data
    print '<table border="1">';
    while($row = oci_fetch_array($data, OCI_RETURN_NULLS+OCI_ASSOC)){
        print '<tr>';
        foreach($row as $item){
            print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp'). '</td>';
        }
        print '</tr>';
    }
    print '</table>';
    ?>





</body>

</html>