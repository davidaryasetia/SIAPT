<?php
// Include Koneksi
include "../includes/func.inc.php";
$con=konekDb($db_user, $db_pass);

// Set headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Check jika request method !== GET maka not allowed
if ($_SERVER['REQUEST_METHOD'] !== 'GET'){
    http_response_code(405);
    exit();
}


/*
Tabel 5.b.2 Prestasi Non Akademik Mahasiswa

*/
$query = 'SELECT 
ROW_NUMBER() OVER (ORDER BY EVENT) AS "Nomor", 
EVENT AS "Nama Kegiatan", 
"Waktu Penyelenggaraan", 
"Tingkat", 
CASE WHEN "Tingkat" = \'Provinsi/Wilayah\' THEN \'V\' ELSE \'\' END AS "Provinsi/Wilayah", 
CASE WHEN "Tingkat" = \'Nasional\' THEN \'V\' ELSE \'\' END AS "Nasional", 
CASE WHEN "Tingkat" = \'Internasional\' THEN \'V\' ELSE \'\' END AS "Internasional", 
"Prestasi Yang Dicapai"
FROM (
SELECT DISTINCT 
MAHASISWA_EVENT.EVENT AS EVENT, 
MAHASISWA_EVENT.TANGGAL AS "Waktu Penyelenggaraan", 
CASE
WHEN MAHASISWA_EVENT.SKALA_EVENT IN (\'R\', \'L\') THEN \'Provinsi/Wilayah\'
WHEN MAHASISWA_EVENT.SKALA_EVENT = \'N\' THEN \'Nasional\'
WHEN MAHASISWA_eVENT.SKALA_EVENT = \'I\' THEN \'Internasional\'
ELSE MAHASISWA_EVENT.SKALA_EVENT
END AS "Tingkat", 
MAHASISWA_EVENT_PESERTA.KETERANGAN AS "Prestasi Yang Dicapai"
FROM 
MAHASISWA_EVENT_PESERTA
INNER JOIN MAHASISWA_EVENT ON MAHASISWA_EVENT_PESERTA.MAHASISWA_EVENT=MAHASISWA_EVENT.NOMOR
INNER JOIN MAHASISWA_EVENT_BIDANG ON MAHASISWA_EVENT.EVENT_BIDANG=MAHASISWA_EVENT_BIDANG.NOMOR
INNER JOIN MAHASISWA ON MAHASISWA_EVENT_PESERTA.MAHASISWA=MAHASISWA.NOMOR
WHERE 
MAHASISWA_EVENT_BIDANG.NOMOR IN (2,3,4,5)
) subquery
ORDER BY EVENT ASC';

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