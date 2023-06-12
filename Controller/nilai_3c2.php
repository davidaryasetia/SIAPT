<?php
 // fetch api response
 $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.c.2_produktivitas_pkm_dosen.php');
 $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
 // Decode JSON response into an associative array
 $data = json_decode($response, true);
 $dosen_tetap = json_decode($response_dosen_tetap, true);

foreach($data as $row){
    $total_pkm= intval($row['TS-2(2017)']) + intval($row['TS-1(2018)']) + intval($row['TS(2019)']);
}

 $kolom_2=2; $nama_2="Lembaga Dalam Negeri(Diluar PT)";
$null=0;
$total_dosen_tetap=0;
foreach($dosen_tetap as $row){
    $total_dosen_tetap += $row['Doktor/Doktor Terapan'] += $row['Magister/Magister Terapan'] += $row['PROFESI'];
}
// Rata-rata pkm luar negeri
$rata_pkm_lugri=$null/3/$total_dosen_tetap;
$rata_pkm_dagri=$null/3/$total_dosen_tetap;
$rata_pkm_biaya_mandiri=$total_pkm/3/$total_dosen_tetap;
$rata_pkm_biaya_mandiri=number_format($rata_pkm_biaya_mandiri,2);

// Hitung Skor tabel pkm
$a=0.005;
$b=0.5;
$c=1;
$skor_tabel_pkm=0;
if($rata_pkm_lugri>=$a){
    $skor_tabel_pkm=0;
}else if($rata_pkm_lugri<$a && $rata_pkm_dagri>=$b){
    $skor_tabel_pkm=3+($rata_pkm_lugri/$a);
}else if($rata_pkm_lugri>0 && $rata_pkm_lugri<$a && $rata_pkm_dagri>0 && $rata_pkm_dagri<$b){
    $skor_tabel_pkm= 2 +(2*($rata_pkm_lugri/$a)) + ($rata_pkm_dagri/$b) - (($rata_pkm_lugri*$rata_pkm_dagri)/($a*$b));
} else if($rata_pkm_lugri=0 && $rata_pkm_dagri=0 && $rata_pkm_biaya_mandiri>=$c){
    $skor_tabel_pkm=2;
}else if($rata_pkm_lugri=0 && $rata_pkm_dagri=0 && $rata_pkm_biaya_mandiri<$c){
    $skor_tabel_pkm=(2*$rata_pkm_biaya_mandiri)/c;
}else{
    $skor_tabel_pkm=0;
}

?>