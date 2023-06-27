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
 $total_jabatan_fungsional_dosen = $guru_besar + $lektor_kepala;
                                                    
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
 $presentase_3a2;
 $skor_3a2;
 $presentase_3a2=($total_jabatan_fungsional_dosen/$total_dosen_tetap) * 100;
 $presentase_3a2 = number_format($presentase_3a2, 1);
 // Skor Tabel jabatan fungsional
 if($presentase_3a2 >= 25){
     $skor_3a2 = 4;
 } else if($presentase_3a2 < 25 && $presentase_3a2 > 0){
     $skor_3a2 = 1 + (12 * ($presentase_3a2/100));
 } else {
    $skor_3a2 < 1;
 }
 //    Keterangan Skoor
$keterangan='txt';
if($skor_3a2 == 4){
   $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 3.a.2 Persentase Jumlah Dosen Yang Memiliki Jabatan Fungsional Minimal Lektor memenuhi target maksimum</span>';
   }else if($skor_3a2 < 4 && $skor_3a2 > 0){
   $keterangan = '<span style="color:orange">Skor Tabel 3.a.2 Persentase Jumlah Dosen Yang Memiliki Jabatan Fungsional Minimal Lektor belum memenuhi target maksimal !!</span>';
   }else {
   $keterangan = '<span style="color:red">Skor Tabel 3.a.2 Persentase Jumlah Dosen Yang Memiliki Jabatan Fungsional Minimal Lektor 0 !!</span>';
   }
?>


<!-- Simulasi Skor Javascript 3a2 -->
<script>
    // Mendapatkan input dari form 
    document.addEventListener("DOMContentLoaded", function () {
        // Get input dari form 
        var jabatanFungsional = document.getElementById('value_jabatan_fungsional');
        var dosenTetap = document.getElementById('value_dosen_tetap');

        // Modify text
        var jabatan_fungsional = document.getElementById("jabatan_fungsional");
        var dosen_tetap = document.getElementById("dosen_tetap");
        var presentase = document.getElementById('presentase');
        var skor_3a2 = document.getElementById('skor_3a2');
        var simulasi_keterangan = document.getElementById('simulasi_keterangan');

        function hitung_simulasi() {
            var jabatan_Fungsional = parseInt(jabatanFungsional.value);
            var dosen_Tetap = parseInt(dosenTetap.value);
            var simulasi_presentase_3a2 = (jabatan_Fungsional / dosen_Tetap) * 100;
            simulasi_presentase_3a2 = simulasi_presentase_3a2.toFixed(1);
            // Hitung skor simulasi 
            var simulasi_skor_3a2;
            if (simulasi_presentase_3a2 >= 25) {
                simulasi_skor_3a2 = 4;
            } else if (simulasi_presentase_3a2 <= 25 && simulasi_presentase_3a2 > 0) {
                simulasi_skor_3a2 = 1 + (12 * (simulasi_presentase_3a2 / 100));
            } else {
                simulasi_skor_3a2 = 0;
            }
            simulasi_skor_3a2 = simulasi_skor_3a2.toFixed(1);
            // Simulasi Keterangan
            var nilai_simulasi_keterangan;
            if (simulasi_skor_3a2 == 4) {
                nilai_simulasi_keterangan =
                    '<span style="color:green">Skoor Simulasi tabel 3.a.2 Jabatan Akademik Dosen Tetap Telah Mencapai Hasil Maksimal (4)</span>';
            } else if (simulasi_skor_3a2 < 4 && simulasi_skor_3a2 > 0) {
                nilai_simulasi_keterangan =
                    '<span style="color:orange">Skoor Simulasi Tabel 3.a.2 Jabatan Akademik Dosen Tetap Tetap Belum mencapai hasil maksimal !!</span>';
            } else {
                nilai_simulasi_keterangan =
                    '<span style="color:red">Skoor Simulasi Tabel 3.a.2 Jabatan Akademik Dosen Tetap Tetap 0 !!</span>';
            }

            // Menampilkan simulasi presentase ;
            jabatan_fungsional.textContent = jabatan_Fungsional;
            dosen_tetap.textContent = dosen_Tetap;
            presentase.textContent = simulasi_presentase_3a2;
            skor_3a2.textContent = simulasi_skor_3a2;
            simulasi_keterangan.innerHTML = nilai_simulasi_keterangan
        }

        // Deklarasi variabel dan mendengarkan perubahan
        jabatanFungsional.addEventListener("input", hitung_simulasi);
        dosenTetap.addEventListener("input", hitung_simulasi);

    })
</script>