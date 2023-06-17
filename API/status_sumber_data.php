<?php

// Link Ke file Koneksi.php
include "koneksi.php";


// Set Headers
header('Access-Control-Allow-Origin: *');
header('content-type: application/json');

// API endpoint 1 -> Hitung Status Data Lengkap
function data_lengkap(){
    $database = new koneksi();

    // Query hitung data lengkap
    $query='SELECT COUNT(STATUS) AS "Data Lengkap"
            FROM TABEL_LKPT
            WHERE STATUS=\'Data Lengkap\'';

            // Eksekusi Query 
            $hasil = $database->executeQuery($query);

            // Set response 200 ok
            http_response_code(200);

            // Set header parse to json
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            // Output result json
            echo json_encode($hasil);
}
// API endpoint 2-> Hitung Status Data Tidak Lengkap
function data_tidak_lengkap(){
    $database = new koneksi();

    // Query hitung data lengkap
    $query='SELECT COUNT(STATUS) AS "Data Tidak Lengkap"
            FROM TABEL_LKPT
            WHERE STATUS=\'Data Tidak Lengkap\'';

            // Eksekusi Query 
            $hasil = $database->executeQuery($query);

            // Set response 200 ok
            http_response_code(200);

            // Set header parse to json
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            // Output result json
            echo json_encode($hasil);
}
// API endpoint 3-> Hitung Status Data Tidak Tersedia
function data_tidak_tersedia(){
    $database = new koneksi();

    // Query hitung data lengkap
    $query='SELECT COUNT(STATUS) AS "Data Tidak Tersedia"
            FROM TABEL_LKPT
            WHERE STATUS=\'Data Tidak Tersedia\'';

            // Eksekusi Query 
            $hasil = $database->executeQuery($query);

            // Set response 200 ok
            http_response_code(200);

            // Set header parse to json
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            // Output result json
            echo json_encode($hasil);
}
// API endpoint 4-> Hitung Sumber Data DB MIS
function data_db_mis(){
    $database = new koneksi();

    // Query hitung data lengkap
    $query='SELECT COUNT(SUMBER) AS "Data DB MIS"
            FROM TABEL_LKPT
            WHERE SUMBER=\'Data DB MIS\'';

            // Eksekusi Query 
            $hasil = $database->executeQuery($query);

            // Set response 200 ok
            http_response_code(200);

            // Set header parse to json
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            // Output result json
            echo json_encode($hasil);
}
// API endpoint 5-> Hitung Sumber Data DB MIS
function data_dummy(){
    $database = new koneksi();

    // Query hitung data lengkap
    $query='SELECT COUNT(SUMBER) AS "Data Dummy"
            FROM TABEL_LKPT
            WHERE SUMBER=\'Data Dummy\'';

            // Eksekusi Query 
            $hasil = $database->executeQuery($query);

            // Set response 200 ok
            http_response_code(200);

            // Set header parse to json
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            // Output result json
            echo json_encode($hasil);
}

// Api endpoint 5 -> Hitung Jumlah Data Rekognisi Dosen
function jumlah_rekognisi(){
    $database = new koneksi();

    // Query untuk hitung data rekognisi
    $query = 'SELECT COUNT(REKOGNISI) AS "Jumlah Rekognisi"
    FROM REKOGNISI_DOSEN';

    // Eksekusi Query 
    $hasil = $database->executeQuery($query);

    // Set response 200 ok
    http_response_code(200);

    // Set header parse to json
    header('Access-Control-Allow-Origin: *');
    header('Content-Type:application/json');

    // Output result json
    echo json_encode($hasil);
}

// API endpoint 6 -> Tampil Sheet Pagination 
function pagination(){
    $database = new koneksi();

    // Query tampil pagination 
    $query = 'SELECT SHEET AS "Nama Sheet"
    FROM TABEL_LKPT
    ORDER BY 1';

    // Eksekusi Query 
    $hasil = $database->executeQuery($query);

    // Set response 200 ok 
    http_response_code(200);

    // Set header parse to json
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Output result json 
    echo json_encode($hasil);

}

// Route API ke titik akhir endpoint 
if(isset($_GET['query'])){
    $query = $_GET['query'];

    switch($query){
        case 'data_lengkap';
            data_lengkap();
            break;
        case 'data_tidak_lengkap';
            data_tidak_lengkap();
            break;
        case 'data_tidak_tersedia';
            data_tidak_tersedia();
            break;
        case 'data_db_mis';
            data_db_mis();
            break;
        case 'data_dummy';
            data_dummy();
            break;
        case 'jumlah_rekognisi';
            jumlah_rekognisi();
            break;
        case 'pagination';
            pagination();
            break;
            default;
            // Jika query parameter tidak valid maka return http 404 method not allowed
            http_response_code(404);
            echo json_encode(array(
                'error' => 'Query paramater tidak valid'
            ));
            break;
    }
}
else{
    //Jika query parameter tidak ditemukan - Maka return 400 Bad request response
    http_response_code(400);
    echo json_encode(array(
        'error'=>'Masukkan valid Query Paramaeter'
    ));
}

?>