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

// Query Tabel 3.b rasio_dosen_mhs.php
$query = 'SELECT DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN, COUNT(DISTINCT PEGAWAI.NIP) AS "Jumlah Dosen", COUNT(DISTINCT MAHASISWA.NRP) AS "Jumlah Mahasiswa 2020", 
            \'\' AS "NULL"
            FROM DEPARTEMEN
            INNER JOIN PROGRAM_STUDI ON DEPARTEMEN.NOMOR=PROGRAM_STUDI.DEPARTEMEN
            INNER JOIN JURUSAN ON PROGRAM_STUDI.JURUSAN=JURUSAN.NOMOR
            INNER JOIN PROGRAM ON PROGRAM_STUDI.PROGRAM=PROGRAM.NOMOR
            INNER JOIN PEGAWAI ON JURUSAN.NOMOR=PEGAWAI.JURUSAN
            INNER JOIN STATUS_PEGAWAI ON PEGAWAI.STATUS=STATUS_PEGAWAI.NOMOR
            INNER JOIN KELAS ON PROGRAM.NOMOR=KELAS.PROGRAM AND JURUSAN.NOMOR=KELAS.JURUSAN
            INNER JOIN MAHASISWA ON KELAS.NOMOR=MAHASISWA.KELAS
            INNER JOIN STATUS ON MAHASISWA.STATUS=STATUS.KODE
            WHERE MAHASISWA.ANGKATAN=2020 AND 
                STATUS.STATUS NOT IN (\'Tanpa Keterangan\',\'Cuti\',\'DO\',\'Mengundurkan Diri\',\'Meninggal\') AND
                STATUS_PEGAWAI.STATUS NOT IN (\'Meninggal\', \'Keluar\', \'Pensiun\', \'Pasif\')
            GROUP BY DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN, MAHASISWA.ANGKATAN
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