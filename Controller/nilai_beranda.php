<?php
session_start();
?>

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

// Hitung Total Skor Laporan Kinerja Berdasarkan Excell LKPT
$skor_null=0;
$skor_lkpt=0;

/** $skor_tabel_lkpt
 * 19 $skor_2b
 * 8 $skor_2c
 * 21 $skor_3a1
 * 22 $skor_3a2
 * 23 $skor_3a3
 * 24 $skor_3a4
 * 25 $skor_3b
 * 26 $skor_3c1
 * 27 $skor_3c2
 * 28 $skor_3d
 * 48 $skor_5b1
 * 49 $skor_5b2
 */
// Hitung Skor LKPT Berdasarkan Tabel LKPT
$skor_lkpt = $skor_2b 
            + $skor_2c
            + $skor_3a1
            + $skor_3a2
            + $skor_3a3
            + $skor_3a4
            // + $skor_3b
            + $skor_3c1
            + $skor_3c2
            + $skor_3d
            + $skor_5b1
            + $skor_5b2
            ;

$skorArray = [
    $skor_null, // 8 -> 1.a
    $skor_null, // 8 -> 1.a
    $skor_null, // 9 -> 1.a
    $skor_null, // 10 -> 1.b
    $skor_null, // 12 -> 1.c
    $skor_null, // 17 -> 2.a
    $skor_null, //18 -> 2.a
    $skor_2b, // 19 -> 2.b
    $skor_3a1, // 21 -> 3.a.1
    $skor_3a2, // 22 -> 3.a.2
    $skor_3a3, // 23 -> 3.a.3
    $skor_3a4, // 24 -> 3. a.4
    $skor_null, // 25 -> 3.b
    $skor_3c1, // 26 -> 3.c.1
    $skor_3c2, // 27 ->3.c.2
    $skor_3d, // 28 -> 3.d
    $skor_null,  // 30 -> 4.a
    $skor_null,  // 31-> 4.a
    $skor_null,  // 32 -> 4.b
    $skor_null,  // 33 -> 4.b
    $skor_null,  // 34 -> 4.b
    $skor_null,  // 35 -> 4.b
    $skor_null,  // 36 -> 4.b
    $skor_2c, // 40 -> 2.c
    $skor_null, // 46 -> 5.a.1
    $skor_null, // 47 -> 5.a.2
    $skor_5b1, // 48 -> 5.b.1
    $skor_5b2, // 49 -> 5.b.2
    $skor_null,  // 50 -> 5.c.1
    $skor_null, // 51 -> 5.c.2
    $skor_null, // 52 -> 5.c.2
    $skor_null, // 53 -> 5.d.1
    $skor_null, // 54 -> 5.d.2
    $skor_null, // 55 -> 5.e.1
    $skor_null, // 56 -> 5.e.2
    $skor_null, // 57 -> 5.f
    $skor_null, // 58 -> 5.f
    $skor_null, // 59 -> 5.g
    $skor_null, // 60 ->5.h  
];

// Store Variable Skor To Array To Throw in ../Controller/export/resume_beranda.php
$_SESSION['skor'] = array(
    '2b' => $skor_2b, 
    '2c' => $skor_2c, 
    '3a1' => $skor_3a1, 
    '3a2' => $skor_3a2, 
    '3a3' => $skor_3a3, 
    '3a4' => $skor_3a4, 
    '3c1' => $skor_3c1, 
    '3c2' => $skor_3c2, 
    '3d' => $skor_3d, 
    '5b1' => $skor_5b1, 
    '5b2' => $skor_5b2,
    'null' => $skor_null,  
);


?>