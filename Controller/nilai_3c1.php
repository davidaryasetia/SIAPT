<?php
 // fetch api response
 $response_penelitian = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.c.1_produktivitas_penelitian_dosen.php');
 $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
 // Decode JSON response into an associative array
 $data = json_decode($response_penelitian, true);
 $dosen_tetap = json_decode($response_dosen_tetap, true);

 $total_dosen_tetap=0;
 foreach($dosen_tetap as $row){
     $total_dosen_tetap += $row['Doktor/Doktor Terapan'] += $row['Magister/Magister Terapan'] += $row['PROFESI'];
 }
 foreach($data as $row){
     // Total Query
     $total_penelitian_mandiri= intval($row['TS-2(2017)']) + intval($row['TS-1(2018)']) + intval($row['TS(2019)']);
 }

 $kolom_2=2; $nama_2="Lembaga Dalam Negeri(Diluar PT)";
 $null=0;
 // Rata-rata penelitian luar negeri
 $rata_penelitian_lugri=$null/3/$total_dosen_tetap;
 $rata_penelitian_dagri=$null/3/$total_dosen_tetap;
 $rata_penelitian_biaya_mandiri=$total_penelitian_mandiri/3/$total_dosen_tetap;
 $rata_penelitian_biaya_mandiri=number_format($rata_penelitian_biaya_mandiri,1);

 // Hitung Skor tabel penelitian
 $a=0.005;
 $b=0.5;
 $c=1;
 $skor_3c1 = 0;

 if($rata_penelitian_lugri >= $a){
    $skor_3c1 = 4;
 } else if ($rata_penelitian_lugri < $a && $rata_penelitian_dagri >= $b){
    $skor_3c1 = 3 + ($rata_penelitian_lugri / $a);
 } else if ($rata_penelitian_lugri < $a && $rata_penelitian_lugri > 0 && $rata_penelitian_dagri < $b && $rata_penelitian_lugri >  0){
    $skor_3c1 = (2 + (2 * ($rata_penelitian_lugri/$a)) + ($rata_penelitian_dagri/$b) - (($rata_penelitian_lugri * $rata_penelitian_dagri) / ($a * $b)) );
 } else if ($rata_penelitian_lugri == 0 && $rata_penelitian_dagri == 0 && $rata_penelitian_biaya_mandiri >= $c){
    $skor_3c1 = 2;
 } else{
    $skor_3c1 = (2 * $rata_penelitian_biaya_mandiri) / $c;
 } 

 $keterangan='txt';
 if($skor_3c1 == 4){
    $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 3.c.1 Produktivitas Penelitian Dosen memenuhi target maksimum</span>';
    }else if($skor_3c1 < 4 && $skor_3c1 > 0){
    $keterangan = '<span style="color:orange">Skor Tabel 3.c.1 Produktivitas Penelitian Dosen belum memenuhi target maksimal !!</span>';
    }else {
    $keterangan = '<span style="color:red">Skor Tabel 3.c.1 Produktivitas Penelitian Dosen 0 !!</span>';
    }
?>

