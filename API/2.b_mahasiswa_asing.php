<?php
// Include Koneksi
include "../includes/func.inc.php";

// Set Header
header('Access-Control-Allow-Origin: *');
header('content-type:application/json');

class Mahasiswa{
    public $con;
    public $db_user ="PA0001";
    public $db_pass ="726987";

    public function __construct(){
        // Koneksi ke DB 
        $this->con = $this->konekDb($this->db_user, $this->db_pass);
    }

    public function konekDb($db_user, $db_pass){
        // memanggil fungsi koneDb dan return koneksi
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

        // Close koneksi DB
        oci_close($this->con);

        // Return Fetched Data
        return $data;
    }
}

// API endpoint 1 (Mahasiswa Asing 3 tahun terakhir)
function mahasiswa_asing(){
    // Instance class Mahasiswa
    $database = new Mahasiswa();

    /*
    Query SQL tabel 2.b Mahaiswa asing
    Tabel 2.b Mahasiswa Asing 
    Notes : 
    TS-2(2018)
    TS-1(2019)
    TS(2020)
    */
    $query='SELECT PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM||\' \' ||JURUSAN.JURUSAN AS "Program Studi", 
    COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2017 THEN MAHASISWA.NRP END) AS "TS-2(2017)",  
    COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2018 THEN MAHASISWA.NRP END) AS "TS-1(2018)",  
    COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2019 THEN MAHASISWA.NRP END) AS "TS(2019)" 
    FROM PROGRAM_STUDI 
    INNER JOIN PROGRAM ON PROGRAM_STUDI.PROGRAM=PROGRAM.NOMOR
    INNER JOIN JURUSAN ON PROGRAM_STUDI.JURUSAN=JURUSAN.NOMOR
    INNER JOIN KELAS ON PROGRAM.NOMOR=KELAS.PROGRAM AND KELAS.JURUSAN=JURUSAN.NOMOR
    INNER JOIN MAHASISWA ON KELAS.NOMOR=MAHASISWA.KELAS
    INNER JOIN STATUS ON MAHASISWA.STATUS=STATUS.KODE     
    WHERE STATUS.KODE=\'E\' /*KODE E = "Mahasiswa Luar Negeri"*/  
GROUP BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM, JURUSAN.JURUSAN, PROGRAM_STUDI.GELAR 
    ORDER BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM';

    // Eksekusi Query dan get $hasil
    $hasil = $database->executeQuery($query);

    // Set http response 200 -> OK
    http_response_code(200);

    // Set headers parse to json
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Output result json
    echo json_encode($hasil);

}

// API endpoint 2 (Jumlah mahasiswa aktif 3 tahun terakhir)
function mahasiswa_aktif(){
    // Instance class mahasiswa
    $database = new Mahasiswa();

    /*
    Query 2.b Jumlah Mahasiswa Aktif 3 tahun terakhir
    Notes : 
    TS-2(2017
    TS-1(2018)
    TS(2019)
    */

    $query = 'SELECT PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM||\' \' ||JURUSAN.JURUSAN AS "Program Studi", 
    COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2017 THEN MAHASISWA.NRP END) AS "TS-2(2017)",  
    COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2018 THEN MAHASISWA.NRP END) AS "TS-1(2018)",  
    COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2019 THEN MAHASISWA.NRP END) AS "TS(2019)" 
    FROM PROGRAM_STUDI 
    INNER JOIN PROGRAM ON PROGRAM_STUDI.PROGRAM=PROGRAM.NOMOR
    INNER JOIN JURUSAN ON PROGRAM_STUDI.JURUSAN=JURUSAN.NOMOR
    INNER JOIN KELAS ON PROGRAM.NOMOR=KELAS.PROGRAM AND KELAS.JURUSAN=JURUSAN.NOMOR
    INNER JOIN MAHASISWA ON KELAS.NOMOR=MAHASISWA.KELAS
    INNER JOIN STATUS ON MAHASISWA.STATUS=STATUS.KODE     
    WHERE STATUS.KODE=\'A\' /*KODE A = "Mahasiswa Aktif"*/  
    GROUP BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM, JURUSAN.JURUSAN, PROGRAM_STUDI.GELAR 
    ORDER BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM';

    // Eksekusi Query dan get $hasil
    $hasil = $database->executeQuery($query);

    // Set http response 200 -> OK
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
        case 'mahasiswa_asing';
            mahasiswa_asing();
            break;
        case 'mahasiswa_aktif';
            mahasiswa_aktif();
            break;
            default:
            // Jika query parameter tidak valid maka, return http 404 -> Not Found Response
            http_response_code(404);
            echo json_encode(array(
                'error'=>'Query Parameter Tidak Valid'
            ));
            break;
    }
}
else{
    // Jika query parameter tidak ditemukan, maka return 400 - Bad Request Response
    http_response_code(400);
    echo json_encode(array(
        'error'=>'Masukkan Valid Query Parameter'
    ));
}


?>