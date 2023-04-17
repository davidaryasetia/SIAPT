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

// Query tabel 3.a.3 sertifikasi_dosen (Jumlah Rasio Sertifikasi Dosen dengan jumlah Dosen)
$query = 'SELECT DISTINCT DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN, 
COUNT(DISTINCT PEGAWAI.NIP) AS "Jumlah Dosen", 
COUNT(DISTINCT CASE WHEN PEGAWAI.SERDOS IN (0, 1, 2, 3) THEN PEGAWAI.NOMOR END) AS "Jumlah Dosen Bersertifikat"
FROM DEPARTEMEN
INNER JOIN PROGRAM_STUDI ON DEPARTEMEN.NOMOR=PROGRAM_STUDI.DEPARTEMEN
INNER JOIN JURUSAN ON PROGRAM_STUDI.JURUSAN=JURUSAN.NOMOR
INNER JOIN PROGRAM ON PROGRAM_STUDI.PROGRAM=PROGRAM.NOMOR
INNER JOIN PEGAWAI ON JURUSAN.NOMOR=PEGAWAI.JURUSAN
INNER JOIN STATUS_PEGAWAI ON PEGAWAI.STATUS=STATUS_PEGAWAI.NOMOR
INNER JOIN JABATAN_FUNGSIONAL ON PEGAWAI.FUNGSIONAL=JABATAN_FUNGSIONAL.NOMOR
WHERE STATUS_PEGAWAI.STATUS NOT IN (\'Meninggal\', \'Keluar\', \'Pensiun\', \'Pasif\')
GROUP BY DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN
ORDER BY DEPARTEMEN.NOMOR ASC';

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