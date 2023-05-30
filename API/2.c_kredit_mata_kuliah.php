<?php
// Include Koneksi
include "../includes/func.inc.php";
$con=konekDb($db_user, $db_pass);

// Set headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Check jika request method !== GET maka not allowed
if($_SERVER['REQUEST_METHOD'] !== 'GET'){
    http_response_code(405);
    exit();
}

/*
Tabel 2.c Kredit Mata Kuliah
Menggunakan Skema EIS_MATAKULIAH.TAHUN=2017, EIS_MATAKULIAH.KELAS IN(1,2,3,4), 
                  EIS_MATAKULIAH.SEMESTER IN(1,2)
*/
$query='SELECT ROW_NUMBER() OVER (ORDER BY PROGRAM.PROGRAM) AS "No.", 
PROGRAM.PROGRAM||\' \'||JURUSAN.JURUSAN AS "Program Studi", 
SUM(CASE WHEN MATAKULIAH_JENIS.NOMOR IN(1,3) THEN EIS_MATAKULIAH.SKS END) AS "Teori", 
SUM(CASE WHEN MATAKULIAH_JENIS.NOMOR IN(2,4,5,6,7,8) THEN EIS_MATAKULIAH.SKS END) AS "Praktikum", 
0 AS "Praktik", 
SUM(CASE WHEN MATAKULIAH_JENIS.NOMOR = 5 THEN EIS_MATAKULIAH.SKS ELSE 0 END)AS "PKL"
FROM EIS_MATAKULIAH
INNER JOIN MATAKULIAH_JENIS ON EIS_MATAKULIAH.MATAKULIAH_JENIS=MATAKULIAH_JENIS.NOMOR
INNER JOIN EIS_KULIAH ON EIS_MATAKULIAH.NOMOR=EIS_KULIAH.MATAKULIAH 
INNER JOIN PROGRAM ON EIS_MATAKULIAH.PROGRAM=PROGRAM.NOMOR
INNER JOIN JURUSAN ON EIS_MATAKULIAH.JURUSAN=JURUSAN.NOMOR
INNER JOIN KELAS ON EIS_KULIAH.KELAS=KELAS.NOMOR 
WHERE EIS_MATAKULIAH.TAHUN=2017 AND 
EIS_MATAKULIAH.KELAS IN (1,2,3,4) AND 
EIS_MATAKULIAH.SEMESTER IN(1,2) AND 
KELAS.PARAREL=\'A\'
GROUP BY PROGRAM.PROGRAM, JURUSAN.JURUSAN, EIS_MATAKULIAH.TAHUN
ORDER BY PROGRAM.PROGRAM';

$stid = oci_parse($con, $query);
oci_execute($stid);

$data = array();

while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
    $data[] = $row;
}

oci_free_statement($stid);
oci_close($con);

http_response_code(200);
echo json_encode($data);

?>