<?php
 // fetch api response
 $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.c_kredit_mata_kuliah.php');
 // Decode JSON response into an associative array
 $data = json_decode($response, true);
 
 // Tambah Row $total_teori, $total_praktikum, $total_praktik, $total_pkl
 $total_teori = 0;
 $total_praktikum = 0;
 $total_praktik = 0;
 $total_pkl = 0;
 $total_kolom = 0;

 foreach($data as $row){
     $total_teori += $row['Teori'];
     $total_praktikum += $row['Praktikum'];
     $total_praktik += $row['Praktik'];
     $total_pkl += $row['PKL'];
 }

 // Total Kolom 
 $total_kolom = $total_teori + $total_praktikum + $total_praktik + $total_pkl;

 /*No 40
 Hitung Presentase Jumlah Kredit Mata Kuliah
 */
 $presentase_2c = 0;
 $total_kredit_praktik = 0;
 $total_seluruh_kredit = 0;


 $total_kredit_praktik = $total_praktikum+$total_praktik+$total_pkl;
 $total_seluruh_kredit = $total_teori+$total_praktikum+$total_praktik+$total_pkl;
 $presentase_2c = ($total_kredit_praktik/$total_seluruh_kredit)*100;
 $presentase_2c = number_format($presentase_2c, 1);
 
 
 // Hitung Skoor $skor_kredit_matakuliah
 $skor_2c;
 if($presentase_2c >= 50 && $presentase_2c <= 70 ){
     $skor_2c= 4;
 } else if($presentase_2c < 50 ){
     $skor_2c= 8 * ($presentase_2c/100);
 } else if($presentase_2c > 70){
     $skor_2c= (40 - (40 * $presentase_2c))/3;
 } else {
    $skor_2c = 0;
 }

 $skor_2c = number_format($skor_2c, 1);


 
 $keterangan='txt';
 if($skor_2c == 4){
    $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 2.c Kredit Mata Kuliah Telah Mencapai Maksimum</span>';
    }else if($skor_2c < 4 && $skor_2c > 0){
    $keterangan = '<span style="color:Orange">Skor Tabel 2.c Kredit Mata Kuliah Belum Mencapai Hasil Maksimal !!</span>';
    }else {
    $keterangan = '<span style="color:red">Skor Tabel 2.c Kosong 0 !!</span>';
    }


?>

<!-- Javascript Simulasi Nilai 2.c -->
<script>
    // Mendapatkan input dari form nilai_mahasiswa_aktif dan nilai_mahasiswa_asing
    document.addEventListener("DOMContentLoaded", function () {
        var total_praktik = document.getElementById("total_kredit_praktik");
        var total_sks = document.getElementById("total_seluruh_kredit");
        var praktik = document.getElementById("praktik");
        var sks = document.getElementById("sks");
        var presentase_2c = document.getElementById("presentase_2c");
        var skor_2c = document.getElementById("skor_2c");
        var simulasi_keterangan = document.getElementById("simulasi_keterangan");

        // Mendefinisikan fungsi untuk melakukan perhitungan tabel
        function hitung_simulasi() {
            // Mengambil nilai input dari form
            var value_praktik = parseInt(total_praktik.value);
            var value_sks = parseInt(total_sks.value);

            // Melakukan perhitungan nilai
            var simulasi_presentase_2c = (value_praktik / value_sks) * 100;
            simulasi_presentase_2c = simulasi_presentase_2c.toFixed(1);

            // Hitung Skor Tabel Simulasi
            var simulasi_skor_2c;
            if (simulasi_presentase_2c >= 50 && simulasi_presentase_2c <= 70) {
                simulasi_skor_2c = 4;
            } else if (simulasi_presentase_2c > 70) {
                simulasi_skor_2c = (40 - (40 * (simulasi_presentase_2c / 100))) / 3
            } else if (simulasi_presentase_2c < 50) {
                simulasi_skor_2c = (8 * (simulasi_presentase_2c / 100));
            } else {
                simulasi_skor_2c = 0;
            }
            simulasi_skor_2c = simulasi_skor_2c.toFixed(1);

            // Simulasi Keterangan
            var nilai_simulasi_keterangan;
            if (simulasi_skor_2c == 4) {
                nilai_simulasi_keterangan =
                    '<span style="color:green">Skoor Simulasi tabel 2.c Telah Mencapai Hasil Maksimal</span>';
            } else if (simulasi_skor_2c < 4 && simulasi_skor_2c > 0) {
                nilai_simulasi_keterangan =
                    '<span style="color:orange">Skoor Simulasi Tabel 2.c Belum mencapai hasil maksimal !!</span>';
            } else if (simulasi_skor_2c == 0) {
                nilai_simulasi_keterangan = '<span style="color:red">Tidak terdapat Skoor 0 !!</span>';
            } else {
                nilai_simulasi_keterangan = 0;
            }

            // Menampilkan simulasi presentase 
            praktik.textContent = value_praktik;
            sks.textContent = value_sks;
            presentase_2c.textContent = simulasi_presentase_2c;
            skor_2c.textContent = simulasi_skor_2c;
            simulasi_keterangan.innerHTML = nilai_simulasi_keterangan;
        }

        // Deklarasi Variabel dan mendengarkan perubahan dengan addEventLister
        total_praktik.addEventListener("input", hitung_simulasi);
        total_sks.addEventListener("input", hitung_simulasi);
    });
</script>