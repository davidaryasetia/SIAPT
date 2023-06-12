<?php
  // Fetch API response ?query = dosen_tetap & jumlah_prodi endpoint
  $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
  $response_jumlah_prodi = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=jumlah_prodi');

  // Decode JSON response $response_dosen_tetap & $response_jumlah_prodi
  $dosen_tetap = json_decode($response_dosen_tetap, true);
  $jumlah_prodi = json_decode($response_jumlah_prodi, true);

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
   $total_dosen_tetap= $doktor + $magister + $profesi;
                                                   
   // Hitung Jumlah Program Studi 
   $total_prodi;
   $total_prodi = count(array_unique(array_column($jumlah_prodi, 'Nomor')));

   /* No 21 
   Hitung Rasio Jumlah Dosen Tetap 
   Tabel 3.a.1 (LKPT Kecukupan Dosen Perguruan Tinggi)
   */
   $rasio_dosen;
   $skor_rasio_dosen;
   $rasio_dosen = ($total_dosen_tetap/$total_prodi);
   $rasio_dosen = number_format($rasio_dosen, 1);

   // Hitung Skoor Tabel 3.a.1 (Kecukupan Dosen Perguruan Tinggi)
   if($rasio_dosen >= 10){
       $skor_rasio_dosen = 4;
   } else if($rasio_dosen >= 5 && $rasio_dosen < 10){
       $skor_rasio_dosen = (2 * $rasio_dosen) / 5;
   } else {    
       $skor_rasio_dosen = 0;
   }
?>