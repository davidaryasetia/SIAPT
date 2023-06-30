<?php
// Fetch API Response 
$response_prestasi_nonakademik = file_get_contents('https://project.mis.pens.ac.id/mis143/API/5.b.2_prestasi_non_akademik_mahasiswa.php');
$response_mahasiswa_aktif = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_aktif');

// Decode JSON response ke asosiative array
$prestasi_nonakademik = json_decode($response_prestasi_nonakademik, true);
$mahasiswa_aktif = json_decode($response_mahasiswa_aktif, true);


// Deklarasi Faktor 
$a = 0.005;
$b = 1;
$c = 5;
$total_mahasiswa_aktif=0;
$prestasi_provinsi=0;
$prestasi_nasional=0;
$prestasi_internasional=0;
$rata_prestasi_internasional=0;
$rata_prestasi_nasional=0;
$rata_prestasi_provinsi=0;
$skor_5b2;
$keterangan = 'txt';

// Hitung Total Mahasiswa Aktif
foreach ($mahasiswa_aktif as $row){
    $total_mahasiswa_aktif += $row['TS-2(2017)'] + $row['TS-1(2018)'] + $row['TS(2019)'];
}

// Hitung Prestasi Akademik
foreach($prestasi_nonakademik as $row){
    if($row['Tingkat'] == "Provinsi/Wilayah"){
        $prestasi_provinsi++;
    } else if ($row['Tingkat'] == "Nasional"){
        $prestasi_nasional++;
    } else if ($row['Tingkat'] == "Internasional"){
        $prestasi_internasional++;
    }
}

// Hitung Rata-Rata Prestasi Akademik Internasional, Nasional, Wilayah/Provinsi
$rata_prestasi_internasional = ($prestasi_internasional/$total_mahasiswa_aktif) * 100;
$rata_prestasi_nasional = ($prestasi_nasional/$total_mahasiswa_aktif) * 100;
$rata_prestasi_provinsi = ($prestasi_provinsi/$total_mahasiswa_aktif) * 100;

// Format Number 
$rata_prestasi_internasional = number_format($rata_prestasi_internasional, 1);
$rata_prestasi_nasional = number_format($rata_prestasi_nasional, 1);
$rata_prestasi_provinsi = number_format($rata_prestasi_provinsi, 1);

// Hitung Skor Tabel
if ($rata_prestasi_internasional >= $a){
    $skor_5b2 = 4;
} else if ($rata_prestasi_internasional < $a && $rata_prestasi_nasional >= $b){
    $skor_5b2 = 3 + ($rata_prestasi_provinsi/$a);
} else if ($rata_prestasi_internasional < $a && $rata_prestasi_nasional < $b){
    $skor_5b2 = 2 + (2 * ($rata_prestasi_internasional/$a)) + ($rata_prestasi_nasional/$b) - (($rata_prestasi_internasional * $rata_prestasi_nasional) / ($a * $b));
} else if ($rata_prestasi_internasional == 0 && $rata_prestasi_nasional == 0 && $rata_prestasi_provinsi >= $c){
    $skor_5b2 = 2;
} else if ($rata_prestasi_internasional == 0 && rata_prestasi_nasional == 0 && $rata_prestasi_provinsi < $c){
    $skor_5b2 = 1 + ($rata_prestasi_provinsi/$c);
} else {
    $skor_5b2 < 1;
}

// Keterangan Skor
if($skor_5b2 == 4){
    $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 5.b.2 Prestasi Akademik Mahasiswa memenuhi target maksimum</span>';
} else if ($skor_5b2 < 4 && $skor_5b2 >0){
    $keterangan = '<span style="color:orange;font-weight:bold">Skor Tabel 5.b.2 Prestasi Akademik Mahasiswa belum memenuhi target maksimal !!</span>';
} else {
    $keterangan = '<span style="color:red; font-weight:bold">Skor Tabel 5.b.2 Prestasi Akademik Mahasiswa 0 !!</span>';
}
?>

