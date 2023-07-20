<?php
// Include Koneksi
include "../includes/func.inc.php";

// Koneksi ke DB;
$con = konekDb($db_user, $db_pass);

// Set headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


// Check jika request method === GET
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    // Cek jika no parameter disediakan oleh GET request
    if(isset($_GET['no'])){
        $no = $_GET['no'];
    

    // Tabel Data LKPT (Laporan Kinerja Perguruan Tinggi)
    $query = 'SELECT NO, JUDUL, SHEET, STATUS, SUMBER
    FROM TABEL_LKPT
    WHERE NO = :no';

    $stid = oci_parse($con, $query);

    // Bind value to the statement
    oci_bind_by_name($stid, ":no", $no);

    oci_execute($stid);

    // Fetch row dan store data di array
    $data = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);

    oci_free_statement($stid);
    // Kirim response untuk fetched data
    if($data !== false){
        http_response_code(200);
        echo json_encode($data);
    } else{
        http_response_code(404);
        echo json_encode(array('Pesan' => 'Data Tidak Ditemukan'));
    }
} else{
    // Tabel data Laporan Kineja perguruan tinggi
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
}
}

// Check Jika Request Method POST
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Jika _method = PUT
    if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
        // PUT request
        $no = $_POST['no'];
        $judul = $_POST['judul'];
        $sheet = $_POST['sheet'];
        $status = $_POST['status'];
        $sumber = $_POST['sumber'];

        // Update SQL statement 
        $query = 'UPDATE TABEL_LKPT
        SET JUDUL = :judul, SHEET = :sheet, STATUS = :status, SUMBER= :sumber
        WHERE NO = :no';
        $stid = oci_parse($con, $query);

        // Bind value from statement
        oci_bind_by_name($stid, ":no", $no);
        oci_bind_by_name($stid, ":judul", $judul);
        oci_bind_by_name($stid, ":sheet", $sheet);
        oci_bind_by_name($stid, ":status", $status);
        oci_bind_by_name($stid, ":sumber", $sumber);

        // Execute update statement and check result
        $success = oci_execute($stid);
        if ($success) {
            // Response Sukse
            http_response_code(200);
            echo json_encode(array('Pesan' => 'Data Berhasil Ditambahkan'));
        } else {
            // Response Error 
            http_response_code(500);
            echo json_encode(array('Pesan' => 'Data Gagal Diperbaharui'));
        }
        oci_free_statement($stid);

    // Jika _method = DELETE
    }else if(isset($_POST['_method']) && $_POST['_method'] === 'DELETE'){
        // Delete request
        $no = $_POST['no'];

        // Delete statement
        $query = 'DELETE FROM TABEL_LKPT
        WHERE NO = :no';
        $stid = oci_parse($con, $query);

        // Bind value from statement
        oci_bind_by_name($stid, ":no", $no);

        // Eksekusi delete statement dan check result
        $success = oci_execute($stid);

        if ($success) {
            // Response Sukses
            http_response_code(200);
            header('Location: https://project.mis.pens.ac.id/mis143/View/daftar_tabel.php');
        } else {
            // Error Response
            http_response_code(500);
            echo json_encode(array('Pesan' => 'Data Gagal Dihapus'));
        }
        oci_free_statement($stid);
    

    } 
    
    // Jika method POST
    else{
        // Get data dari request body
        $data = json_decode(file_get_contents("php://input"), true);
    
        // Extract value dari data
        $judul = $data['judul'];
        $sheet = $data['sheet'];
        $status = $data['status'];
        $sumber = $data['sumber'];
    
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
    
    } 
   

} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(array('Pesan' => 'Rquest Method Tidak diijinkan'));
}

// Close koneksi Database
oci_close($con);


?>