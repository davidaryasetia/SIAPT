<?php
 // fetch api response
 $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.c.1_produktivitas_penelitian_dosen.php');
 $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
 // Decode JSON response into an associative array
 $data = json_decode($response, true);
 $dosen_tetap = json_decode($response_dosen_tetap, true);

 $total_dosen_tetap=0;
 foreach($dosen_tetap as $row){
     $total_dosen_tetap += $row['Doktor/Doktor Terapan'] += $row['Magister/Magister Terapan'] += $row['PROFESI'];
 }
 foreach($data as $row){
     // Total Query
     $total_penelitian= intval($row['TS-2(2017)']) + intval($row['TS-1(2018)']) + intval($row['TS(2019)']);
 }

 $kolom_2=2; $nama_2="Lembaga Dalam Negeri(Diluar PT)";
 $null=0;
 // Rata-rata penelitian luar negeri
 $rata_penelitan_lugri=$null/3/$total_dosen_tetap;
 $rata_penelitan_dagri=$null/3/$total_dosen_tetap;
 $rata_penelitian_biaya_mandiri=$total_penelitian/3/$total_dosen_tetap;
 $rata_penelitian_biaya_mandiri=number_format($rata_penelitian_biaya_mandiri,2);

 // Hitung Skor tabel Penelitian
 $a=0.005;
 $b=0.5;
 $c=1;
 $skor_tabel_penelitian=0;
 if($rata_penelitan_lugri>=$a){
     $skor_tabel_penelitian=0;
 }else if($rata_penelitan_lugri<$a && $rata_penelitan_dagri>=$b){
     $skor_tabel_penelitian=3+($rata_penelitan_lugri/$a);
 }else if($rata_penelitan_lugri>0 && $rata_penelitan_lugri<$a && $rata_penelitan_dagri>0 && $rata_penelitan_dagri<$b){
     $skor_tabel_penelitian= 2 +(2*($rata_penelitan_lugri/$a)) + ($rata_penelitan_dagri/$b) - (($rata_penelitan_lugri*$rata_penelitan_dagri)/($a*$b));
 } else if($rata_penelitan_lugri=0 && $rata_penelitan_dagri=0 && $rata_penelitian_biaya_mandiri>=$c){
     $skor_tabel_penelitian=2;
 }else if($rata_penelitan_lugri=0 && $rata_penelitan_dagri=0 && $rata_penelitian_biaya_mandiri<$c){
     $skor_tabel_penelitian=(2*$rata_penelitian_biaya_mandiri)/c;
 }else{
     $skor_tabel_penelitian=0;
 }
?>