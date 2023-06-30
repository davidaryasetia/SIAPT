<?php
 // fetch api response
 $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.c.2_produktivitas_pkm_dosen.php');
 $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
 // Decode JSON response into an associative array
 $data = json_decode($response, true);
 $dosen_tetap = json_decode($response_dosen_tetap, true);

foreach($data as $row){
    $total_pkm_biaya_mandiri= intval($row['TS-2(2017)']) + intval($row['TS-1(2018)']) + intval($row['TS(2019)']);
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
$rata_pkm_biaya_mandiri=$total_pkm_biaya_mandiri/3/$total_dosen_tetap;
$rata_pkm_biaya_mandiri=number_format($rata_pkm_biaya_mandiri,2);

// Hitung Skor tabel pkm
$a=0.005;
$b=0.5;
$c=1;
$skor_3c2;

if($rata_pkm_lugri >= $a){
    $skor_3c2 = 4;
} else if ($rata_pkm_lugri < $a && $rata_pkm_dagri >= $b){
    $skor_3c2 = (3 + ($rata_pkm_lugri/$a));
} else if ($rata_pkm_lugri < $a && $rata_pkm_lugri > 0 && $rata_pkm_dagri < $b && $rata_pkm_dagri > 0){
    $skor_3c2 = (2 + (2 * ($rata_pkm_lugri / $a )) + ($rata_pkm_dagri / $b) - (($rata_pkm_lugri * $rata_pkm_dagri) / ($a * $b)) );
} else if ($rata_pkm_lugri == 0 && $rata_pkm_dagri == 0 && $rata_pkm_biaya_mandiri){
    $skor_3c2 = 2;
} else {
    $skor_3c2 = (2 * $rata_pkm_biaya_mandiri) / $c;
}

$keterangan='txt';
 if($skor_3c2 == 4){
    $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 3.c.1 Produktivitas pkm Dosen memenuhi target maksimum</span>';
    }else if($skor_3c2 < 4 && $skor_3c2 > 0){
    $keterangan = '<span style="color:orange">Skor Tabel 3.c.1 Produktivitas pkm Dosen belum memenuhi target maksimal !!</span>';
    }else {
    $keterangan = '<span style="color:red">Skor Tabel 3.c.1 Produktivitas pkm Dosen 0 !!</span>';
    }

?>

<!-- Simulasi Javascript 3.c.1 pkm Dosen -->
<script>
    // Mendapatkan input dari form
    document.addEventListener("DOMContentLoaded", function () {
        // Get input dari form 
        var pkmLugri = document.getElementById('value_pkm_lugri');
        var pkmDagri = document.getElementById('value_pkm_dagri');
        var pkmMandiri = document.getElementById('value_pkm_mandiri');
        var dosenTetap = document.getElementById('value_dosen_tetap');

        // Modifikasi Text
        var pkm_lugri = document.getElementById('pkm_lugri');
        var pkm_dagri = document.getElementById('pkm_dagri');
        var pkm_mandiri = document.getElementById('pkm_mandiri');
        var dosen_tetap = document.getElementById('dosen_tetap');
        var rata_pkm_lugri = document.getElementById('rata_pkm_lugri');
        var rata_pkm_dagri = document.getElementById('rata_pkm_dagri');
        var rata_pkm_mandiri = document.getElementById('rata_pkm_mandiri');
        var skor = document.getElementById('skor');
        var simulasi_keterangan = document.getElementById('simulasi_keterangan');

        function hitung_simulasi() {
            // Mengambil nilai input dari form 
            var pkm_Lugri = parseInt(pkmLugri.value);
            var pkm_Dagri = parseInt(pkmDagri.value);
            var pkm_Mandiri = parseInt(pkmMandiri.value);
            var dosen_Tetap = parseInt(dosenTetap.value);

            // Deklarasi Variabel Rata-Rata & skor & Faktor
            var rata_pkm_Lugri;
            var rata_pkm_Dagri;
            var rata_pkm_Mandiri;
            var simulasi_skor_3c2;
            var a = 0.005;
            var b = 0.5;
            var c = 1;

            // Hitung Rata-Rata pkm Lugri, Dagri, Mandiri/PT
            var rata_pkm_Lugri = pkm_Lugri / 3 / dosen_Tetap;
            var rata_pkm_Dagri = pkm_Dagri / 3 / dosen_Tetap;
            var rata_pkm_Mandiri = pkm_Mandiri / 3 / dosen_Tetap;
            rata_pkm_Lugri = rata_pkm_Lugri.toFixed(2);
            rata_pkm_Dagri = rata_pkm_Dagri.toFixed(2);
            rata_pkm_Mandiri = rata_pkm_Mandiri.toFixed(2);

            if (rata_pkm_Lugri >= a) {
                simulasi_skor_3c2 = 4;
            } else if (rata_pkm_Lugri < a && rata_pkm_Dagri >= b) {
                simulasi_skor_3c2 = 3 + (rata_pkm_Lugri / a);
            } else if (rata_pkm_Lugri < a && rata_pkm_Lugri > 0 && rata_pkm_Dagri < b &&
                rata_pkm_Dagri > 0) {
                simulasi_skor_3c2 = (2 + (2(rata_pkm_Lugri / a)) + (rata_pkm_Dagri / b) - ((
                    rata_pkm_Lugri / rata_pkm_Dagri) / (a * b)));
            } else if (rata_pkm_Lugri == 0 && rata_pkm_Dagri == 0 && rata_pkm_Mandiri >
                0) {
                simulasi_skor_3c2 = 2;
            } else {
                simulasi_skor_3c2 = (2 * rata_pkm_Mandiri) / c;
            }
            simulasi_skor_3c2 = simulasi_skor_3c2.toFixed(2);


            // Simulasi Keterangan
            var nilai_simulasi_keterangan;
            if (simulasi_skor_3c2 == 4) {
                nilai_simulasi_keterangan =
                    '<span style="color:green">Skoor Simulasi tabel 3.c.1 Produktivitas pkm Dosen Telah Mencapai Hasil Maksimal (4)</span>';
            } else if (simulasi_skor_3c2 < 4 && simulasi_skor_3c2 > 0) {
                nilai_simulasi_keterangan =
                    '<span style="color:orange">Skoor Simulasi tabel 3.c.1 Produktivitas pkm Dosen Belum mencapai hasil maksimal !!</span>';
            } else {
                nilai_simulasi_keterangan =
                    '<span style="color:red">Skoor Simulasi tabel 3.c.1 Produktivitas pkm Dosen 0 !!</span>';
            }

            // Menampilkan Hasil Simulasi 
            pkm_lugri.textContent = pkm_Lugri;
            pkm_dagri.textContent = pkm_Dagri;
            pkm_mandiri.textContent = pkm_Mandiri;
            dosen_tetap.textContent = dosen_Tetap;
            rata_pkm_lugri.textContent = rata_pkm_Lugri;
            rata_pkm_dagri.textContent = rata_pkm_Dagri;
            rata_pkm_mandiri.textContent = rata_pkm_Mandiri;
            skor.textContent = simulasi_skor_3c2;
            simulasi_keterangan.innerHTML = nilai_simulasi_keterangan;
        }
        // Deklarasi Variabel dan Mendengarkan perubahan
        pkmLugri.addEventListener("input", hitung_simulasi);
        pkmDagri.addEventListener("input", hitung_simulasi);
        pkmMandiri.addEventListener("input", hitung_simulasi);
        dosenTetap.addEventListener("input", hitung_simulasi);
    })
</script>