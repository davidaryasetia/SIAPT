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

// Query Tabel 3.a.1 kecukupan_dosen.php
$query = 'SELECT DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN, 
\' \' AS "Doktor/Doktor Terapan", 
\'\' AS "Magister/Magister Terapan",
\'\' AS "Profesi", 
\'\' AS "Jumlah"
FROM DEPARTEMEN
GROUP BY DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN
ORDER BY DEPARTEMEN.NOMOR';

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