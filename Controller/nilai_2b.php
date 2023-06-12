<?php
  // Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
  $response_asing = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_asing');
  $response_aktif = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_aktif');

  // Decode JSON response $response_asing & $response_aktif ke asociate array
  $mahasiswa_asing = json_decode($response_asing, true);
  $mahasiswa_aktif = json_decode($response_aktif, true);

       // Hitung Total TS-2(2017), TS-1(2018), TS(2019)
       $sum_ts2 = 0;
       $sum_ts1 = 0;
       $sum_ts = 0;
       foreach ($mahasiswa_asing as $row){
           $sum_ts2 += $row['TS-2(2017)'];
           $sum_ts1 += $row['TS-1(2018)'];
           $sum_ts += $row['TS(2019)'];
       }

       //Total Mahasiswa Asing dalam 3 tahun terakhir
       $total_mahasiswa_asing=0;
       foreach($mahasiswa_asing as $row){
           $total_mahasiswa_asing += $row['TS-2(2017)'] + $row['TS-1(2018)'] + $row['TS(2019)'];
       }

       //Total Mahasiswa Aktif dalam 3 tahun terakhir
       $total_mahasiswa_aktif=0;
       foreach($mahasiswa_aktif as $row){
           $total_mahasiswa_aktif += $row['TS-2(2017)'] + $row['TS-1(2018)'] + $row['TS(2019)'];
       }

       /* 
       No 19
       Hitung Total Presentase Jumlah Mahasiswa Asing 
       Rumus :
       presentase_mahasiswa = (total_mhs_asing/total_mhs_aktif) * 100% [100% = 1]
       Jika Presentase >= 0,5% skor = 4,
       Jika presentase < 0,5% skor = 2 + (4 * Presentase_mahasiswa)
       Jika Presentase = 0% maka skor 1 || 0
       */ 
       $presentase_mahasiswa;
       $skor_mahasiswa_asing;
       $presentase_mahasiswa = ($total_mahasiswa_asing/$total_mahasiswa_aktif) * 1;
       $presentase_mahasiswa = number_format($presentase_mahasiswa, 2); // Limit Desimal Output 3 angka

       // Hitung Skoor Tabel 2.b Mahasiswa Asing [notes 0,5% = 0,005]
       if($presentase_mahasiswa >= 0.005 ){  //[notes 0,5% = 0,005]
           $skor_mahasiswa_asing = 4;
       } else if($presentase_mahasiswa < 0.005 && $presentase_mahasiswa > 0){
           $skor_mahasiswa_asing = 2+(400 * $presentase_mahasiswa);
       } else {
           $skor_mahasiswa_asing=  0;
       }

?>