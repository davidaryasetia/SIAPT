document.getElementById("logout_navbar").addEventListener("click", logout);
document.getElementById("logout_sidebar").addEventListener("click", logout);

function logout(event) {
  event.preventDefault();
  // Membuat objek formData
  var formData = new FormData();
  formData.append("_method", "logout");

  // Kirim permintaan logout ke server menggunakan fetch api
  fetch("https://project.mis.pens.ac.id/mis143/API/login_register.php", {
    method: "POST",
    body: formData,
  })
    .then(function (response) {
      if (response.ok) {
        // Logout berhasil arahkan ke halaman login
        window.location.href = "../login.php";
      } else {
        // Tampilkan pesan error jika logout gagal
        throw new Error("Logout Gagal. Silahkan coba lagi");
      }
    })
    .catch(function (error) {
      // Target Kesalahan
      console.error(error);
      alert(error.message);
    });
}

function login(event) {
  event.preventDefault();

  var form = event.target;
  var email = form.email.value;
  var password = form.password.value;

  // Validasi Email dan Password  jika kosong
  if (email.trim() === "" && password.trim() === "") {
    alert("Mohon Lengkapi Email dan Password Anda");
    return;
  } else if (email.trim() === "") {
    alert("Mohon Lengkapi Email Anda");
    return;
  } else if (password.trim() === "") {
    alert("Mohon Lengkapi Password Anda");
    return;
  }

  // Membuat objek FormData
  var formData = new FormData();
  formData.append("email", email);
  formData.append("password", password);
  formData.append("_method", "login");

  // Kirim data login ke server memggunakan fetch api
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
            throw new Error("Email Yang Anda Masukkan Tidak Tersedia");
          } else if (data.message === "Invalid Password") {
            throw new Error("Password Yang Anda Masukkan Salah");
          } else {
            throw new Error("Login Failed. Tolong ulangi lagi");
          }
        });
      } else {
        throw new Error("Login failed. Tolong ulangi lagi");
      }
    })
    .then(function (data) {
      // Jika login berhasil, arahkan pengguna ke halaman
      window.location.href = "View/pengaturan.php";
    })
    .catch(function (error) {
      // Menangani kesalahan
      console.error(error);
      alert(error.message);
    });
}
