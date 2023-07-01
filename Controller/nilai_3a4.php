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
$presentase_3a4=0;
$skor_3a4=0;
$presentase_3a4=($dosen_tidak_tetap/($dosen_tidak_tetap+$total_dosen_tetap)) *100;
$presentase_3a4=number_format($presentase_3a4, 1);

     // Hitung Skoor Presentase jumlah dosen tidak tetap
     if($presentase_3a4 <= 10){
        $skor_3a4 = 4;
     } else if($presentase_3a4 > 10 && $presentase_3a4 <= 40){
        $skor_3a4 = (14 - (20 * ($presentase_3a4/100))/3);
     } else {
        $skor_3a4 = 0;
     }

     //    Keterangan Skoor
$keterangan='txt';
if($skor_3a4 == 4){
   $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 3.a.4 Persentase Jumlah Dosen Tidak Tetap Terhadap Jumlah Seluruh Dosen memenuhi target maksimum</span>';
   }else if($skor_3a4 < 4 && $skor_3a4 > 0){
   $keterangan = '<span style="color:orange">Skor Tabel 3.a.4 Persentase Jumlah Dosen Tidak Tetap Terhadap Jumlah Seluruh Dosen belum memenuhi target maksimal !!</span>';
   }else {
   $keterangan = '<span style="color:red">Skor Tabel 3.a.4 Persentase Jumlah Dosen Tidak Tetap Terhadap Jumlah Seluruh Dosen 0 !!</span>';
   }
?>

<!-- Simulasi Tabel 3.a.4 Menggunakan Javascript  -->
<script>
   // Mendapatkan input dari form
   document.addEventListener("DOMContentLoaded", function () {
      // Get input dari form 
      var dosenTidaktetap = document.getElementById('value_dosen_tidaktetap');
      var dosenTetap = document.getElementById('value_dosen_tetap');

      // Modify Text
      var dosen_tidaktetap = document.getElementById('dosen_tidaktetap');
      var dosen_tetap = document.getElementById('dosen_tetap');
      var presentase = document.getElementById('presentase');
      var skor_3a4 = document.getElementById('skor_3a4');
      var simulasi_keterangan = document.getElementById('simulasi_keterangan');

      function hitung_simulasi() {
         var dosen_Tidaktetap = parseInt(dosenTidaktetap.value);
         var dosen_Tetap = parseInt(dosenTetap.value);
         var presentase_3a4 = (dosen_Tidaktetap / (dosen_Tidaktetap + dosen_Tetap)) * 100;
         presentase_3a4 = presentase_3a4.toFixed(1);

         // Hitung skor tabel 3a4
         var simulasi_skor_3a4;
         if (presentase_3a4 <= 10) {
            simulasi_skor_3a4 = 4;
         } else if (presentase_3a4 > 10 && presentase_3a4 <= 40) {
            simulasi_skor_3a4 = (14 - (20 * (presentase_3a4 / 100))) / 3;
         } else {
            simulasi_skor_3a4 = 0;
         }

         // Simulasi Keterangan
         var nilai_simulasi_keterangan;
         if (simulasi_skor_3a4 == 4) {
            nilai_simulasi_keterangan =
               '<span style="color:green">Skoor Simulasi Tabel 3.a.4 Persentase Jumlah Dosen Tidak Tetap Terhadap Jumlah Seluruh Dosen Telah Mencapai Hasil Maksimal (4)</span>';
         } else if (simulasi_skor_3a4 < 4 && simulasi_skor_3a4 > 0) {
            nilai_simulasi_keterangan =
               '<span style="color:orange">Skoor Simulasi Tabel 3.a.4 Persentase Jumlah Dosen Tidak Tetap Terhadap Jumlah Seluruh Dosen Belum mencapai hasil maksimal !!</span>';
         } else {
            nilai_simulasi_keterangan =
               '<span style="color:red">Skoor Simulasi Tabel 3.a.4 Persentase Jumlah Dosen Tidak Tetap Terhadap Jumlah Seluruh Dosen 0 !!</span>';
         }

         // Modifikasi Text
         dosen_tidaktetap.textContent = dosen_Tidaktetap;
         dosen_tetap.textContent = dosen_Tetap;
         presentase.textContent = presentase_3a4;
         skor_3a4.textContent = simulasi_skor_3a4;
         simulasi_keterangan.innerHTML = nilai_simulasi_keterangan;
      }
      // Mendengarkan perubahan dengan addEventListener
      dosenTidaktetap.addEventListener("input", hitung_simulasi);
      dosenTetap.addEventListener("input", hitung_simulasi);

   })
</script>