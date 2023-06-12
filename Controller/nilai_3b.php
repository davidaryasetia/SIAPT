<?php
 // fetch api response
 $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.b_rasio_dosen_terhadap_mahasiswa.php');
 // Decode JSON response into an associative array
 $data = json_decode($response, true);

 
?>