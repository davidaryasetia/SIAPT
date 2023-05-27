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
Tabel 3.c.1 Produktivitas Penelitian Dosen 
PENELITIAN.JENIS='penelitian'
PENELITIAN.TAHUN_USULAN TS(2019), TS-1(2020), TS(2021)
*/
$query='SELECT 1 AS "Nomor", \'Perguruan tinggi atau mandiri\' AS "Sumber Pembiayaan", 
COUNT(DISTINCT CASE WHEN PENELITIAN.TAHUN_USULAN=2019 THEN PENELITIAN.ID END) AS "TS-2(2019)", 
COUNT(DISTINCT CASE WHEN PENELITIAN.TAHUN_USULAN=2020 THEN PENELITIAN.ID END) AS "TS-1(2020)", 
COUNT(DISTINCT CASE WHEN PENELITIAN.TAHUN_USULAN=2021 THEN PENELITIAN.ID END) AS "TS(2021)"
FROM PENELITIAN
INNER JOIN PENELITIAN_TEAM ON PENELITIAN.ID=PENELITIAN_TEAM.PENELITIAN_ID
INNER JOIN SIMLITABMAS_USER ON PENELITIAN_TEAM.USER_ID=SIMLITABMAS_USER.ID
INNER JOIN PEGAWAI ON SIMLITABMAS_USER.PEGAWAI_ID=PEGAWAI.NOMOR
WHERE PENELITIAN.JENIS=\'penelitian\' 
ORDER BY PENELITIAN.ID';

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