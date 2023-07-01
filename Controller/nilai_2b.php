<?php
  // Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
  $response_asing = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_asing');
  $response_aktif = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_aktif');

  // Decode JSON response $response_asing & $response_aktif ke asociate array
  $mahasiswa_asing = json_decode($response_asing, true);
  $mahasiswa_aktif = json_decode($response_aktif, true);

    // Hitung Total TS-2(2017), TS-1(2018), TS(2019)
    $sum_ts2 = 0;
    $sum_ts1 = 0;
    $sum_ts = 0;
    foreach ($mahasiswa_asing as $row){
        $sum_ts2 += $row['TS-2(2017)'];
        $sum_ts1 += $row['TS-1(2018)'];
        $sum_ts += $row['TS(2019)'];
    }

    //Total Mahasiswa Asing dalam 3 tahun terakhir
    $total_mahasiswa_asing=0;
    foreach($mahasiswa_asing as $row){
        $total_mahasiswa_asing += $row['TS-2(2017)'] + $row['TS-1(2018)'] + $row['TS(2019)'];
    }

    //Total Mahasiswa Aktif dalam 3 tahun terakhir
    $total_mahasiswa_aktif=0;
    foreach($mahasiswa_aktif as $row){
        $total_mahasiswa_aktif += $row['TS-2(2017)'] + $row['TS-1(2018)'] + $row['TS(2019)'];
    }

    /* 
    No 19
    Hitung Total Presentase Jumlah Mahasiswa Asing 
    Rumus :
    presentase_2b = (total_mhs_asing/total_mhs_aktif) * 100% [100% = 1]
    Jika Presentase >= 0,5% skor = 4,
    Jika presentase < 0,5% skor = 2 + (4 * presentase_2b)
    Jika Presentase = 0% maka skor 1 || 0
    */ 
    $presentase_2b;
    $skor_2b;
    $presentase_2b = ($total_mahasiswa_asing/$total_mahasiswa_aktif) * 100 ;
    $presentase_2b = number_format($presentase_2b, 1); // Limit Desimal Output 3 angka

    // Hitung Skoor Tabel 2.b Mahasiswa Asing 
    if($presentase_2b >= 0.5 ){  //[notes 0,5% = 0,5]
        $skor_2b = 4;  
    } else if($presentase_2b < 0.5 && $presentase_2b > 0){
        $skor_2b = 2+(400 * ($presentase_2b/100));
    } else {
        $skor_2b=  0;
    }

   
    $keterangan='txt';
    if($skor_2b == 4){
    $keterangan = '<span style="color:green;font-weight:bold">Skor Tabel 2.b Mahasiswa Asing telah mencapai Maksimal</span>';
    }else if($skor_2b < 4 && $skor_2b > 0){
    $keterangan = '<span style="color:orange">Skor Tabel 2.b Mahasiswa Asing belum memenuhi target maksimal</span>';
    }else {
    $keterangan = '<span style="color:red">Skor Tabel 2.b Mahasiswa Asing Nol 0</span>';
    }

   

?>


<!-- End Export Data -->



<!-- Simulasi Skoor -->
<!-- Hitung Skor Simulasi Mahasiswa Asing Menggunakan Javascript -->
<script>
    // Mendapatkan input dari form nilai_mahasiswa_aktif dan nilai_mahasiswa_asing
    document.addEventListener("DOMContentLoaded", function () {
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
                nilai_simulasi_keterangan =
                    '<span style="color:green">Skoor Simulasi tabel 2.b Telah Mencapai Hasil Maksimal</span>';
            } else if (nilai_simulasi_skor < 4 && nilai_simulasi_skor > 0) {
                nilai_simulasi_keterangan =
                    '<span style="color:orange">Skoor Simulasi Tabel 2.b mencapai hasil maksimal (Tambah Mahasiswa Asing !!)</span>';
            } else {
                nilai_simulasi_keterangan = '<span style="color:red">Tidak terdapat Skoor 0 !!</span>';
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
        nilai_aktif.addEventListener("input",
            hitung_simulasi);
    });
</script>