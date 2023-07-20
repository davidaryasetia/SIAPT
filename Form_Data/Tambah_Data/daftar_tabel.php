<?php
session_start();

if (!isset($_SESSION['EMAIL']) && !isset($_SESSION['NOMOR'])){
    // Redirect ke halaman ../../
    header('Location: ../../login.php');
    exit();
}
?>

<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah LKPT</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link rel="stylesheet" type="text/css" href="../../themes\styling.css">
    <!-- Font Awesome Icon -->
    <link href="../../includes/contents/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../../includes/contents/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../../includes/contents/assets/fontawesome/css/solid.css" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- Logo Tab -->
    <link rel="shortcut icon" href="../../includes/contents/Image/logo_svg.svg" />
    <script>
        function redirectToDaftarTabel() {
            window.location.href =
                "https://project.mis.pens.ac.id/mis143/View/daftar_tabel.php";
        }
    </script>
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
                                <p class="p-1 mb-0">Hi! <?php $_SESSION['NAMA_LENGKAP'] ?></p>
                                <i class="fa-sharp fa-solid fa-chevron-down"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a href="../../pengaturan.php" class="dropdown-item">
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
                                    <div class="d-flex justify-content-center">
                                        <p class="card-title">Tambah Data - Laporan Kinerja Perguruan Tinggi
                                    </div>
                                    <div class="row">
                                        <!-- Start Fech API Endpoint -->
                                        <?php
                                        // Jika formulir dikirim maka submit
                                        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                                            // mengambil nilai dari input form
                                            $judul = $_POST['judul'];
                                            $sheet = $_POST['sheet'];
                                            $status = $_POST['status'];
                                            $sumber = $_POST['sumber'];

                                            // Data yang akan dikirimkan dalam format array
                                            $data = array(
                                                'judul' => $judul, 
                                                'sheet' => $sheet, 
                                                'status' => $status, 
                                                'sumber' => $sumber
                                            );

                                            // Mengubah data menjadi string json
                                            $json_data = json_encode($data);

                                            // Mengirimkan data ke endpoint API menggunakan fungsi file_get_contents()
                                            $url = 'https://project.mis.pens.ac.id/mis143/API/TABEL_LKPT.php';
                                            $options = array(
                                                'http' => array(
                                                    'method' => 'POST', 
                                                    'header' => 'Content-Type: application/json', 
                                                    'content' => $json_data
                                                )
                                                );
                                                $context = stream_context_create($options);

                                                // Variabel Respons untuk menampung logic response data
                                                $response = file_get_contents($url, false, $context);

                                                 // Memeriksa response dari API
                                            if ($response !== false) {
                                                $responseData = json_decode($response, true);
                                                if (isset($responseData['Pesan'])) {
                                                    // Menampilkan pesan sukses
                                                    echo '<script>alert("Sukses: ' . $responseData['Pesan'] . '"); redirectToDaftarTabel();</script>';
                                                } else {
                                                    // Tampilkan pop up error jika respon API tidak valid
                                                    echo '<script>alert("Gagal: Respon API tidak valid");</script>';
                                                }
                                            } else {
                                                // Tampilkan pop up error jika tidak dapat terhubung ke API 
                                                echo '<script>alert("Gagal: Tidak dapat terhubung ke API");</script>';
                                            }               
                                        }
                                        ?>
                                        <!-- End Fetch API Endpoint -->


                                        <!-- Start Form -->
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form class="forms-sample" method="POST" action="">
                                                        <div class="form-group">
                                                            <label for="judul">Nomor dan Judul
                                                                Tabel</label>
                                                            <input type="text" class="form-control" id="judul"
                                                                name="judul" placeholder="Judul Tabel" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="sheet">Nama Sheet</label>
                                                            <input type="text" class="form-control" id="sheet"
                                                                name="sheet" placeholder="Nama Sheet" />
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="status">Status Data</label>
                                                                <select class="form-control" id="status" name="status">
                                                                    <option value="">Pilih Kategori Data</option>
                                                                    <option value="Data Lengkap">Data Lengkap</option>
                                                                    <option value="Data Tidak Lengkap">Data Tidak
                                                                        Lengkap
                                                                    </option>
                                                                    <option value="Data Tidak Tersedia">Data Tidak
                                                                        Tersedia
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="sumber">Sumber Data</label>
                                                                <select class="form-control" id="sumber" name="sumber">
                                                                    <option value="">Pilih Sumber Data</option>
                                                                    <option value="Data DB MIS">Data DB MIS</option>
                                                                    <option value="Data Dummy">Data Dummy</option>
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