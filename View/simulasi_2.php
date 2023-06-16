<?php
$asing = 5;
$aktif = 5;
$total = 1;
$skor = 4;
$keterangan = "Skor Tabel 2.b Mahasiswa Asing Sudah mencapai target maksimal";
?>

<form>
    <input type="number" class="form-control" id="mahasiswa_asing" placeholder="Masukkan Nilai Mahasiswa Asing"
        value="<?php echo $asing ?>" />
    <input type="number" class="form-control" id="mahasiswa_aktif" placeholder="Masukkan Nilai Mahasiswa Aktif"
        value="<?php echo $aktif ?>" />
</form>

<?php
echo '<p>Presentase Simulasi Mahasiswa Asing  : <span id="presentase_simulasi">' . $total . '</span>%</p>';
echo '<p>Skor Simulasi Mahasiswa Asing  : <span id="skor_simulasi">' . $skor . '</span></p>';
echo '<p>Keterangan : <span id="keterangan_simulasi"><br>' . $keterangan . '</span></p>';

?>

<!-- Simulasi Skor realtime dengan menggunakan javascript -->
<!-- Hitung Skor Simulasi Mahasiswa Asing Menggunakan Javascript -->
<script>
    // Mendapatkan input dari form nilai_mahasiswa_aktif dan nilai_mahasiswa_asing
    var nilai_asing = document.getElementById("nilai_mahasiswa_asing");
    var nilai_aktif = document.getElementById("nilai_mahasiswa_aktif");
    var mahasiswa_asing = document.getElementById("mahasiswa_asing");
    var mahasiswa_aktif = document.getElementById("mahasiswa_aktif");
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
        simulasi_presentase.textContent = nilai_simulasi_presentase;
        simulasi_skor.textContent = nilai_simulasi_skor;
        simulasi_keterangan.innerHTML = nilai_simulasi_keterangan;
    }

    // Deklarasi Variabel dan mendengarkan perubahan dengan addEventLister
    nilai_asing.addEventListener("input", hitung_simulasi);
    nilai_aktif.addEventListener("input", hitung_simulasi);
</script>