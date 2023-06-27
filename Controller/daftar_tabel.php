<?php
                        
// fetch api response
$tabel_lkpt = file_get_contents('https://project.mis.pens.ac.id/mis143/API/TABEL_LKPT.php');
$response_data_lengkap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/status_sumber_data.php?query=data_lengkap');
$response_data_tidak_lengkap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/status_sumber_data.php?query=data_tidak_lengkap');
$response_data_tidaktersedia = file_get_contents('https://project.mis.pens.ac.id/mis143/API/status_sumber_data.php?query=data_tidak_tersedia');
$response_data_db_mis = file_get_contents('https://project.mis.pens.ac.id/mis143/API/status_sumber_data.php?query=data_db_mis');
$response_data_dummy = file_get_contents('https://project.mis.pens.ac.id/mis143/API/status_sumber_data.php?query=data_dummy');
// Decode JSON response into an associative array
$data_lkpt = json_decode($tabel_lkpt, true);
$data_lengkap = json_decode($response_data_lengkap, true);
$data_tidak_lengkap = json_decode($response_data_tidak_lengkap, true);
$data_tidak_tersedia = json_decode($response_data_tidaktersedia, true);
$data_db_mis = json_decode($response_data_db_mis, true);
$data_dummy = json_decode($response_data_dummy, true);

 // Hitung Jumlah Data Lengkap, Tidak Lengkap, Tidak Tersedia, dummy, mis
 foreach ($data_lengkap as $data) {
    $total_data_lengkap = $data['Data Lengkap'];
}
foreach ($data_tidak_lengkap as $data) {
    $total_data_tidaklengkap = $data['Data Tidak Lengkap'];
}
foreach ($data_tidak_tersedia as $data) {
    $total_data_tidaktersedia = $data['Data Tidak Tersedia'];
}
foreach ($data_db_mis as $data) {
    $total_data_mis = $data['Data DB MIS'];
}
foreach ($data_dummy as $data) {
    $total_data_dummy = $data['Data Dummy'];
}



?>