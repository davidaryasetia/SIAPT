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
    $presentase_dosen_bersertifikat = 0;
    $skor_dosen_bersertifikat=0;
    $presentase_dosen_bersertifikat = ($total_dosen_bersertifikasi/$total_dosen_tetap) * 1;
    $presentase_dosen_bersertifikat = number_format($presentase_dosen_bersertifikat, 1);

    // Hitung Skoor Presentase Jumlah Dosen Yang Memiliki sertifikat kompetensi
    if($presentase_dosen_bersertifikat >= 0.5){
        $skor_dosen_bersertifikat = 4;
    } else if($presentase_dosen_bersertifikat < 0.5){
        $skor_dosen_bersertifikat = 1 + (6 * $presentase_dosen_bersertifikat);
    } else if($presentase_dosen_bersertifikat = 0){
        $skor_dosen_bersertifikat = 0;
    }
?>