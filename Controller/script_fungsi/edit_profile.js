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
      alert("Lengkapi Session nomor");
      return;
    } else if (nama_lengkap.trim() === "") {
      alert("Lengkapi Nama Lengkap Anda");
      return;
    } else if (nip.trim() === "") {
      alert("Lengkapi NIP");
      return;
    } else if (user_role.trim() === "") {
      alert("Lengkapi user_role");
      return;
    } else if (email.trim() === "") {
      alert("Lengkapi email anda");
      return;
    } else if (no_telepon.trim() === "") {
      alert("Lengkapi nomor telepon");
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
    formData.append("_method", "put_session");

    // Kirim Data Edit ke server dengan fetch API
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
          throw new Error("Edit Profile Sukses");
        }
      })
      .then(function (data) {
        // Mengubah Nilai session di sisi klien
        var sessionData = {
          NAMA_LENGKAP: data.NAMA_LENGKAP,
          NIP: data.NIP,
          EMAIL: data.EMAIL,
          NO_TELEPON: data.NO_TELEPON,
        };
        // Menyimpan sessionData ke sessionStorage
        sessionStorage.setItem("sessionData", JSON.stringify(sessionData));

        // Jika Edit Profile Sukses maka mengarahkan pengguna ke page pengaturan
        alert("Edit Profile Sukses");
        window.location.href = "../../View/pengaturan.php";
      })
      .catch(function (error) {
        // Menangani kesalahan
        console.error(error);
        alert(error.message);
      });
  });
});
