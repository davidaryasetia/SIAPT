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


// Query Tabel elemen_indikator_akreditasi.php (elemen dan indikator dari akreditasi)
$query = 'SELECT ELEMEN_INDIKATOR.NO_BUTIR AS "NO", 
BAB_KRITERIA.BAB_KRITERIA_ELEMEN AS "BAB", 
ELEMEN_INDIKATOR.INDIKATOR AS "INDIKATOR", 
ELEMEN_INDIKATOR.SHEET AS SHEET, 
KATEGORI_TABEL.KATEGORI AS "KATEGORI", 
ELEMEN_INDIKATOR.KETERANGAN_SKOR AS "RUMUS"
FROM ELEMEN_INDIKATOR 
INNER JOIN BAB_KRITERIA ON ELEMEN_INDIKATOR.NO_BAB=BAB_KRITERIA.NO
INNER JOIN KATEGORI_TABEL ON ELEMEN_INDIKATOR.NO_KATEGORI=KATEGORI_TABEL.NO
WHERE KATEGORI_TABEL.NO=1
ORDER BY ELEMEN_INDIKATOR.NO, BAB_KRITERIA.NO';

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