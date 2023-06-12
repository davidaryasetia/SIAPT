<?php

 // fetch api response

 $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
 $response_rekognisi_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php');
 $response_jumlah_rekognisi = file_get_contents('https://project.mis.pens.ac.id/mis143/API/status_sumber_data.php?query=jumlah_rekognisi');
 // Decode JSON response into an associative array
 $dosen_tetap = json_decode($response_dosen_tetap, true);
 $rekognisi_dosen = json_decode($response_rekognisi_dosen, true);
 $jumlah_rekognisi=json_decode($response_jumlah_rekognisi, true);



 foreach ($jumlah_rekognisi as $data_rekognisi) {
     $total_rekognisi_dosen = $data_rekognisi['Jumlah Rekognisi'];
 }   
 
 $total_dosen_tetap=0;
 foreach($dosen_tetap as $row){
     $total_dosen_tetap += $row['Doktor/Doktor Terapan'] += $row['Magister/Magister Terapan'] += $row['PROFESI'];
 }
 /*
 Hitung Rumus No 28 Tabel 3.d Rekognisi Dosen
 */
 $rata_prestasi_dosen=0;
 $skor_tabel_rekognisi_dosen=0;
 $rata_prestasi_dosen = ($total_rekognisi_dosen/$total_dosen_tetap);
 $rata_prestasi_dosen = number_format($rata_prestasi_dosen,1);

 // Hitung Skor Tabel 3.d Rekognisi Dosen
 if($rata_prestasi_dosen >= 0.25){
     $skor_tabel_rekognisi_dosen=4;
 }else if($rata_prestasi_dosen<=0.2){
     $skor_tabel_rekognisi_dosen= 2+(8 * $rata_prestasi_dosen);
 } else {
     $skor < 2;
 }

?>