document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    var email = form.elements.email.value;
    var password = form.elements.password.value;

    // Validasi email dan passwor jika kosong
    if (email.trim() === "" && password.trim() === "") {
      alert("Mohon Lengkapi email dan Password Anda");
      return;
    } else if (email.trim() === "") {
      alert("Mohon Lengkapi email Anda");
      return;
    } else if (password.trim() === "") {
      alert("Mohon Lengkapi Password Anda");
      return;
    }

    // Membuat Objek Form Data
    var formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);
    formData.append("_method", "login");

    // Kirim Data login ke server dengan fetch API
    fetch("https://project.mis.pens.ac.id/mis143/API/login_register.php", {
      method: "POST",
      body: formData,
    })
      .then(function (response) {
        if (response.ok) {
          return response.json();
        } else if (response.status === 401) {
          return response.json().then(function (data) {
            if (data.message === "Invalid Email") {
              throw new Error("Email Yang Anda Masukkan Tidak Terdaftar");
            } else if (data.message === "Invalid Password") {
              throw new Error("Passsword Yang Anda Masukkan Salah");
            } else {
              throw new Error("Login Gagal. Tolong ulangi kembali");
            }
          });
        } else {
          throw new Error("Login Gagal. Tolong ulangi kembali");
        }
      })
      .then(function (data) {
        // Jika login berhasil arahkan pengguna ke halaman
        window.location.href = "View/pengaturan.php";
      })
      .catch(function (error) {
        // Menangani Kesalahan
        console.error(error);
        alert(error.message);
      });
  });
});
