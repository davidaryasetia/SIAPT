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

/*Tabel 3.b Rasio Dosen Terhadap Mahasiswa  
  TAHUN 2020 
  Keterangan : 
 - STATUS.KODE A(Aktif)
 - STATUS_PEGAWAI.NOMOR 1=Aktif, 6=Tugas Belajar Dalam Negeri, 7=Tugas Belajar Luar Negeri, 8=Diperbantukan, 10=Dipekerjakan, 11=Ijin Belajar Dalam Negeri, 12=Ijin Belajar Luar Negeri
 - STAFF.NOMOR 4=Dosen,8=Dosen Luar,26=Dosen VEDC,57=Dosen PSDKU Lamongan59=Dosen PSDKU Sumenep
*/ 
$query = 'SELECT DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN,  
COUNT(DISTINCT PEGAWAI.NIP) AS "Jumlah Dosen",
COUNT(DISTINCT MAHASISWA.NRP) AS "Mahasiswa Angkatan 2020",  
\'0\' AS "Jumlah Mahasiswa TA" 
FROM DEPARTEMEN  
INNER JOIN PROGRAM_STUDI ON DEPARTEMEN.NOMOR=PROGRAM_STUDI.DEPARTEMEN
INNER JOIN PROGRAM ON PROGRAM_STUDI.PROGRAM=PROGRAM.NOMOR
INNER JOIN JURUSAN ON PROGRAM_STUDI.JURUSAN=JURUSAN.NOMOR
INNER JOIN KELAS ON PROGRAM.NOMOR=KELAS.PROGRAM AND JURUSAN.NOMOR=KELAS.JURUSAN 
/*Join Pegawai*/
INNER JOIN PEGAWAI ON JURUSAN.NOMOR=PEGAWAI.JURUSAN
INNER JOIN STAFF ON PEGAWAI.STAFF=STAFF.NOMOR
INNER JOIN STATUS_PEGAWAI ON PEGAWAI.STATUS=STATUS_PEGAWAI.NOMOR
/*Join Mahasiswa*/
INNER JOIN MAHASISWA ON KELAS.NOMOR=MAHASISWA.KELAS
INNER JOIN STATUS ON MAHASISWA.STATUS=STATUS.KODE
INNER JOIN MAHASISWA_RIWAYAT ON MAHASISWA.NOMOR=MAHASISWA_RIWAYAT.MAHASISWA 
INNER JOIN MAHASISWA_RIWAYAT_JENIS ON MAHASISWA_RIWAYAT.MAHASISWA_RIWAYAT_JENIS=MAHASISWA_RIWAYAT_JENIS.NOMOR 
WHERE MAHASISWA.ANGKATAN=2020 AND  
      MAHASISWA_RIWAYAT.STATUS=\'A\' AND
      STATUS.KODE=\'A\' AND
      STATUS_PEGAWAI.NOMOR IN (1,6,7,8,10,11,12) AND
      STAFF.NOMOR IN(4,8,26,57,59)
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