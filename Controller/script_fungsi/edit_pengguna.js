document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");
  form.addEventListener("submit", function (event) {
    event.preventDefault();
    var nomor = form.elements.nomor.value;
    var nama_lengkap = form.elements.nama_lengkap.value;
    var nip = form.elements.nip.value;
    var user_role = form.elements.user_role.value;
    var email = form.elements.email.value;
    var no_telepon = form.elements.no_telepon.value;

    // Validasi input form pengguna
    if (nomor.trim() === "") {
      alert("Nomor Pengguna Tidak Tersedia");
      return;
    } else if (nama_lengkap.trim() === "") {
      alert("Lengkapi Nama Lengkap Pengguna");
      return;
    } else if (nip.trim() === "") {
      alert("Lengkapi NIP");
      return;
    } else if (user_role.trim() === "") {
      alert("Lengkapi User Role");
      return;
    } else if (email.trim() === "") {
      alert("Lengkapi Email Pengguna");
      return;
    } else if (no_telepon.trim() === "") {
      alert("Lengkapi Nomor Telepon");
      return;
    }

    // Membuat objek form data
    var formData = new FormData();
    formData.append("nomor", nomor);
    formData.append("nama_lengkap", nama_lengkap);
    formData.append("nip", nip);
    formData.append("user_role", user_role);
    formData.append("email", email);
    formData.append("no_telepon", no_telepon);
    formData.append("_method", "put");

    // Kirim Data edit penggunak ke endpoint API
    fetch("https://project.mis.pens.ac.id/mis143/API/login_register.php", {
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
          throw new Error("Edit Data Pengguna Sukses");
        }
      })
      .then(function (data) {
        // Edit data pengguna jika sukses dan mengarahkn ke ../View/daftar_pengguna.php
        alert("Edit Data Pengguna Sukses");
        window.location.href = "../../View/daftar_pengguna.php";
      })
      .catch(function (error) {
        // Menangani kesalahan
        console.error(error);
        alert(error.message);
      });
  });
});
