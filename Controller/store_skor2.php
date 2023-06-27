<?php
session_start();
?>

<?php
$skor = $_SESSION['skor'];
$skor_tabel_2b = $skor['2b'];
$skor_2c=$skor['2c'];
$skor_3a1=$skor['3a1'];

echo $skor_tabel_2b;
echo '<br />';
echo $skor_2c;
echo '<br />';
echo $skor_3a1;
?>