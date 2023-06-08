<?php
// Include Koneksi
include "../includes/func.inc.php";

// Set Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');   

class Kecukupan_Dosen{
    public $con;
    public $db_user = "PA0001";
    public $db_pass = "726987";

    public function __construct(){
        // Koneksi ke DB
        $this->con = $this->konekDb($this->db_user, $this->db_pass);
    }

    public function konekDb($db_user, $db_pass){
        // Memanggil fungsi konekDb dan return koneksi
        return konekDb($db_user, $db_pass);
    }

    public function executeQuery($query){
        // Eksekusi SQL Query menggunakan oci_parse dan oci_execute function
        $stid = oci_parse($this->con, $query);
        oci_execute($stid);

        // Inisialisasi array kosong untuk fetched data
        $data = array();

        while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
            $data[] = $row;
        }
        oci_free_statement($stid);

        // Close Koneksi DB
        oci_close($this->con);

        // Return fetched Data
        return $data;
    }
}

// API endpoint 1 (Jumlah Dosen Tetap Perguruan Tinggi)
function dosen_tetap(){
    // Instance class Kecukupan_Dosen
    $database = new Kecukupan_Dosen();

    /*
    Query SQL Tabel 3.a.1) Kecukupan Dosen Tetap Perguruan Tinggi
    eterangan : 
    PEGAWAI_PENDIDIKAN_TINGKAT.NOMOR 10=S3, 11=S3(Guru Besar), 9=S2
    STATUS_PEGAWAI.NOMOR (1=Aktif, 6=Tugas Belajar Dalam Negeri, 7=Tugas Belajar Luar Negeri, 10=Dipekerjakan, 11=Ijin Belajar Dalam Negeri, 12=Ijin Belajar Luar Negeri)
    STAFF.NOMOR (4=Dosen,8=Dosen Luar,26=Dosen VEDC,57=Dosen PSDKU Lamongan,59=Dosen PSDKU Sumenep)
    */

    $query = 'SELECT DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN,  
    COUNT (DISTINCT CASE WHEN PEGAWAI_PENDIDIKAN_TINGKAT.NOMOR IN (10,11) THEN PEGAWAI.NIP END) AS  "Doktor/Doktor Terapan",
    COUNT (DISTINCT CASE WHEN PEGAWAI_PENDIDIKAN_TINGKAT.NOMOR= 9 THEN PEGAWAI.NIP END) AS  "Magister/Magister Terapan", 
    \'0\' AS "PROFESI",  
    -- Total Jumlah Dosen Pada setiap unit pengelola 
     (COUNT(DISTINCT CASE WHEN PEGAWAI_PENDIDIKAN_TINGKAT.PENDIDIKAN=\'S3\' THEN PEGAWAI.NIP END) +  
      COUNT(DISTINCT CASE WHEN PEGAWAI_PENDIDIKAN_TINGKAT.PENDIDIKAN=\'S2\' THEN PEGAWAI.NIP END)) AS "Jumlah"  
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
    WHERE STATUS_PEGAWAI.NOMOR IN (1,6,7,10,11,12) 
    AND STAFF.NOMOR IN(4,8,26,57,58,59)
     GROUP BY DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN 
     ORDER BY DEPARTEMEN.NOMOR';

    //  Eksekusi Query dan get $hasil
    $hasil = $database->executeQuery($query);

    // Set http response 200 -> Ok
    http_response_code(200);

    // Set headers to json
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Output result json
    echo json_encode($hasil);
}

// API endpoint 2 (Total List Program Studi)
function jumlah_prodi(){
    // Instance class Kecukupan_Dosen()
    $database = new Kecukupan_Dosen();

    /**
     * Query List Jumlah Program Studi
     */
    $query = 'SELECT ROW_NUMBER() OVER (ORDER BY PROGRAM.NOMOR) AS "Nomor", PROGRAM.PROGRAM||\' \'||JURUSAN.JURUSAN AS "Program Studi", 
    COUNT (DISTINCT CASE WHEN PEGAWAI_PENDIDIKAN_TINGKAT.NOMOR IN (10,11) THEN PEGAWAI.NIP END) AS  "Doktor/Doktor Terapan",
    COUNT (DISTINCT CASE WHEN PEGAWAI_PENDIDIKAN_TINGKAT.NOMOR= 9 THEN PEGAWAI.NIP END) AS  "Magister/Magister Terapan", 
    \'0\' AS "PROFESI",  
    -- Total Jumlah Dosen Pada setiap unit pengelola 
     (COUNT(DISTINCT CASE WHEN PEGAWAI_PENDIDIKAN_TINGKAT.PENDIDIKAN=\'S3\' THEN PEGAWAI.NIP END) +  
      COUNT(DISTINCT CASE WHEN PEGAWAI_PENDIDIKAN_TINGKAT.PENDIDIKAN=\'S2\' THEN PEGAWAI.NIP END)) AS "Jumlah" 
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
        STAFF.NOMOR IN(4,8,26,57,58,59)
     GROUP BY DEPARTEMEN.NOMOR, DEPARTEMEN.DEPARTEMEN, PROGRAM.PROGRAM, JURUSAN.JURUSAN, PROGRAM.NOMOR
     ORDER BY PROGRAM.NOMOR';

    //  Eksekusi Query dan get $hasil
    $hasil = $database -> executeQuery($query);

    // Set http response 200 -> Ok
    http_response_code(200);

    // Set header parse to json
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Output result in json
    echo json_encode($hasil);
}

// Route API request ke titik akhir endpoint berdasarkan query parameter
if(isset($_GET['query'])){
    $query = $_GET['query'];

    switch($query){
        case 'dosen_tetap';
            dosen_tetap();
            break;
        case 'jumlah_prodi';
            jumlah_prodi();
            break;
            default;
            // Jika query parameter tidak valid, maka return http 404 -> Not Found Response
            http_response_code(404);
            echo json_encode(array(
                'error'=>'Query Parameter Tidak Valid'
            ));
            break;
    }
}
else {
    // Jika query parameter tidak ditemukan, maka return 400 - Bad Request Response
    http_response_code(400);
    echo json_encode(array(
        'error' => 'Masukkan Valid Query Parameter'
    ));
    
}


?>