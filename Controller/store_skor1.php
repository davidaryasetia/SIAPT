<?php
session_start();
?>

<?php

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
include "../Controller/nilai_5b1.php";


// Store Variable Skor
$_SESSION['skor'] = array(
    '2b' => $skor_tabel_2b, 
    '2c' => $skor_2c, 
    '3a1' => $skor_3a1
);
echo '$_SESSION is set'

?>