<?php
 // fetch api response
 $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.c_kredit_mata_kuliah.php');
 // Decode JSON response into an associative array
 $data = json_decode($response, true);
 
 // Tambah Row $total_teori, $total_praktikum, $total_praktik, $total_pkl
 $total_teori = 0;
 $total_praktikum = 0;
 $total_praktik = 0;
 $total_pkl = 0;
 $total_kolom = 0;

 foreach($data as $row){
     $total_teori += $row['Teori'];
     $total_praktikum += $row['Praktikum'];
     $total_praktik += $row['Praktik'];
     $total_pkl += $row['PKL'];
 }

 // Total Kolom 
 $total_kolom = $total_teori + $total_praktikum + $total_praktik + $total_pkl;

 /*No 40
 Hitung Presentase Jumlah Kredit Mata Kuliah
 */
 $presentase_kredit_matakuliah = 0;
 $total_kredit_praktik = 0;
 $total_seluruh_kredit = 0;
 $skor_kredit_matakuliah = 0;

 $total_kredit_praktik = $total_praktikum+$total_praktik+$total_pkl;
 $total_seluruh_kredit = $total_teori+$total_praktikum+$total_praktik+$total_pkl;
 $presentase_kredit_matakuliah = ($total_kredit_praktik/$total_seluruh_kredit)*1;
 $presentase_kredit_matakuliah = number_format($presentase_kredit_matakuliah, 3);
 
 
 // Hitung Skoor $skor_kredit_matakuliah
 if($presentase_kredit_matakuliah >= 0.5 && $presentase_kredit_matakuliah <= 0.7 ){
     $skor_kredit_matakuliah = 4;
 } else if($presentase_kredit_matakuliah < 0.5 ){
     $skor_kredit_matakuliah = 8 * $presentase_kredit_matakuliah;
 } else if($presentase_kredit_matakuliah > 0.7){
     $skor_kredit_matakuliah = (40 - (40 * $presentase_kredit_matakuliah))/3;
 }
 
 $skor_kredit_matakuliah = number_format($skor_kredit_matakuliah, 1);
?>