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


//  Query ke tabel 2.b mahasiswa_asing.php
$query = 'SELECT PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM||\' \' ||JURUSAN.JURUSAN AS "Program Studi",
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
STATUS.STATUS NOT IN (\'Cuti\', \'DO\', \'Mengundurkan Diri\', \'Meninggal\',\'Tanpa Keterangan\')
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