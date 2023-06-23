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
   $rasio_3a1;
   $skor_3a1;
   $rasio_3a1 = ($total_dosen_tetap/$total_prodi);
   $rasio_3a1 = number_format($rasio_3a1, 1);

   // Hitung Skoor Tabel 3.a.1 (Kecukupan Dosen Perguruan Tinggi)
   if($rasio_3a1 >= 10){
       $skor_3a1 = 4;
   } else if($rasio_3a1 >= 5 && $rasio_3a1 < 10){
       $skor_3a1 = (2 * $rasio_3a1) / 5;
   } else {    
       $skor_3a1 = 0;
   }

//    Keterangan Skoor
$keterangan='txt';
if($skor_3a1 == 4){
   $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 3.a.1 Rasio Dosen Tetap memenuhi target maksimum</span>';
   }else if($skor_3a1 < 4 && $skor_3a1 > 0){
   $keterangan = '<span style="color:orange">Skor Tabel 3.a.1 Rasio Dosen Tetap belum memenuhi target maksimal !!</span>';
   }else {
   $keterangan = '<span style="color:red">Skor Tabel 3.a.1 Rasio Dosen Tetap 0 !!</span>';
   }

?>

<!-- Simuasi Skoor Javascript 3a1-->
<script>
    // Mendapatkan input dari form nilai_mahasiswa_aktif dan nilai_mahasiswa_asing
    document.addEventListener("DOMContentLoaded", function () {
        // Get Input Form
        var dosenTetap = document.getElementById("value_dosen_tetap");
        var totalProdi = document.getElementById("value_total_prodi");

        // Modify text
        var dosen_tetap = document.getElementById("dosen_tetap");
        var prodi = document.getElementById("prodi");
        var rasio = document.getElementById("rasio");
        var skor_3a1 = document.getElementById("skor_3a1");
        var simulasi_keterangan = document.getElementById("simulasi_keterangan");

        // Mendefinisikan fungsi untuk melakukan perhitungan tabel
        function hitung_simulasi() {
            // Mengambil nilai input dari form
            var dosen_Tetap = parseInt(dosenTetap.value);
            var total_Prodi = parseInt(totalProdi.value);

            var simulasi_rasio_3a1 = (dosen_Tetap / total_Prodi);
            simulasi_rasio_3a1 = simulasi_rasio_3a1.toFixed(1);

            // Hitung Skor Tabel Simulasi
            var simulasi_skor_3a1;
            if (simulasi_rasio_3a1 >= 10) {
                simulasi_skor_3a1 = 4;
            } else if (simulasi_rasio_3a1 >= 5 && simulasi_rasio_3a1 < 10) {
                simulasi_skor_3a1 = (2 * simulasi_rasio_3a1) / 5
            } else {
                simulasi_skor_3a1 = 0;
            }
            simulasi_skor_3a1 = simulasi_skor_3a1.toFixed(1);

            // Simulasi Keterangan
            var nilai_simulasi_keterangan;
            if (simulasi_skor_3a1 == 4) {
                nilai_simulasi_keterangan =
                    '<span style="color:green">Skoor Simulasi tabel Rasio Dosen Tetap 3.a.1 Telah Mencapai Hasil Maksimal (4)</span>';
            } else if (simulasi_skor_3a1 < 4 && simulasi_skor_3a1 > 0) {
                nilai_simulasi_keterangan =
                    '<span style="color:orange">Skoor Simulasi Tabel 3.a.1 Rasio Dosen Tetap Belum mencapai hasil maksimal !!</span>';
            } else {
                nilai_simulasi_keterangan =
                    '<span style="color:red">Skoor Simulasi Tabel 3.a.1 Rasio Dosen Tetap 0 !!</span>';;
            }

            // Menampilkan simulasi presentase 
            dosen_tetap.textContent = dosen_Tetap;
            prodi.textContent = total_Prodi;
            rasio.textContent = simulai_rasio_3a1;
            skor_3a1.textContent = simulasi_skor_3a1;
            simulasi_keterangan.innerHTML = nilai_simulasi_keterangan;
        }

        // Deklarasi Variabel dan mendengarkan perubahan dengan addEventLister
        dosenTetap.addEventListener("input", hitung_simulasi);
        totalProdi.addEventListener("input", hitung_simulasi);
    });
</script>