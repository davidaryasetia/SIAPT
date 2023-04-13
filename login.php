<!DOCTYPE html>
<html>

<head>
    <title>Login SIAPT</title>
    <link rel="stylesheet" type="text/css" href="themes\style.css">

</head>

<body>
    <div class="container">
        <!-- <p style="color: black;">&larr; <a href="index.php" style="color: black; font-weight:bold;">Home</a> -->
        <form action="dashboard.php" method="" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Masuk</p>
            <p class="description-text">Masukkan Email dan Kata Sandi Anda.</p>
            <div class="input-group">
                <input type="email" placeholder="Masukkan Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>

</html>