<!-- Simulasi Javascript 3.c.1 Penelitian Dosen -->
<script>
    // Mendapatkan input dari form
    document.addEventListener("DOMContentLoaded", function () {
        // Get input dari form 
        var penelitianLugri = document.getElementById('value_penelitian_lugri');
        var penelitianDagri = document.getElementById('value_penelitian_dagri');
        var penelitianMandiri = document.getElementById('value_penelitian_mandiri');
        var dosenTetap = document.getElementById('value_dosen_tetap');

        // Modifikasi Text
        var penelitian_lugri = document.getElementById('penelitian_lugri');
        var penelitian_dagri = document.getElementById('penelitian_dagri');
        var penelitian_mandiri = document.getElementById('penelitian_mandiri');
        var dosen_tetap = document.getElementById('dosen_tetap');
        var rata_penelitian_lugri = document.getElementById('rata_penelitian_lugri');
        var rata_penelitian_dagri = document.getElementById('rata_penelitian_dagri');
        var rata_penelitian_mandiri = document.getElementById('rata_penelitian_mandiri');
        var skor = document.getElementById('skor');
        var simulasi_keterangan = document.getElementById('simulasi_keterangan');

        function hitung_simulasi() {
            // Mengambil nilai input dari form 
            var penelitian_Lugri = parseInt(penelitianLugri.value);
            var penelitian_Dagri = parseInt(penelitianDagri.value);
            var penelitian_Mandiri = parseInt(penelitianMandiri.value);
            var dosen_Tetap = parseInt(dosenTetap.value);

            // Deklarasi Variabel Rata-Rata & skor & Faktor
            var rata_penelitian_Lugri;
            var rata_penelitian_Dagri;
            var rata_penelitian_Mandiri;
            var simulasi_skor_3c1;
            var a = 0.005;
            var b = 0.5;
            var c = 1;

            // Hitung Rata-Rata Penelitian Lugri, Dagri, Mandiri/PT
            var rata_penelitian_Lugri = penelitian_Lugri / 3 / dosen_Tetap;
            var rata_penelitian_Dagri = penelitian_Dagri / 3 / dosen_Tetap;
            var rata_penelitian_Mandiri = penelitian_Mandiri / 3 / dosen_Tetap;

            if (rata_penelitian_Lugri >= a) {
                simulasi_skor_3c1 = 4;
            } else if (rata_penelitian_Lugri < a && rata_penelitian_Dagri >= b) {
                simulasi_skor_3c1 = 3 + (rata_penelitian_Lugri / a);
            } else if (rata_penelitian_Lugri < a && rata_penelitian_Lugri > 0 && rata_penelitian_Dagri < b &&
                rata_penelitian_Dagri > 0) {
                simulasi_skor_3c1 = (2 + (2(rata_penelitian_Lugri / a)) + (rata_penelitian_Dagri / b) - ((
                    rata_penelitian_Lugri / rata_penelitian_Dagri) / (a * b)));
            } else if (rata_penelitian_Lugri == 0 && rata_penelitian_Dagri == 0 && rata_penelitian_Mandiri >=
                0) {
                simulasi_skor_3c1 = 2;
            } else {
                simulasi_skor_3c1 = (2 * rata_penelitian_Mandiri) / c;
            }

            // Simulasi Keterangan
            var nilai_simulasi_keterangan;
            if (simulasi_skor_3c1 == 4) {
                nilai_simulasi_keterangan =
                    '<span style="color:green">Skoor Simulasi tabel 3.c.1 Produktivitas Penelitian Dosen Telah Mencapai Hasil Maksimal (4)</span>';
            } else if (simulasi_skor_3c1 < 4 && simulasi_skor_3c1 > 0) {
                nilai_simulasi_keterangan =
                    '<span style="color:orange">Skoor Simulasi tabel 3.c.1 Produktivitas Penelitian Dosen Belum mencapai hasil maksimal !!</span>';
            } else {
                nilai_simulasi_keterangan =
                    '<span style="color:red">Skoor Simulasi tabel 3.c.1 Produktivitas Penelitian Dosen 0 !!</span>';
            }

            // Menampilkan Hasil Simulasi 
            penelitian_lugri.textContent = penelitian_Lugri;
            penelitian_dagri.textContent = penelitian_Dagri;
            penelitian_mandiri.textContent = penelitian_Mandiri;
            dosen_tetap.textContent = dosen_Tetap;
            rata_penelitian_lugri.textContent = rata_penelitian_Lugri;
            rata_penelitian_dagri.textContent = rata_penelitian_Dagri;
            rata_penelitian_mandiri.textContent = rata_penelitian_Mandiri;
            skor.textContent = simulasi_skor_3c1;
            simulasi_keterangan.innerHTML = nilai_simulasi_keterangan;
        }
        // Deklarasi Variabel dan Mendengarkan perubahan
        penelitianLugri.addEventListener("input", hitung_simulasi);
        penelitianDagri.addEventListener("input", hitung_simulasi);
        penelitianMandiri.addEventListener("input", hitung_simulasi);
        dosenTetap.addEventListener("input", hitung_simulasi);
    })
</script>