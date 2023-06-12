<?php
// Include Koneksi
include "../includes/func.inc.php";

// Koneksi ke Db
$con = konekDb($db_user, $db_pass);

// Set headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Check jika request method === GET
if($_SERVER['REQUEST_METHOD']==='GET'){
    // Cek jika no parameter disediakan oleh GET request
    if(isset($_GET['no'])){
        $no = $_GET['no'];

        //API Endponint 1 Tabel Data 3.D Rekognisi Dosen
        $query = 'SELECT NO, NAMA, BIDANG_KEAHLIAN, REKOGNISI, TINGKAT, TAHUN
                    FROM REKOGNISI_DOSEN
                    WHERE NO = :no';

        $stid = oci_parse($con, $query);

        // Bind value to the statement
        oci_bind_by_name($stid, ":no", $no);

        oci_execute($stid);

        // Fetch row dan store data di array
        $data = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);

        oci_free_statement($stid);
        // Kirim response untuk fetched dat
        if($data !== false){
            http_response_code(200);
            echo json_encode($data);
        }else{
            http_response_code(404);
            echo json_encode(array('Pesan' => 'Data Tidak Ditemukan'));
        }
    } else{
        // Tabel Data 3.D Rekognisi Dosen 
        $query = 'SELECT NO, NAMA, BIDANG_KEAHLIAN, REKOGNISI, TINGKAT, TAHUN
                    FROM REKOGNISI_DOSEN
                    ORDER BY NO';

        $stid = oci_parse($con, $query);
        oci_execute($stid);
        $data = array();

        // Fetch row dan store di array
        while(($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false){
            $data[] = $row;
        }
        oci_free_statement($stid);

        // Kirim response untuk fetched data
        http_response_code(200);
        echo json_encode($data);
    }
    
} else if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Jika mthod = PUT
    if(isset($_POST['_method']) && $_POST['_method'] === 'PUT'){
        // Put request(update)
        $no = $_POST['no'];
        $nama = $_POST['nama'];
        $bidang_keahlian = $_POST['bidang_keahlian'];
        $rekognisi = $_POST['rekognisi'];
        $tingkat = $_POST['tingkat'];
        $tahun = $_POST['tahun'];

        // Update SQL statement
        $query = 'UPDATE REKOGNISI_DOSEN
        SET NAMA=:nama, BIDANG_KEAHLIAN=:bidang_keahlian, REKOGNISI=:rekognisi, TINGKAT=:tingkat, TAHUN=:tahun
        WHERE NO=:no';
        $stid = oci_parse($con, $query);

        // Bind value from statement 
        oci_bind_by_name($stid, ":no", $no);
        oci_bind_by_name($stid, ":nama", $nama);
        oci_bind_by_name($stid, ":bidang_keahlian", $bidang_keahlian);
        oci_bind_by_name($stid, ":rekognisi", $rekognisi);
        oci_bind_by_name($stid, ":tingkat", $tingkat);
        oci_bind_by_name($stid, ":tahun", $tahun);

        // Execute update statement and check result
        $success = oci_execute($stid);
        if($success){
            // Response sukse
            http_response_code(200);
            header('Location:https://project.mis.pens.ac.id/mis143/3d.php');
            // echo json_encode(array('Pesan' => 'Data Berhasil di edit'));
        }else{
            // Response error
            http_response_code(500);
            echo json_encode(array('Pesan' => 'Data Gagal Diperbaharui'));
        }
        oci_free_statement($stid);
     
        // Jika _method = DELETE
    }else if(isset($_POST['_method']) && $_POST['_method'] === 'DELETE'){
        // Delete request
        $no = $_POST['no'];

        // Delete statement
        $query = 'DELETE FROM REKOGNISI_DOSEN
        WHERE NO=:no';
        $stid = oci_parse($con, $query);

        // Bind value from statement
        oci_bind_by_name($stid, ":no", $no);

        // Eksekusi delete statement dan check result
        $success = oci_execute($stid);

        if ($success) {
            // Response Sukses
            // http_response_code(200);
            header('Location: https://project.mis.pens.ac.id/mis143/3d.php');
        } else {
            // Error Response
            http_response_code(500);
            echo json_encode(array('Pesan' => 'Data Gagal Dihapus'));
        }
        oci_free_statement($stid);

        // Jika method POST
    } else {
        // Get data dari request body
        $data = json_decode(file_get_contents("php://input"), true);

        // Extract value dari data
        $nama = $data['nama'];
        $bidang_keahlian = $data['bidang_keahlian'];
        $rekognisi = $data['rekognisi'];
        $tingkat = $data['tingkat'];
        $tahun = $data['tahun'];

         // Check jika variable NO sudah ada
         $queryCheck = 'SELECT COUNT(*) FROM REKOGNISI_DOSEN WHERE NO = :no';
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
             $querySeq = 'SELECT REKOGNISI_SEQ.NEXTVAL FROM DUAL';
             $stidSeq = oci_parse($con, $querySeq);
             oci_execute($stidSeq);
             $rowSeq = oci_fetch_array($stidSeq, OCI_ASSOC);
             $no = $rowSeq['NEXTVAL'];

            //  Insert Statement SQL 
            $query = 'INSERT INTO REKOGNISI_DOSEN(NO, NAMA, BIDANG_KEAHLIAN, REKOGNISI, TINGKAT, TAHUN) 
                        VALUES(:no, :nama, :bidang_keahlian, :rekognisi, :tingkat, :tahun)';

                        $stid = oci_parse($con, $query);

                        // Bind value to statement 
                        oci_bind_by_name($stid, ":no", $no);
                        oci_bind_by_name($stid, ":nama", $nama);
                        oci_bind_by_name($stid, ":bidang_keahlian", $bidang_keahlian);
                        oci_bind_by_name($stid, ":rekognisi", $rekognisi);
                        oci_bind_by_name($stid, ":tingkat", $tingkat);
                        oci_bind_by_name($stid, ":tahun", $tahun);

                        // Ekeskusi insert statement
                        $success = oci_execute($stid);

                        if($success){
                            // Response Sukses
                            http_response_code(200);
                            echo json_encode(array('Pesan' => 'Data Sukses Ditambahkan'));
                        }else{
                            // Error Response
                            http_response_code(500);
                            echo json_encode(array('Pesan' => 'Data Gagal Ditambahkan'));
                        }
                        oci_free_statement($stid);
                        oci_free_statement($stidSeq);
     
        }
    oci_free_statement($stidCheck);
}
}else {
    // Invalid Request Method
    http_response_code(405);
    echo json_encode(array('Pesan' => 'Request Method tidak diijinkan'));
}

// Close Koneksi ke Database
oci_close($con);
?>