<!-- Simulasi Skoor Javascript 5.b.2 -->
<script>
    // Mendapatkan input dari form prestasi akademik internasional, nasional, dan dalam negeri
    document.addEventListener("DOMContentLoaded", function () {
        // Get input dari form 
        var prestasiInternasional = document.getElementById('value_prestasi_internasional');
        var prestasiNasional = document.getElementById('value_prestasi_nasional');
        var prestasiProvinsi = document.getElementById('value_prestasi_provinsi');
        var mahasiswaAktif = document.getElementById('value_mahasiswa_aktif');

        // Modifikasi Text
        var prestasi_internasional = document.getElementById('prestasi_internasional');
        var prestasi_nasional = document.getElementById('prestasi_nasional');
        var prestasi_provinsi = document.getElementById('prestasi_provinsi');
        var mahasiswa_aktif = document.getElementById('mahasiswa_aktif');
        var rata_prestasi_internasional = document.getElementById('rata_prestasi_internasional');
        var rata_prestasi_nasional = document.getElementById('rata_prestasi_nasional');
        var rata_prestasi_provinsi = document.getElementById('rata_prestasi_provinsi');
        var skor = document.getElementById('skor');
        var simulasi_keterangan = document.getElementById('simulasi_keterangan');

        // Fungsi untuk menghitung tabel 
        function hitung_simulasi() {
            var prestasi_Internasional = parseInt(prestasiInternasional.value);
            var prestasi_Nasional = parseInt(prestasiNasional.value);
            var prestasi_Provinsi = parseInt(prestasiProvinsi.value);
            var mahasiswa_Aktif = parseInt(mahasiswaAktif.value);

            // Deklarasi Variabel Rata-Rata Prestasi Internasional, Nasional, Provinsi
            var rata_prestasi_Internasional;
            var rata_prestasi_Nasional;
            var rata_prestasi_Provinsi;
            var simulasi_skor_5b2;
            var nilai_simulasi_keterangan;
            var a = 0.005;
            var b = 1;
            var c = 5;

            // Hitung Rata-Rata Prestasi Akademik Internasional, Nasional, dan Provinsi
            var rata_prestasi_Internasional = (prestasi_Internasional / mahasiswa_Aktif) * 100;
            var rata_prestasi_Nasional = (prestasi_Nasional / mahasiswa_Aktif) * 100;
            var rata_prestasi_Provinsi = (prestasi_Provinsi / mahasiswa_Aktif) * 100;

            // Membulatkan Hasil Rata-Rata
            rata_prestasi_Internasional = rata_prestasi_Internasional.toFixed(2);
            rata_prestasi_Nasional = rata_prestasi_Nasional.toFixed(2);
            rata_prestasi_Provinsi = rata_prestasi_Provinsi.toFixed(2);

            // Hitung Simulasi Skoor Tabel 5.b.2
            if (rata_prestasi_Internasional >= a) {
                simulasi_skor_5b2 = 4;
            } else if (rata_prestasi_Internasional < a && rata_prestasi_Nasional >= b) {
                simulasi_skor_5b2 = 3 + (rata_prestasi_Internasional / a);
            } else if (rata_prestasi_Internasional < a && rata_prestasi_Nasional < b) {
                simulasi_skor_5b2 = 2 + (2 * (rata_prestasi_Internasional / a)) + (rata_prestasi_Nasional / b) -
                    ((rata_prestasi_Internasional * rata_prestasi_Nasional) / (a * b));
            } else if (rata_prestasi_Internasional == 0 && rata_prestasi_Nasional == 0 &&
                rata_prestasi_Provinsi >= c) {
                simulasi_skor_5b2 = 2;
            } else if (rata_prestasi_Internasional == 0 && rata_prestasi_Nasional == 0 &&
                rata_prestasi_Provinsi < c) {
                simulasi_skor_5b2 = 1 + (rata_prestasi_Provinsi / c);
            } else {
                simulasi_skor_5b2 < 1;
            }

            // Keterangan
            if (simulasi_skor_5b2 == 4) {
                nilai_simulasi_keterangan =
                    '<span style="color:green;font-weight:bold">Simulasi Skoor Tabel 5.b.2 Prestasi Akademik Mahasiswa Mencapai Hasil Maksimal (4)</span>';
            } else if (simulasi_skor_5b2 < 4 && simulasi_skor_5b2 > 0) {
                nilai_simulasi_keterangan =
                    '<span style="color:orange; font-weight: bold">Simulasi Skoor Tabel 5.b.2 Prestasi Akademik Mahasiswa Belum Mencapai Hasil Maksimal !!</span>';
            } else {
                nilai_simulasi_keterangan =
                    '<span style="color:red;font-weight:bold">Simulasi Skoor Tabel 5.b.2 Prestasi Akademik 0 !!</span>';
            }

            // Menampilkan Hasil Simulasi 
            prestasi_internasional.textContent = prestasi_Internasional;
            prestasi_nasional.textContent = prestasi_Nasional;
            prestasi_provinsi.textContent = prestasi_Provinsi;
            mahasiswa_aktif.textContent = mahasiswa_Aktif;
            rata_prestasi_internasional.textContent = rata_prestasi_Internasional;
            rata_prestasi_nasional.textContent = rata_prestasi_Nasional;
            rata_prestasi_provinsi.textContent = rata_prestasi_Provinsi;
            skor.textContent = simulasi_skor_5b2;
            simulasi_keterangan.innerHTML = nilai_simulasi_keterangan;
        }

        // Deklarasi Variabel dan medengarkan perubaha
        prestasiInternasional.addEventListener("input", hitung_simulasi);
        prestasiNasional.addEventListener("input", hitung_simulasi);
        prestasiProvinsi.addEventListener("input", hitung_simulasi);
        mahasiswaAktif.addEventListener("input", hitung_simulasi);
    })
</script>