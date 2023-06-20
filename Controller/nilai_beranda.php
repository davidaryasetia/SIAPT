<?php
include "../Controller/daftar_tabel.php";
include "../Controller/nilai_2b.php";
include "../Controller/nilai_2c.php";
include "../Controller/nilai_3a1.php";
include "../Controller/nilai_3a2.php";
include "../Controller/nilai_3a3.php";
include "../Controller/nilai_3a4.php";
include "../Controller/nilai_3b.php";
include "../Controller/nilai_3c1.php";
include "../Controller/nilai_3c2.php";
include "../Controller/nilai_3d.php";
include "../Controller/nilai_5b1.php";
include "../Controller/nilai_5b2.php";


// fetch api response
$response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/elemen_indikator_akreditasi.php');
// Decode JSON response into an associative array
$data = json_decode($response, true);


// Hitung Total Skor Laporan Kinerja 
$skor_lkpt=0;
$skor_led=0;
$nilai_akreditasi=0;


/** $skor_tabel_lkpt
 * 7 $skor_tabel_2b
 * 8 $skor_2c
 * 9 $skor_3a1

 */
// Hitung Skor LKPT
$skor_lkpt =  $skor_tabel_2b 
            + $skor_2c 
            + $skor_3a1
            + $skor_tabel_jabatan_fungsional
            + $skor_dosen_bersertifikat
            + $skor_dosen_tidak_tetap
            + $skor_tabel_penelitian
            + $skor_tabel_pkm
            + $skor_tabel_rekognisi_dosen
            ;

// Hitung Skor LED
$skor_led;

// Hitung Total Nilai Akreditasi
$nilai_akreditasi = $skor_lkpt + $skor_led;


// Syarat perlu peringkat Akreditasi 

?>