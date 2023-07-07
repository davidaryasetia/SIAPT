<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- Font Awesome Icon -->
    <link href="includes/contents/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="includes/contents/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="includes/contents/assets/fontawesome/css/solid.css" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- Logo Tab -->
    <link rel="shortcut icon" href="includes/contents/Image/logo_svg.svg" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="navbar-brand brand-logo mr-5" href="index.html">
                                <img src="includes/contents/Image/logo_svg.svg" class="mr-2 w-25 h-25" alt="logo" />
                            </div>
                            <h4>Halo! Selamat Datang di Web SIAPT</h4>
                            <h6 class="font-weight-light">Silahkan Register</h6>
                            <form action="" method="POST" class="form-sample pt-3" onsubmit="register(event)">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-lg" id="" name="nama_lengkap"
                                        placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="number" class="form-control form-control-lg" id="" name="nip"
                                        placeholder="NIP">
                                </div>
                                <div class="form-group">
                                    <label for="nip">User Role</label>
                                    <select class="form-control form-control-lg" id="" name="user_role">
                                        <option>Pilih User Role</option>
                                        <option value="Tim PJM">Tim PJM</option>
                                        <option value="Tim Akreditasi">Tim Akreditasi</option>
                                        <option value="Kaprodi">Kaprodi</option>
                                        <option value="Wadir">Wadir</option>
                                        <option value="Reviewer Internal">Reviewer Internal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-lg" name="email" id=""
                                        placeholder="Masukkan Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-lg" id="" name="password"
                                        placeholder="Masukkan Password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Konfirmasi Password</label>
                                    <input type="password" class="form-control form-control-lg" id=""
                                        name="konfirmasi_password" placeholder="Masukkan Password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Nomor Telepon</label>
                                    <input type="number" class="form-control form-control-lg" id="exampleInput"
                                        name="no_telepon" placeholder="Masukkan Nomor Telepon">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="">Register</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Sudah Mempunyai Akun?
                                    <a href="login.php" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- Script JS For Register -->
    <script src="Controller/script_fungsi/register.js"></script>
    <!-- Script JS For Register -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>