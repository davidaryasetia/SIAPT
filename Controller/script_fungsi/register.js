document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");
  form.addEventListener("submit", function (event) {
    event.preventDefault();
    var nama_lengkap = form.elements.nama_lengkap.value;
    var nip = form.elements.nip.value;
    var user_role = form.elements.user_role.value;
    var email = form.elements.email.value;
    var password = form.elements.password.value;
    var konfirmasi_password = form.elements.konfirmasi_password.value;
    var no_telepon = form.elements.no_telepon.value;
    // Validasi email dan password jika kosong
    if (nama_lengkap.trim() === "") {
      alert("Lengkapi Nama Lengkap");
      return;
    } else if (nip.trim() === "") {
      alert("Lengkapi NIP");
      return;
    } else if (user_role.trim() === "") {
      alert("Lengkapi user role");
      return;
    } else if (email.trim() === "") {
      alert("Lengkapi Email");
      return;
    } else if (password.trim() === "") {
      alert("Lengkapi Passoword");
      return;
    } else if (konfirmasi_password.trim() === "") {
      alert("Konfirmasi Password");
      return;
    } else if (password !== konfirmasi_password) {
      alert("konfirmasi password tidak sesuai");
      return;
    } else if (no_telepon.trim() === "") {
      alert("Lengkapi nomor telepon");
      return;
    }

    // Membuat Objek Form Data
    var formData = new FormData();
    formData.append("nama_lengkap", nama_lengkap);
    formData.append("nip", nip);
    formData.append("user_role", user_role);
    formData.append("email", email);
    formData.append("password", password);
    formData.append("no_telepon", no_telepon);
    formData.append("_method", "register");

    // Kirim Data Login ke server dengan fetch API
    fetch("https://project.mis.pens.ac.id/mis143/API/login_register.php", {
      method: "POST",
      body: formData,
    })
      .then(function (response) {
        if (response.ok) {
          return response.json();
        } else if (response.status === 500) {
          return response.json().then(function (data) {
            throw new Errow(data.message);
          });
        } else {
          throw new Error("Pengguna Sukses Ditambahkan");
        }
      })
      .then(function (data) {
        // Jika register berhasil arahkan ke page pengaturan.php
        alert("Pengguna Sukses Ditambahkan");
        window.location.href = "../../View/pengaturan.php";
      })
      .catch(function (error) {
        // Menangani kesalahan
        console.error(error);
        alert(error.message);
      });
  });
});
