<?php
 // fetch api response
    $response_dosen_bersertifikasi = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.3_sertifikasi_dosen.php');
    $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
    // Decode JSON response into an associative array
    $dosen_bersertifikasi = json_decode($response_dosen_bersertifikasi, true);
    $dosen_tetap = json_decode($response_dosen_tetap, true);

    $total_dosen=0;
    $total_dosen_bersertifikasi=0;
    foreach ($dosen_bersertifikasi as $row) {
        $total_dosen += $row['Jumlah Dosen'];
        $total_dosen_bersertifikasi += $row['Jumlah Dosen Bersertifikat'];
        $total_baris = $total_dosen + $total_dosen_bersertifikasi;   
    }
    $total_dosen_tetap=0;
    foreach($dosen_tetap as $row){
        $total_dosen_tetap += $row['Doktor/Doktor Terapan'] += $row['Magister/Magister Terapan'] += $row['PROFESI'];
    }
    /* No 23  
    Hitung Tabel 3.a.3 Total Dosen Tetap Bersertifikasi
     */
    $presentase_3a3 = 0;
    $skor_3a3=0;
    $presentase_3a3 = ($total_dosen_bersertifikasi/$total_dosen_tetap) * 100;
    $presentase_3a3 = number_format($presentase_3a3, 1);

    // Hitung Skoor Presentase Jumlah Dosen Yang Memiliki sertifikat kompetensi
    if($presentase_3a3 >= 50){
        $skor_3a3 = 4;
    } else if($presentase_3a3 < 50 && $presentase_3a3 > 0 ){
        $skor_3a3 = 1 + (6 * ($presentase_3a3 / 100));
    } else if($presentase_3a3 = 0){
        $skor_3a3 = 0;
    }

// Keterangan Skoor
$keterangan='txt';
if($skor_3a3 == 4){
   $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 3.a.3 Persentase Jumlah Dosen Yang Memiliki Kompetensi/Profesi memenuhi target maksimum</span>';
   }else if($skor_3a3 < 4 && $skor_3a3 > 0){
   $keterangan = '<span style="color:orange">Skor Tabel 3.a.3 Persentase Jumlah Dosen Yang Memiliki Kompetensi/Profesi belum memenuhi target maksimal !!</span>';
   }else {
   $keterangan = '<span style="color:red">Skor Tabel 3.a.3 Persentase Jumlah Dosen Yang Memiliki Kompetensi/Profesi 0 !!</span>';
   }
?>

<!-- Simulasi Skor Javascript 3a3 -->
<script>
    // Mendapatkan input dari form 
    document.addEventListener("DOMContentLoaded", function () {
        // Get Input dari Form
        var dosenBersertifikasi = document.getElementById('value_dosen_bersertifikasi');
        var dosenTetap = document.getElementById('value_dosen_tetap');

        // Modify Tetx
        var dosen_bersertifikasi = document.getElementById('dosen_bersertifikasi');
        var dosen_tetap = document.getElementById('dosen_tetap');
        var presentase = document.getElementById('presentase');
        var skor_3a3 = document.getElementById('skor_3a3');
        var simulasi_keterangan = document.getElementById('simulasi_keterangan');

        // Fungsi untuk hitung nilai 
        function hitung_simulasi() {
            // Mengambil nilai input dari form
            var dosen_Bersertifikasi = parseInt(dosenBersertifikasi.value);
            var dosen_Tetap = parseInt(dosenTetap.value);
            presentase_3a3 = (dosen_Bersertifikasi / dosen_Tetap) * 100;
            presentase_3a3 = presentase_3a3.toFixed(1);

            // Hitung Skor Tabel Simulasi 
            var simulasi_skor_3a3;
            if (presentase_3a3 >= 50) {
                simulasi_skor_3a3 = 4;
            } else if (presentase_3a3 < 50 && presentase_3a3 > 0) {
                simulasi_skor_3a3 = 1 + (6 * (presentase_3a3 / 100));
            } else {
                simulasi_skor_3a3 < 1;
            }


            // Simulasi Keterangan
            var nilai_simulasi_keterangan;
            if (simulasi_skor_3a3 == 4) {
                nilai_simulasi_keterangan =
                    '<span style="color:green">Skoor Simulasi tabel Rasio Dosen Tetap 3.a.1 Telah Mencapai Hasil Maksimal (4)</span>';
            } else if (simulasi_skor_3a3 < 4 && simulasi_skor_3a3 > 0) {
                nilai_simulasi_keterangan =
                    '<span style="color:orange">Skoor Simulasi Tabel 3.a.1 Rasio Dosen Tetap Belum mencapai hasil maksimal !!</span>';
            } else {
                nilai_simulasi_keterangan =
                    '<span style="color:red">Skoor Simulasi Tabel 3.a.1 Rasio Dosen Tetap 0 !!</span>';
            }

            // Menampilkan simulai presentase 
            dosen_bersertifikasi.textContent = dosen_Bersertifikasi;
            dosen_tetap.textContent = dosen_Tetap;
            presentase.textContent = presentase_3a3;
            skor_3a3.textContent = simulasi_skor_3a3;
            simulasi_keterangan.innerHTML = nilai_simulasi_keterangan;
        }
        // Deklarasi variabel dan mendengarkan perubahan
        dosenBersertifikasi.addEventListener("input", hitung_simulasi);
        dosenTetap.addEventListener("input", hitung_simulasi);
    })
</script>