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
 $skor_3d=0;
 $rata_prestasi_dosen = ($total_rekognisi_dosen/$total_dosen_tetap);
 $rata_prestasi_dosen = number_format($rata_prestasi_dosen,1);

 // Hitung Skor Tabel 3.d Rekognisi Dosen
 if($rata_prestasi_dosen >= 0.25){
     $skor_3d=4;
 }else if($rata_prestasi_dosen<=0.2){
     $skor_3d= 2+(8 * $rata_prestasi_dosen);
 } else {
     $skor < 2;
 }

 $keterangan='txt';
 if($skor_3d == 4){
 $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 2.b Mahasiswa Asing telah mencapai Maksimal</span>';
 }else if($skor_3d < 4){
 $keterangan = '<span style="color:yellow">Skor Tabel 2.b Mahasiswa Asing belum memenuhi target maksimal</span>';
 }else {
 $keterangan = '<span style="color:red">Skor Tabel 2.b Mahasiswa Asing Nol 0</span>';
 }



?>

<!-- Script Menghitung simulasi nilai 3d Rekognisi Dosen -->