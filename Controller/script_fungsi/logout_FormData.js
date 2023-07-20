// JS Untuk Mengarahkan Logout dari page folder View ke "../login.php"

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
        window.location.href = "../../login.php";
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
