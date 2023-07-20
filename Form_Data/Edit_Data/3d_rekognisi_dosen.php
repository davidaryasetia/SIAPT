<?php
session_start();

if (!isset($_SESSION['EMAIL']) && !isset($_SESSION['NOMOR'])){
    // Redirect ke ../../login.php
    header ('Location: ../../login.php');
    exit();
}

?>

<?php
$no = $_GET['no'];

// Fetch API Berdasarkan Nomor
$response_tabel = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php?no=' .$no );
$tabel = json_decode($response_tabel, true);

// Mengambil Value
if ($tabel){
    $no = $tabel['NO'];
    $nama = $tabel['NAMA'];
    $bidang_keahlian = $tabel['BIDANG_KEAHLIAN'];
    $rekognisi = $tabel['REKOGNISI'];
    $tingkat = $tabel['TINGKAT'];
    $tahun = $tabel['TAHUN'];
}
?>

<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit 3d</title>
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
                                        <h3 class="card-title mr-3"><a href="../../View/3d.php"><i
                                                    class="fa-solid fa-arrow-left mr-4 btn-outline-dark"></i></a>Daftar
                                            Tabel
                                            -
                                            Edit Tabel 3d Rekognisi Dosen</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form class="forms-sample" method="POST" action=""
                                                        onsubmit="(event)">
                                                        <input type="hidden" name="no" value="<?php echo $_GET['no']?>">
                                                        <div class="form-group">
                                                            <label for="nama">No</label>
                                                            <input type="text" class="form-control" id="" name=""
                                                                placeholder="" value="<?php echo $no; ?>" disabled />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama">Nama Dosen</label>
                                                            <input type="text" class="form-control" id="nama"
                                                                name="nama" placeholder="Nama Dosen"
                                                                value="<?php echo $nama; ?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bidang">Bidang Keahlian</label>
                                                            <input type="text" class="form-control" id="bidang_keahlian"
                                                                name="bidang_keahlian" placeholder="Bidang Keahlian"
                                                                value="<?php echo $bidang_keahlian ?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rekognisi">Rekognisi</label>
                                                            <textarea type="text"
                                                                class="form-control centered-placeholder" id="rekognisi"
                                                                name="rekognisi"
                                                                placeholder="Rekognisi Dosen"> <?php echo $rekognisi ?>     </textarea>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6 text-dark">
                                                                <label for="tingkat">Tingkat</label>
                                                                <select class="form-control text-dark" id="tingkat"
                                                                    name="tingkat">
                                                                    <option value="">Pilih Tingkat</option>
                                                                    <option value="Wilayah"
                                                                        <?php if($tingkat=='Wilayah') echo 'selected'; ?>>
                                                                        Wilayah
                                                                    </option>
                                                                    <option value="Nasional"
                                                                        <?php if($tingkat=='Nasional') echo 'selected'; ?>>
                                                                        Nasional
                                                                    </option>
                                                                    <option value="Internasional"
                                                                        <?php if($tingkat=='Internasional') echo 'selected'; ?>>
                                                                        Internasional
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6 text-dark">
                                                                <label for="tahun">Tahun Perolehan (YYYY)</label>
                                                                <select class="form-control text-dark" id="tahun"
                                                                    name="tahun">
                                                                    <option value="">Pilih Tahun</option>
                                                                    <option value="2023"
                                                                        <?php if($tahun==2023) echo 'selected'; ?>>2023
                                                                    </option>
                                                                    <option value="2022"
                                                                        <?php if($tahun==2022) echo 'selected'; ?>>2022
                                                                    </option>
                                                                    <option value="2021"
                                                                        <?php if($tahun==2020) echo 'selected'; ?>>2020
                                                                    </option>
                                                                    <option value="2020"
                                                                        <?php if($tahun==2020) echo 'selected'; ?>>2020
                                                                    </option>
                                                                    <option value="2019"
                                                                        <?php if($tahun==2019) echo 'selected'; ?>>2019
                                                                    </option>
                                                                    <option value="2018"
                                                                        <?php if($tahun==2018) echo 'selected'; ?>>2018
                                                                    </option>
                                                                    <option value="2017"
                                                                        <?php if($tahun==2017) echo 'selected'; ?>>2017
                                                                    </option>
                                                                    <option value="2016"
                                                                        <?php if($tahun==2016) echo 'selected'; ?>>2016
                                                                    </option>
                                                                    <option value="2015"
                                                                        <?php if($tahun==2015) echo 'selected'; ?>>2015
                                                                    </option>
                                                                    <option value="2014"
                                                                        <?php if($tahun==2014) echo 'selected'; ?>>2014
                                                                    </option>
                                                                    <option value="2013"
                                                                        <?php if($tahun==2013) echo 'selected'; ?>>2013
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mr-2">
                                                            Submit
                                                        </button>
                                                        <a href="../../View/3d.php"
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
    <script src="../../Controller/script_fungsi/edit_3d.js"></script>
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