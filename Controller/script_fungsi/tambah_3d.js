document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");
  form.addEventListener("submit", function (event) {
    event.preventDefault();
    var nama = form.elements.nama.value;
    var bidang_keahlian = form.elements.bidang_keahlian.value;
    var rekognisi = form.elements.rekognisi.value;
    var tingkat = form.elements.tingkat.value;
    var tahun = form.elements.tahun.value;

    // Validasi input pengguna tidak boleh kosong
    if (nama.trim() === "") {
      alert("Lengkapi Nama Dosen");
      return;
    } else if (bidang_keahlian.trim() === "") {
      alert("Lengkapi Bidang Keahlian");
      return;
    } else if (rekognisi.trim() === "") {
      alert("Lengkapi Rekognisi");
      return;
    } else if (tingkat.trim() === "") {
      alert("Lengkapi Tingkat Rekognisi Dosen");
      return;
    } else if (tahun.trim() === "") {
      alert("Lengkapi Tahun Perolehan Rekognisi");
      return;
    }

    // Membuat objek form data
    var formData = new FormData();
    formData.append("nama", nama);
    formData.append("bidang_keahlian", bidang_keahlian);
    formData.append("rekognisi", rekognisi);
    formData.append("tingkat", tingkat);
    formData.append("tahun", tahun);

    // Kirim Data untuk Tambah Data Tabel 3.d ke Endpoint API
    fetch("https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php", {
      method: "POST",
      body: formData,
    })
      .then(function (response) {
        if (response.ok) {
          return response.json();
        } else if (response.status === 500) {
          return response.json().then(function (data) {
            throw new Error(data.message);
          });
        } else {
          throw new Error("Tambah Data Tabel 3.d Rekognisi Dosen Berhasil");
        }
      })
      .then(function (data) {
        // Edit Data pengguna jika sukses dan akan mengarahkan ke ../../View/daftar_tabel.php
        alert("Tambah Data Tabel 3.d Rekognisi Dosen Berhasil");
        window.location.href = "../../View/3d.php";
      })
      .catch(function (error) {
        // Menangani kesalahan
        console.error(error);
        alert(error.message);
      });
  });
});
