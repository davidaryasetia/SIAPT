<?php
// Include Koneksi
include "../includes/func.inc.php";

// Koneksi ke DB;
$con = konekDb($db_user, $db_pass);

// Set headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Check jika request method
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    // Tabel Data LKPT (Laporan Kinerja Perguruan Tinggi)

    $query = 'SELECT NO, JUDUL, SHEET, STATUS, SUMBER
    FROM TABEL_LKPT
    ORDER BY NO';

    $stid = oci_parse($con, $query);
    oci_execute($stid);

    $data = array();

    // Fetch row dan store di array
    while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false){
        $data[] = $row;
    }
    
    oci_free_statement($stid);

    // Kirim response untuk fetched data
    http_response_code(200);
    echo json_encode($data);
    
} else if($_SERVER['REQUEST_METHOD'] === 'POST'){

    
    // Get data dari request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Extract value dari data
    $judul = $data['JUDUL'];
    $sheet = $data['SHEET'];
    $status = $data['STATUS'];
    $sumber = $data['SUMBER'];

    // Check jika variable NO sudah ada
    $queryCheck = 'SELECT COUNT(*) FROM TABEL_LKPT WHERE NO = :no';
    $stidCheck = oci_parse($con, $queryCheck);

    // Mengecek value $no agar tidak duplicate    
    oci_bind_by_name($stidCheck, ":no", $no);
    oci_execute($stidCheck);
    $row = oci_fetch_array($stidCheck, OCI_ASSOC);
    $recordCount = $row['COUNT(*)'];

    if($recordCount > 1){
        // Record telah ada maka return error response
        http_response_code(400);
        echo json_encode(array('Pesan' => 'Record telah ada'));
    } else {
        // Generate Value Next Sequence for NO
        $querySeq = 'SELECT ID_SEQ.NEXTVAL FROM DUAL';
        $stidSeq = oci_parse($con, $querySeq);
        oci_execute($stidSeq);
        $rowSeq = oci_fetch_array($stidSeq, OCI_ASSOC);
        $no = $rowSeq['NEXTVAL'];

        // Insert Statement SQL 
        $query = 'INSERT INTO TABEL_LKPT(NO, JUDUL, SHEET, STATUS, SUMBER)
        VALUES(:no, :judul, :sheet, :status, :sumber)';

        $stid = oci_parse($con, $query);

        // Bind values to the statement
        oci_bind_by_name($stid, ":no", $no);
        oci_bind_by_name($stid, ":judul", $judul);
        oci_bind_by_name($stid, ":sheet", $sheet);
        oci_bind_by_name($stid, ":status", $status);
        oci_bind_by_name($stid, ":sumber", $sumber);

        // Excecute insert statement
        $success = oci_execute($stid);

        if($success){
            // Response Sukses
            http_response_code(200);
            echo json_encode(array('Pesan' => 'Data Sukses Ditambahkan'));
        } else {
            // Error Response
            http_response_code(500);
            echo json_encode(array('Pesan' => 'Data Gagal Ditambahkan'));
        }
        oci_free_statement($stid);
        oci_free_statement($stidSeq);
    }
    oci_free_statement($stidCheck);

} else if($_SERVER['REQUEST_METHOD'] === 'PUT'){
    // Get No dari URL parameter
    $no = $_GET['no'];

    // Get data dari request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Extract value dari data
    $judul = $data['JUDUL'];
    $sheet = $data['SHEET'];
    $status = $data['STATUS'];
    $sumber = $data['SUMBER'];

    // UPDATE SQL statement
    $query = 'UPDATE TABEL_LKPT
                SET JUDUL = :judul, SHEET = :sheet, STATUS = :status, SUMBER = :sumber
                WHERE NO = :no';

    $stid = oci_parse($con, $query);

    // Bind values from statement
    oci_bind_by_name($stid, ":no", $no);
    oci_bind_by_name($stid, ":judul", $judul);
    oci_bind_by_name($stid, ":sheet", $sheet);
    oci_bind_by_name($stid, ":status", $status);
    oci_bind_by_name($stid, ":sumber", $sumber);

    // Eksekusi update statement dan check result
    $success = oci_execute($stid);

    if($success){
        // Response Success
        http_response_code(200);
        echo json_encode(array('Pesan' => 'Data Berhasil Diperbaharui'));
    } else {
        // Response Error
        http_response_code(500);
        echo json_encode(array('Pesan' => 'Gagal Memperbaharui Data'));
    }
    oci_free_statement($stid);

} else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    // Get No dari URL parameter
    $no = $_GET['no'];

    // Delete SQL statement
    $query = 'DELETE FROM TABEL_LKPT 
    WHERE NO = :no';

    $stid = oci_parse($con, $query);

    // Bind value to statement
    oci_bind_by_name($stid, ":no" , $no);

    // Eksekusi Delete statement dan check result 
    $success = oci_execute($stid);

    if($success){
        // Response Success
        http_response_code(200);
        echo json_encode(array('Pesan' => 'Data Berhasil Dihapus'));
    } else{
        // Response Error
        http_response_code(500);
        echo json_encode(array('Pesan' => 'Gagal Menghapus Data'));
    }
    oci_free_statement($stid);
}

// Close koneksi Database
oci_close($con);


?>