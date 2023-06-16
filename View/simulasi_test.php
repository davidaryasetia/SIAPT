<?php
 $total_mahasiswa_asing =117; 
 $total_mahasiswa_aktif= 1298; 
 $presentase_mahasiswa = 9; 
 $skor_mahasiswa_asing =4; 
 $keterangan = 'skor maksimal'; 
?>
<h3 class="modal-title " style="font-weight:bolder" id="exampleModalLabel">
    Simulasi Nilai
</h3>
<form class="forms-sample" method="POST" action="" id="form-container">
    <div class="form-group">
        <label for="nilai_mahasiswa_asing">Jumlah Mahasiswa
            Asing 3 Tahun
            Terakhir</label>
        <input type="number" class="form-control" id="nilai_mahasiswa_asing" name="nilai_mahasiswa_asing"
            placeholder="Mahasiswa Asing" value="<?php echo $total_mahasiswa_asing; ?>" />
    </div>
    <div class="form-group">
        <label for="nilai_mahasiswa_aktif">Jumlah Mahasiswa
            Aktif 3 Tahun
            Terakhir</label>
        <input type="number" class="form-control" id="nilai_mahasiswa_aktif" name="nilai_mahasiswa_aktif"
            placeholder="Mahasiswa Aktif" value="<?php echo $total_mahasiswa_aktif; ?>" />
    </div>
</form>

<?php


 echo '<div class="skor">';
 echo '<h4 style="font-weight:bold">Keterangan Simulasi Skor Tabel 2.b</h4>';
 echo '<p>Simulasi Nilai Mahasiswa Asing 3 Tahun Terakhir : <span id="mahasiswa_asing">' .$total_mahasiswa_asing. '</span></p>';
 echo '<p>Simulasi Nilai Mahasiswa Aktif 3 Tahun Ter     akhir : <span id="mahasiswa_aktif">' .$total_mahasiswa_aktif. '</span></p>';
 echo '<p>Simulasi Presentase Mahasiswa Asing: <span id="simulasi_presentase">' .$presentase_mahasiswa. '</span>%</p>';
 echo '<p>Simulasi Skoor Mahasiswa Asing: <span id="simulasi_skor">' .$skor_mahasiswa_asing. '</span></p>';
 echo '<p>Keterangan: <span id="simulasi_keterangan">' .$keterangan. '</span></p>';
 echo '</div>';
 ?>

<!-- Hitung Skor Simulasi Mahasiswa Asing Menggunakan Javascript -->
<script>
    // Mendapatkan input dari form nilai_mahasiswa_aktif dan nilai_mahasiswa_asing
    var mahasiswa_asing = document.getElementById("mahasiswa_asing");
    var mahasiswa_aktif = document.getElementById("mahasiswa_aktif");
    var nilai_asing = document.getElementById("nilai_mahasiswa_asing");
    var nilai_aktif = document.getElementById("nilai_mahasiswa_aktif");
    var simulasi_presentase = document.getElementById("simulasi_presentase");
    var simulasi_skor = document.getElementById("simulasi_skor");
    var simulasi_keterangan = document.getElementById("simulasi_keterangan");

    // Mendefinisikan fungsi untuk melakukan perhitungan tabel
    function hitung_simulasi() {
        // Mengambil nilai input dari form
        var asing = parseInt(nilai_asing.value);
        var aktif = parseInt(nilai_aktif.value);

        // Melakukan perhitungan nilai
        var nilai_simulasi_presentase = (asing / aktif) * 100;
        nilai_simulasi_presentase = nilai_simulasi_presentase.toFixed(1);

        // Hitung Skor Tabel Simulasi
        var nilai_simulasi_skor;
        if (nilai_simulasi_presentase >= 0.5) {
            nilai_simulasi_skor = 4;
        } else if (nilai_simulasi_presentase < 0.5 && nilai_simulasi_presentase > 0) {
            nilai_simulasi_skor = 2 + (400 * (nilai_simulasi_presentase / 100));
        } else {
            nilai_simulasi_skor = 0;
        }

        // Simulasi Keterangan
        var nilai_simulasi_keterangan;
        if (nilai_simulasi_skor == 4) {
            nilai_simulasi_keterangan = '<td style="color:green">Skoor Telah Mencapai Hasil Maksimal</td>';
        } else if (nilai_simulasi_skor < 4 && nilai_simulasi_skor > 0) {
            nilai_simulasi_keterangan = '<td style="color:yellow>">Skor Belum Mencapai Hasil Maksimal</td>';
        } else if (nilai_simulasi_skor == 0) {
            nilai_simulasi_keterangan = '<td tyle="color:red">Tidak terdapat Skoor 0</td>';
        } else {
            nilai_simulasi_keterangan = 0;
        }

        // Menampilkan simulasi presentase 
        mahasiswa_asing.textContent = asing;
        mahasiswa_aktif.textContent = aktif;
        simulasi_presentase.textContent = nilai_simulasi_presentase;
        simulasi_skor.textContent = nilai_simulasi_skor;
        simulasi_keterangan.innerHTML = nilai_simulasi_keterangan;
    }

    // Deklarasi Variabel dan mendengarkan perubahan dengan addEventLister
    nilai_asing.addEventListener("input", hitung_simulasi);
    nilai_aktif.addEventListener("input", hitung_simulasi);
</script>