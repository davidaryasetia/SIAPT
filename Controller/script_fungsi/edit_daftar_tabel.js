document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");
  form.addEventListener("submit", function (event) {
    event.preventDefault();
    var no = form.elements.no.value;
    var judul = form.elements.judul.value;
    var sheet = form.elements.sheet.value;
    var status = form.elements.status.value;
    var sumber = form.elements.sumber.value;

    // Validasi input pengguna tidak boleh kosong
    if (no.trim() === "") {
      alert("Lengkapi Nomor");
      return;
    } else if (judul.trim() === "") {
      alert("Lengkapi Judul");
      return;
    } else if (sheet.trim() === "") {
      alert("Lengkapi Sheet");
      return;
    } else if (status.trim() === "") {
      alert("Lengkapi Status Kategori Data");
      return;
    } else if (sumber.trim() === "") {
      alert("Lengkapi Sumber Data");
      return;
    }

    // Membuat objek form data
    var formData = new FormData();
    formData.append("no", no);
    formData.append("judul", judul);
    formData.append("sheet", sheet);
    formData.append("status", status);
    formData.append("sumber", sumber);
    formData.append("_method", "PUT");

    // Kirim Data edit pengguna ke endpoint API
    fetch("https://project.mis.pens.ac.id/mis143/API/TABEL_LKPT.php", {
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
          throw new Error("Edit Data Tabel LKPT Sukses");
        }
      })
      .then(function (data) {
        // Edit data pengguna jika sukses dan mengarahkn ke ../View/daftar_pengguna.php
        alert("Edit Data Tabel LKPT Sukses");
        window.location.href = "../../View/daftar_tabel.php";
      })
      .catch(function (error) {
        // Menangani kesalahan
        console.error(error);
        alert(error.message);
      });
  });
});
