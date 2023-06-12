<?php
 // fetch api response
 $response_dosen_tidaktetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.4_dosen_tidak_tetap.php');
 $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
 // Decode JSON response into an associative array
 $dosen_tidaktetap = json_decode($response_dosen_tidaktetap, true);
 $dosen_tetap = json_decode($response_dosen_tetap, true);


 $kolom_2=2; $nama_2="Magister/Magister Terapan";
 $null=0;
 foreach($dosen_tidaktetap as $row){
     // Total Query
     $dosen_tidak_tetap= intval($row['Guru Besar']) + intval($row['Lektor Kepala']) + intval($row['Lektor']) + intval($row['Asisten Ahli']) + intval($row['Tenaga Pengajar']);
 }
   /*
No 24 
Hitung Tabel 3.a.4 LKPT Dosen Tidak Tetap 
*/
$total_dosen_tetap=0;
foreach($dosen_tetap as $row){
$total_dosen_tetap += $row['Doktor/Doktor Terapan'] += $row['Magister/Magister Terapan'] += $row['PROFESI'];
}
$presentase_dosen_tidak_tetap=0;
$skor_dosen_tidak_tetap=0;
$presentase_dosen_tidak_tetap=($dosen_tidak_tetap/($dosen_tidak_tetap+$total_dosen_tetap)) *1;
$presentase_dosen_tidak_tetap=number_format($presentase_dosen_tidak_tetap, 3);

     // Hitung Skoor Presentase jumlah dosen tidak tetap
     if($presentase_dosen_tidak_tetap < 0.1){
         $skor_dosen_tidak_tetap=4;
     }else if($presentase_dosen_tidak_tetap < 0.4 && $presentase_dosen_tidak_tetap > 0.1){
         $skor_dosen_tidak_tetap=(14-(20*$presentase_dosen_tidak_tetap))/3;
     }else if($presentase_dosen_tidak_tetap>0.4){
         $skor_dosen_tidak_tetap=0;
     }
?>