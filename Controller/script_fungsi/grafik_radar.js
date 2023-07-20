// Menyimpan variabel array ke dalam judul dan skor
var judul_tabel = [];
var skor_tabel = [];

// Memanggil data yang diformat json di data_grafik.json
$.ajax({
  url: "https://project.mis.pens.ac.id/mis143/Controller/script_fungsi/data_grafik.json", // Sesuaikan dengan path ke file JSON jika berbeda
  dataType: "json",
  success: function (data_grafik) {
    console.log(data_grafik);

    // Mengakses elemen array
    data_grafik.forEach(function (elemen) {
      var judul = elemen.judul;
      var skor = elemen.skor;

      // Menyimpan array dan judul ke luar skor array di luar fungsi ajax
      judul_tabel.push(judul);
      skor_tabel.push(skor);
    });
  },
  error: function (error) {
    console.error("Terjadi error saat mengambil data:", error);
  },
});

console.log(judul_tabel);
console.log(skor_tabel);
// Output JSON ada judul dan skor

const data = {
  labels: judul_tabel,
  datasets: [
    {
      label: "Capaian Skoor LKPT",
      data: skor_tabel,
      fill: true,
      backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgb(12, 62, 155)",
      pointBorderColor: "#fff",
      pointBackgroundColor: "rgb(12, 62, 155)",
      pointHoverBorderColor: "rgb(255, 99, 132)",
    },
  ],
};

// Konfigurasi Grafik Radar
const config = {
  type: "radar",
  data: data,
  options: {
    maintainAspectRatio: true,
    elements: {
      line: {
        borderWidth: 3,
      },
    },
    scales: {
      r: {
        angleLines: {
          display: false,
        },
        suggestedMin: 0,
        suggestedMax: 4,
        ticks: {
          stepSize: 0.5, // Mengatur kelipatan 0.5 pada label titik
        },
        pointLabels: {
          callback: function (value, index, values) {
            // Mengatur maksimal karakter agar tidak merusak layout
            const judul = judul_tabel[index % judul_tabel.length];
            const maxCharacter = 12;
            return judul.length > maxCharacter
              ? judul.substring(0, maxCharacter) + "..."
              : judul;
          },
        },
      },
    },
  },
};

const grafik = document.getElementById("grafik_radar").getContext("2d");
const grafik_radar = new Chart(grafik, config);
