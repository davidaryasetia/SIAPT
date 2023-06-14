<?php
  // Mendapatkan nilai a dan b dari inputan pengguna atau database
  $a = 0;
  $b = 0;
  $c = 5;
  $d = 6;
  $total = 0;
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil nilai a dan b dari form jika ada
    if(isset($_POST['nilai_a']) && isset($_POST['nilai_b'])) {
      $a = $_POST['nilai_a'];
      $b = $_POST['nilai_b'];
    }
  } else {
    // Set nilai awal a dan b menggunakan $c dan $d
    $a = $c;
    $b = $d;
  }

  // Melakukan perhitungan nilai jika kedua nilai ada
  if ($a != 0 && $b != 0) {
    $total = $a + $b;
  } else {
    // Jika salah satu nilai tidak ada, gunakan nilai yang ada
    $total = $a != 0 ? $a : $b;
  }

//   Hitung Skor 
if($total > 10){
    $skor = 4;
} else if($total < 10 && $total > 5){
    $skor = 2;
} else {
    $skor = 0;
}
?>

<form method="post">
    <input type="number" class="form-control" name="nilai_a" placeholder="Nilai a" value="<?php echo $a; ?>" />
    <input type="number" class="form-control" name="nilai_b" placeholder="Nilai b" value="<?php echo $b; ?>" />
    <button type="submit">Hitung</button>
</form>

<?php
  // Menampilkan hasil perhitungan
  echo "Hasil perhitungan: " . $total;
  echo "<br>";
  echo "Hasil perhitungan Skor: " . $skor;
?>