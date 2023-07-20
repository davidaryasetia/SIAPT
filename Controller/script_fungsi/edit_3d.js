document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");
  form.addEventListener("submit", function (event) {
    event.preventDefault();
    var no = form.elements.no.value;
    var nama = form.elements.nama.value;
    var bidang_keahlian = form.elements.bidang_keahlian.value;
    var rekognisi = form.elements.rekognisi.value;
    var tingkat = form.elements.tingkat.value;
    var tahun = form.elements.tahun.value;

    // Validasi input pengguna tidak boleh kosong
    if (no.trim() === "") {
      alert("Lengkapi Nomor");
      return;
    } else if (nama.trim() === "") {
      alert("Lengkapi Nama Dosen");
      return;
    } else if (bidang_keahlian.trim() === "") {
      alert("Lengkapi Bidang Keahlian");
      return;
    } else if (rekognisi.trim() === "") {
      alert("Lengkapi Rekognisi");
      return;
    } else if (tingkat.trim() === "") {
      alert("Lengkapi Tingkat Rekognisi");
      return;
    } else if (tahun.trim() === "") {
      alert("Lengkapi Tahun Rekognisi Dosen");
      return;
    }

    // Membuat objek form Data
    var formData = new FormData();
    formData.append("no", no);
    formData.append("nama", nama);
    formData.append("bidang_keahlian", bidang_keahlian);
    formData.append("rekognisi", rekognisi);
    formData.append("tingkat", tingkat);
    formData.append("tahun", tahun);
    formData.append("_method", "PUT");

    // Kirim Data untuk Edit Tabel 3.d Ke Endpoint API
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
          throw new Error("Edit Data Tabel 3.d Rekognisi Dosen Sukses");
        }
      })
      .then(function (data) {
        // Edit Data pengguna jika sukses dan mengarahkan ke ../View/3d.php
        alert("Edit Data Tabel 3.d Rekognisi Dosen Sukses");
        window.location.href = "../../View/3d.php";
      })
      .catch(function (error) {
        // Mengangani kesalahan
        console.error(error);
        alert(error.message);
      });
  });
});
