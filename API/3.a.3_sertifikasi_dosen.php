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

/*Tabel 3.a.3) Sertifikasi Dosen (Pendidik Profesional/Profesi/Industri/Kompetensi) 	  
Yang masih berlaku dalam 3 tahun terakhir
Keterangan : 
- STATUS_PEGAWAI.NOMOR 1=Aktif, 6=Tugas Belajar Dalam Negeri, 7=Tugas Belajar Luar Negeri, 8=Diperbantukan, 10=Dipekerjakan, 11=Ijin Belajar Dalam Negeri, 12=Ijin Belajar Luar Negeri
- STAFF.NOMOR 4=Dosen,8=Dosen Luar,26=Dosen VEDC,57=Dosen PSDKU Lamongan59=Dosen PSDKU Sumenep
*/ 
 
$query ='SELECT DISTINCT DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN AS "Departemen/Jurusan",  
COUNT(DISTINCT PEGAWAI.NIP) AS "Jumlah Dosen",  
COUNT(DISTINCT
      CASE WHEN PEGAWAI.SERDOS IN (0, 1) THEN PEGAWAI.NIP
      END
) AS  "Jumlah Dosen Bersertifikat"
FROM DEPARTEMEN 	 
INNER JOIN PROGRAM_STUDI ON DEPARTEMEN.NOMOR=PROGRAM_STUDI.DEPARTEMEN 
INNER JOIN JURUSAN ON PROGRAM_STUDI.JURUSAN=JURUSAN.NOMOR  
INNER JOIN PROGRAM ON PROGRAM_STUDI.PROGRAM=PROGRAM.NOMOR 
INNER JOIN PEGAWAI ON JURUSAN.NOMOR=PEGAWAI.JURUSAN 
INNER JOIN STAFF ON PEGAWAI.STAFF=STAFF.NOMOR
INNER JOIN JABATAN_FUNGSIONAL ON PEGAWAI.FUNGSIONAL=JABATAN_FUNGSIONAL.NOMOR
INNER JOIN PEGAWAI_PENDIDIKAN_TINGKAT ON PEGAWAI.PENDIDIKAN_TERAKHIR=PEGAWAI_PENDIDIKAN_TINGKAT.NOMOR
INNER JOIN STATUS_KARYAWAN ON PEGAWAI.STATUS_KARYAWAN=STATUS_KARYAWAN.NOMOR
INNER JOIN STATUS_PEGAWAI ON PEGAWAI.STATUS=STATUS_PEGAWAI.NOMOR

WHERE STATUS_PEGAWAI.NOMOR IN (1,6,7,8,10,11,12) AND  	 
 STATUS_KARYAWAN.NOMOR IN(4,5) AND   
 PEGAWAI_PENDIDIKAN_TINGKAT.NOMOR IN (9,10,11) AND
 STAFF.NOMOR IN (4,8,26,57,58,59)
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