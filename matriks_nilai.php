<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">

</head>

<body>
    <?php


?>


    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo.svg" class="mr-2"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <p>Halo David...</p>
                            <!-- <i class="icon-arrow-down ml-1 mr-1 pb-1"></i> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="">
                                <i class="ti-power-off text-primary"></i>
                                Logout
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
                        <a class="nav-link" href="dashboard.php">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Beranda</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="matriks_nilai.php">
                            <i class="icon-content-left menu-icon"></i>
                            <span class="menu-title">Matriks Nilai</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Analisa Data</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Pengaturan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Keluar</span>
                        </a>
                    </li>
                </ul>


            </nav>



            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Matriks Nilai LKPT</h3>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 3.b Rasio Dosen Terhadap Mahasiswa
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/rasio_dosen_mhs.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);

                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Unit Pengelola (Departemen/Jurusan)</th>
                                                                <th>Jumlah Dosen</th>
                                                                <th>Jumlah Mahasiswa</th>
                                                                <th>Jumlah Mahasiswa TA</th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NOMOR'] . '</td>';
                                                            echo '<td>' . $row['DEPARTEMEN'] . '</td>';
                                                            echo '<td>' . $row['COUNT(DISTINCTPEGAWAI.NIP)'] . '</td>';
                                                            echo '<td>' . $row['COUNT(DISTINCTMAHASISWA.NRP)'] . '</td>';
                                                            echo '</tr>';
                                                        }
                                                       echo '</tbody>';
                                                    echo '</table>'
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                </div>


                                <!-- Tabel -->
                                <div class="card-body mt-5">
                                    <p class="card-title">Tabel 2.b Mahasiswa Asing
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/mahasiswa_asing.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);

                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Program Sudi</th>
                                                                <th>TS-2</th>
                                                                <th>TS-1</th>
                                                                <th>TS</th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NOMOR'] . '</td>';
                                                            echo '<td>' . $row['Program Studi'] . '</td>';
                                                            echo '<td>' . $row['TS-2'] . '</td>';
                                                            echo '<td>' . $row['TS-1'] . '</td>';
                                                            echo '<td>' . $row['TS'] . '</td>';
                                                            echo '</tr>';
                                                        }
                                                       echo '</tbody>';
                                                    echo '</table>'
                                                    ?>
                                                </div>
                                            </div>
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
                                <a href="davidaryasetia.site">davidaryasetia.site</a>
                                <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>