<?php
 // fetch api response
 $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
 $response_rekognisi_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php');
 $response_jumlah_rekognisi = file_get_contents('https://project.mis.pens.ac.id/mis143/API/status_sumber_data.php?query=jumlah_rekognisi');
 // Decode JSON response into an associative array
 $dosen_tetap = json_decode($response_dosen_tetap, true);
 $rekognisi_dosen = json_decode($response_rekognisi_dosen, true);
 $jumlah_rekognisi=json_decode($response_jumlah_rekognisi, true);

 $total_rekognisi_dosen=0;
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
 $rata_prestasi_dosen = number_format($rata_prestasi_dosen, 2);


 // Hitung Skor Tabel 3.d Rekognisi Dosen
 if($rata_prestasi_dosen >= 0.25){
     $skor_3d=4;
 }else if($rata_prestasi_dosen<0.25 && $rata_prestasi_dosen>0 ){
     $skor_3d= 2+(8 * $rata_prestasi_dosen);
 } else {
     $skor_3d < 2;
 }

 $keterangan='txt';
 if($skor_3d == 4){
 $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 3.d Rekognisi Dosen telah mencapai Maksimal</span>';
 }else if($skor_3d < 4 && $skor_3d > 0){
 $keterangan = '<span style="color:orange">Skor Tabel 3.d Rekognisi Dosen belum memenuhi target maksimal !!</span>';
 }else {
 $keterangan = '<span style="color:red">Skor Tabel 3.d Rekognisi Dosen Nol 0</span>';
 }
?>

<!-- Simulasi Skor Javascript 3d -->
<script>
    // Mendapatkan input dari form
    document.addEventListener("DOMContentLoaded", function () {
        // Get input dari form
        var rekognisiDosen = document.getElementById('value_rekognisi_dosen');
        var dosenTetap = document.getElementById('value_dosen_tetap');

        // Modifikasi Text
        var rekognisi_dosen = document.getElementById('rekognisi_dosen');
        var dosen_tetap = document.getElementById('dosen_tetap');
        var rata = document.getElementById('rata');
        var skor_3d = document.getElementById('skor_3d');
        var simulasi_keterangan = document.getElementById('simulasi_keterangan');

        function hitung_simulasi() {
            var rekognisi_Dosen = parseInt(rekognisiDosen.value);
            var dosen_Tetap = parseInt(dosenTetap.value);
            var simulasi_rata_3d = (rekognisi_Dosen / dosen_Tetap);
            simulasi_rata_3d = simulasi_rata_3d.toFixed(2);

            // Hitung skor simulasi 
            var simulasi_skor_3d;
            if (simulasi_rata_3d >= 0.25) {
                simulasi_skor_3d = 4;
            } else if (simulasi_rata_3d < 0.25 && simulasi_rata_3d > 0) {
                simulasi_skor_3d = 2 + (8 * simulasi_rata_3d);
            } else {
                simulasi_skor_3d < 2;
            }
            var simulasi_skor_3d;
            var nilai_simulasi_keterangan;
            if (simulasi_skor_3d == 4) {
                nilai_simulasi_keterangan =
                    '<span style="color:green">Skoor Simulasi tabel 3.d Rekognisi Dosen Tetap Telah Mencapai Hasil Maksimal (4)</span>';
            } else if (simulasi_skor_3d < 4 && simulasi_skor_3d > 0) {
                nilai_simulasi_keterangan =
                    '<span style="color:orange">Skoor Simulasi Tabel 3.d Rekognisi Dosen Tetap Tetap Belum mencapai hasil maksimal !!</span>';
            } else {
                nilai_simulasi_keterangan =
                    '<span style="color:red">Skoor Simulasi Tabel 3.d Rekognisi Dosen Tetap Tetap 0 !!</span>';
            }
            // Menampilkan simulasi presentase
            rekognisi_dosen.textContent = rekognisi_Dosen;
            dosen_tetap.textContent = dosen_Tetap;
            rata.textContent = simulasi_rata_3d;
            skor_3d.textContent = simulasi_skor_3d;
            simulasi_keterangan.innerHTML = nilai_simulasi_keterangan;
        }

        // Deklarasi variabel untuk mendengarkan perubahan
        rekognisiDosen.addEventListener("input", hitung_simulasi);
        dosenTetap.addEventListener("input", hitung_simulasi);

    })
</script>