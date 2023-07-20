<?php
session_start();

if (!isset($_SESSION['EMAIL']) && !isset($_SESSION['NOMOR'])){
    // Redirect ke halaman login 
    header('Location: ../../login.php');
    exit();
}
?>

<?php
$no = $_GET['no'];

// Fetch API berdasarkan nomor
$response_tabel = file_get_contents('https://project.mis.pens.ac.id/mis143/API/TABEL_LKPT.php?no=' .$no);
$tabel = json_decode($response_tabel, true);

// Mengambil value
if ($tabel){
    $judul = $tabel['JUDUL'];
    $sheet = $tabel['SHEET'];
    $status = $tabel['STATUS'];
    $sumber = $tabel['SUMBER'];
}
?>

<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit LKPT</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- Font Awesome Icon -->
    <link href="../../includes/contents/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../../includes/contents/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../../includes/contents/assets/fontawesome/css/solid.css" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- Logo Tab -->
    <link rel="shortcut icon" href="../../includes/contents/Image/logo_svg.svg" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html">
                    <img src="../../includes/contents/Image/logo_svg.svg" class="mr-2 w-25 h-25" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="../../includes/contents/Image/logo_svg.svg" class="w-20 h-20" alt="logo" /></a>
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
                                <img class="p-1" src="../../includes/contents/user_profile/default.svg" alt="profile" />
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
                        <a class="nav-link" href="../../View/beranda.php">
                            <i class="fa-regular fa-house menu-icon"></i>
                            <span class="menu-title">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../../View/daftar_tabel.php">
                            <i class="fa-regular fa-table menu-icon"></i>
                            <span class="menu-title">Daftar Tabel</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../View/pengaturan.php">
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
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12  grid-margin stretch-card ">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start">
                                        <h3 class="card-title mr-3"><a href="../../View/daftar_tabel.php"><i
                                                    class="fa-solid fa-arrow-left mr-4 btn-outline-dark"></i></a>Daftar
                                            Tabel
                                            -
                                            Edit Tabel Laporan Kinerja</h3>
                                    </div>
                                    <div class="row">
                                        <!-- End API Endpoint -->
                                        <!-- End Fetch API Endpoint Update Data -->
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form class="forms-sample" method="POST" action=""
                                                        onsubmit="(event)">
                                                        <div class="form-group">
                                                            <label for="judul">Nomor
                                                                Tabel</label>
                                                            <input type="number" class="form-control" id="no" name="no"
                                                                placeholder="Nomor" value="<?php echo $no ?>"
                                                                readonly />
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label for="judul">Nomor dan Judul
                                                                    Tabel</label>
                                                                <input type="" class="form-control" id="judul"
                                                                    name="judul" placeholder="Judul Tabel"
                                                                    value="<?php echo $judul; ?>" readonly />

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sheet">Nama Sheet</label>
                                                                <input type="" class="form-control" id="sheet"
                                                                    name="sheet" placeholder="Nama Sheet"
                                                                    value="<?php echo $sheet ?>" readonly />
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-6">
                                                                    <label for="status">Kategori Data</label>
                                                                    <select class="form-control text-dark" id="status"
                                                                        name="status">
                                                                        <option value="">Pilih Kategori Data</option>
                                                                        <option value="Data Lengkap"
                                                                            <?php if($status == 'Data Lengkap') echo 'selected'; ?>>
                                                                            Data Lengkap</option>
                                                                        <option value="Data Tidak Lengkap"
                                                                            <?php if($status == 'Data Tidak Lengkap') echo 'selected'; ?>>
                                                                            Data Tidak Lengkap
                                                                        </option>
                                                                        <option value="Data Tidak Tersedia"
                                                                            <?php if($status == 'Data Tidak Tersedia') echo 'selected'; ?>>
                                                                            Data Tidak Tersedia
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-6 text-dark">
                                                                    <label for="sumber">Sumber Data</label>
                                                                    <select class="form-control text-dark" id="sumber"
                                                                        name="sumber">
                                                                        <option value="">Pilih Sumber Data</option>
                                                                        <option value="Data DB MIS"
                                                                            <?php if($sumber == 'Data DB MIS') echo 'selected'; ?>>
                                                                            Data DB MIS</option>
                                                                        <option value="Data Dummy"
                                                                            <?php if($sumber == 'Data DB MIS') echo 'selected'; ?>>
                                                                            Data Dummy</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary mr-2">
                                                                Submit
                                                            </button>
                                                            <a href="../../View/daftar_tabel.php"
                                                                class="btn btn-outline-dark">Cancel</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                            <br />
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made With love by
                                <a href="http://www.davidaryasetia.site/" target="_blank">davidaryasetia.site</a>
                                <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- JS untuk Proses fungsi Logout-->
    <script src="../../Controller/script_fungsi/logout_FormData.js"></script>

    <!-- JS untuk Fetch Proses fungsi Edit Data-->
    <script src="../../Controller/script_fungsi/edit_daftar_tabel.js"></script>
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <script src="../../js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>