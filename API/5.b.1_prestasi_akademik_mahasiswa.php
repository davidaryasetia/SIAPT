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
Tabel 5.b.1 Prestasi Akademik Mahasiswa
Prestasi Akademik = Bidang_Prestasi Penalaran
MAHASISWA_EVENT_BIDANG.BIDANG_PRESTASI 1.PENALARAN
*/
$query = 'SELECT 
ROW_NUMBER() OVER (ORDER BY NOMOR) AS "Nomor", 
EVENT AS "Nama Kegiatan", 
"Waktu Penyelenggaraan", 
"Tingkat", 
CASE WHEN "Tingkat" = \'Provinsi/Wilayah\' THEN \'V\' ELSE \'\' END AS "Provinsi/Wilayah", 
CASE WHEN "Tingkat" = \'Nasional\' THEN \'V\' ELSE \'\' END AS "Nasional", 
CASE WHEN "Tingkat" = \'Internasional\' THEN \'V\' ELSE \'\' END AS "Internasional", 
"Prestasi Yang Dicapai"
FROM (
SELECT DISTINCT 
MAHASISWA_EVENT.NOMOR AS NOMOR,
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
MAHASISWA_EVENT_BIDANG.NOMOR=1 AND
MAHASISWA_EVENT.TANGGAL BETWEEN TO_DATE (\'01-JAN-2017\', \'DD-MON-YYYY\') AND TO_DATE (\'31-DEC-2019\', \'DD-MON-YYYY\')
) subquery
ORDER BY NOMOR, "Waktu Penyelenggaraan" ASC';

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