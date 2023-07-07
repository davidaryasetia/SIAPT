<?php
session_start();

// Check jika sesi tidak ada atau tidak valid
if(!isset($_SESSION['EMAIL'])){
    // Redirect ke halaman login
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Tabel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/feather/feather.css">
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <link rel="stylesheet" type="text/css" href="../themes/layout.css">
    <!-- Font Awesome Icon -->
    <link href="../includes/contents/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../includes/contents/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../includes/contents/assets/fontawesome/css/solid.css" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- Logo Tab -->
    <link rel="shortcut icon" href="../includes/contents/Image/logo_svg.svg" />

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a href="beranda.php" class="navbar-brand brand-logo mr-5" href="index.html">
                    <img src="../includes/contents/Image/logo_svg.svg" class="mr-2 w-25 h-25" alt="logo" /></a>
                <a href="beranda.php" class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="../includes/contents/Image/logo_svg.svg" class="w-20 h-20" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle d-flex flex-row align-align-items-center justify-content-center"
                            href="#" data-toggle="dropdown" id="profileDropdown">
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="p-1" src="../includes/contents/Image/Bu_Tita.png" alt="profile" />
                                <p class="p-1 mb-0">Hi! <?php echo $_SESSION['NAMA_LENGKAP']; ?></p>
                                <i class="fa-sharp fa-solid fa-chevron-down"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a href="pengaturan.php" class="dropdown-item">
                                <i class="fa-regular fa-gear text-primary"></i>
                                Pengaturan
                            </a>
                            <a id="logout_navbar" href="" class="dropdown-item">
                                <i class="fa-regular fa-arrow-right-from-bracket text-primary"></i>
                                Keluar
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="beranda.php">
                            <i class="fa-regular fa-house menu-icon"></i>
                            <span class="menu-title">Beranda</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="daftar_tabel.php">
                            <i class="fa-regular fa-table menu-icon"></i>
                            <span class="menu-title">Daftar Tabel</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="pengaturan.php">
                            <i class="fa-regular fa-gear menu-icon"></i>
                            <span class="menu-title">Pengaturan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="logout_sidebar" class="nav-link" href="">
                            <i class="fa-regular fa-arrow-right-from-bracket menu-icon"></i>
                            <span class="menu-title">Keluar</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Tabel LKPT  -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title mr-3">Pengaturan</h3>
                                        <div class="card-title">
                                            <a href="../Form_Data/Tambah_Data/tambah_user.php"
                                                class="btn btn-sm btn-outline-dark" type="button">
                                                <i class="fa-solid fa-user-plus mr-2"></i>Tambah Anggota
                                            </a>
                                            <a href="../Form_Data/Edit_Data/pengaturan.php"
                                                class="btn btn-sm btn-outline-dark" type="button">
                                                <i class="fa-solid fa-pen mr-2"></i>Edit Profile
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mb-4 mt-4 mb-sm-5">
                                            <div class="card card-style1 border-0">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center">
                                                        <img src="../includes/contents/Image/Bu_Tita_1.png"
                                                            class="rounded" alt="..." width="200">
                                                    </div>
                                                    <div class="col-lg-9 px-xl-10 mt-4">
                                                        <div class="row d-flex flex-nowrap">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Nama Lengkap</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-dark">:
                                                                <?php echo $_SESSION['NAMA_LENGKAP']; ?>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row d-flex flex-nowrap">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">NIP</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-dark">:
                                                                <?php echo $_SESSION['NIP']; ?>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row d-flex flex-nowrap">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">User Role</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-dark">:
                                                                <?php echo $_SESSION['USER_ROLE']; ?>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row d-flex flex-nowrap">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Alamat Email</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-dark">:
                                                                <?php echo $_SESSION['EMAIL']; ?>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row d-flex flex-nowrap">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">No Telepon</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-dark">:
                                                                <?php echo $_SESSION['NO_TELEPON']; ?>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- JS untuk Proses fungsi Logout-->
                            <script src="../Controller/script_fungsi/logout.js"></script>
                            <!-- End js -->

                            <script src="../vendors/js/vendor.bundle.base.js"></script>
                            <!-- endinject -->
                            <!-- Plugin js for this page -->
                            <script src="../vendors/chart.js/Chart.min.js"></script>
                            <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
                            <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
                            <script src="../js/dataTables.select.min.js"></script>
                            <!-- End plugin js for this page -->
                            <!-- inject:js -->
                            <script src="../js/off-canvas.js"></script>
                            <script src="../js/hoverable-collapse.js"></script>
                            <script src="../js/template.js"></script>
                            <script src="../js/settings.js"></script>
                            <script src="../js/todolist.js"></script>
                            <!-- endinject -->
                            <!-- Custom js for this page-->
                            <script src="../js/dashboard.js"></script>
                            <script src="../js/Chart.roundedBarCharts.js"></script>
                            <!-- End custom js for this page-->
</body>

</html>