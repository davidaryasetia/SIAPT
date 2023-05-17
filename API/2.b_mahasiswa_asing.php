<?php
// Include Koneksi
include "../includes/func.inc.php";
$con=konekDb($db_user, $db_pass);

// Set headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Check jika request method !== GET maka not allowed
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    exit();
}
    
/* 
Tabel 2.b Mahasiswa Asing 
NOTES :  
TS-2(2018) 
TS-1(2019) 
TS(2020) 
*/
$query = 'SELECT PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM||\' \' ||JURUSAN.JURUSAN AS "Program Studi", 
       SUM (CASE WHEN MAHASISWA.ANGKATAN=2018 THEN 1 ELSE 0 END) AS "TS-2(2018)",  
       SUM (CASE WHEN MAHASISWA.ANGKATAN=2019 THEN 1 ELSE 0 END) AS "TS-1(2019)",  
       SUM (CASE WHEN MAHASISWA.ANGKATAN=2020 THEN 1 ELSE 0 END) AS "TS(2020)" 
FROM DEPARTEMEN 
INNER JOIN PROGRAM_STUDI ON DEPARTEMEN.NOMOR=PROGRAM_STUDI.DEPARTEMEN
INNER JOIN PROGRAM ON PROGRAM_STUDI.PROGRAM=PROGRAM.NOMOR
INNER JOIN JURUSAN ON PROGRAM_STUDI.JURUSAN=JURUSAN.NOMOR
INNER JOIN KELAS ON PROGRAM.NOMOR=KELAS.PROGRAM AND KELAS.JURUSAN=JURUSAN.NOMOR
INNER JOIN MAHASISWA ON KELAS.NOMOR=MAHASISWA.KELAS
INNER JOIN STATUS ON MAHASISWA.STATUS=STATUS.KODE     
WHERE STATUS.KODE=\'E\' 
      GROUP BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM, JURUSAN.JURUSAN, PROGRAM_STUDI.GELAR 
ORDER BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM';

$stid = oci_parse($con, $query);
oci_execute($stid);

$data = array();

while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    $data[] = $row;
}

oci_free_statement($stid);
oci_close($con);

http_response_code(200);
echo json_encode($data);
?>