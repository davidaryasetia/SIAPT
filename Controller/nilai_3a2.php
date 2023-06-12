<?php
 // Fetch API jabatan akademik dosen tetap
 $response_jabatan_akademik = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.2_jabatan_akademik_dosen_tetap.php');
 $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');

 // Decode JSON response $response_jabatan_akademik & response_dosen_tetap
 $jabatan_akademik = json_decode($response_jabatan_akademik, true);
 $dosen_tetap = json_decode($response_dosen_tetap, true);

   // Hitung Kolom Jumlah Jabatan Fungsional Guru Besar, Lektor Kepala, Lektor, Asisten Ahli, Tenaga Pengajar
   $guru_besar = 0;
   $lektor_kepala = 0;
   $lektor = 0;
   $asisten_ahli = 0;
   $tenaga_pengajar = 0;
   foreach($jabatan_akademik as $row){
       $guru_besar += $row['Guru Besar'];
       $lektor_kepala += $row['Lektor Kepala'];
       $lektor += $row['Lektor'];
       $asisten_ahli += $row['Asisten Ahli'];
       $tenaga_pengajar += $row['Tenaga Pengajar'];
       $jumlah = $guru_besar + $lektor_kepala + $lektor + $asisten_ahli + $tenaga_pengajar;
   }
 // Hitung Total Dosen Tetap yang Memiliki Jabatan Fungsional
 $total_jabatan_fungsional_dosen = $guru_besar + $lektor_kepala + $lektor + $asisten_ahli;
                                                    
 // Hitung Kolom Jumlah Doktor, Magister, dan Profesi
 $doktor = 0;
 $magister = 0;
 $profesi = 0;
 $jumlah = 0;
 foreach($dosen_tetap as $row){  
     $doktor += $row['Doktor/Doktor Terapan'];
     $magister += $row['Magister/Magister Terapan'];
     $profesi += $row['PROFESI'];
     $jumlah = $doktor + $magister + $profesi;
 }

 // Hitung Total Dosen Tetap 
 $doktor = 0;
 $magister = 0;
 $profesi = 0;
 $jumlah = 0;
 foreach($dosen_tetap as $row){  
     $doktor += $row['Doktor/Doktor Terapan'];
     $magister += $row['Magister/Magister Terapan'];
     $profesi += $row['PROFESI'];
     $jumlah = $doktor + $magister + $profesi;
 }
 $total_dosen_tetap = $doktor + $magister + $profesi;

 /* 
 No 22 
 Hitung Jumlah Presentase Dosen Yang memiliki jabatan fungsional lektor kepala atau guru besar
 Tabel 3.a.2 (LKPT Jabatan Fungsional Dosen)                                                    
  */
 $presentase_jabatanfungsional_dosen;
 $skor_tabel_jabatan_fungsional;
 $presentase_jabatanfungsional_dosen=($total_jabatan_fungsional_dosen/$total_dosen_tetap) * 1;
 $presentase_jabatanfungsional_dosen = number_format($presentase_jabatanfungsional_dosen, 1);

 // Skor Tabel jabatan fungsional
 if($presentase_jabatanfungsional_dosen >= 0.25){
     $skor_tabel_jabatan_fungsional = 4;
 } else if($presentase_jabatanfungsional_dosen < 0.25){
     $skor_tabel_jabatan_fungsional = 1 + (12 * $presentase_jabatanfungsional_dosen);
 }
?>