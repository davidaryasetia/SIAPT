<?php 
 

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="themes\style.css">


    <title>Register SIAPT</title>
</head>

<body>
    <div class="container">
        <form action="login.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800; padding-bottom:20px">Registrasi Akun</p>
            <div class="input-group">
                <input type="text" placeholder="Nama lengkap" name="nama_lengkap" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="NIP" name="nip" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="kata_sa" placeholder="Kata Sandi" name="kata_sandi" required>
            </div>
            <div class="input-group">
                <button name="register" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>

</html>