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
$query = 'SELECT ROW_NUMBER() OVER (ORDER BY MAHASISWA_EVENT.NOMOR) AS "Nomor",
       MAHASISWA_EVENT.EVENT AS "Nama Kegiatan", 
       MAHASISWA_EVENT.TANGGAL AS "Waktu Penyelenggaraan",
       CASE MAHASISWA_EVENT.SKALA_EVENT 
       WHEN \'N\' THEN \'Nasional\'
       WHEN \'I\' THEN \'Internasional\'
       WHEN \'R\' THEN \'Riset\'
       ELSE MAHASISWA_EVENT.SKALA_EVENT 
       END AS "Tingkat",
       MAHASISWA_EVENT_PESERTA.KETERANGAN AS "Prestasi Yang Dicapai"
FROM MAHASISWA_EVENT_PESERTA
     INNER JOIN MAHASISWA_EVENT ON MAHASISWA_EVENT_PESERTA.MAHASISWA_EVENT=MAHASISWA_EVENT.NOMOR
     INNER JOIN MAHASISWA_EVENT_BIDANG ON MAHASISWA_EVENT.EVENT_BIDANG=MAHASISWA_EVENT_BIDANG.NOMOR
     INNER JOIN MAHASISWA ON MAHASISWA_EVENT_PESERTA.MAHASISWA=MAHASISWA.NOMOR
WHERE MAHASISWA_EVENT_BIDANG.NOMOR IN (2,3,4,5)
ORDER BY MAHASISWA_EVENT.NOMOR ASC';

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