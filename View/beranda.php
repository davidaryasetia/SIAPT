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
    <link rel="stylesheet" type="text/css" href="../themes/toltip.css">
    <!-- Font Awesome Icon -->
    <link href="../includes/contents/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../includes/contents/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../includes/contents/assets/fontawesome/css/solid.css" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- Logo Tab -->
    <link rel="shortcut icon" href="../includes/contents/Image/logo_svg.svg" />
    <!-- Link CSS Data tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css" />
</head>

<body>
    <?php
    include "../Controller/nilai_beranda.php";
    // Check jika sesi tidak ada atau tidak valid
    if(!isset($_SESSION['EMAIL']) && !isset($_SESSION['NOMOR'])){
        // Redirect ke halaman login
        header('Location: ../login.php');
        exit();
    }
    ?>
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
                            <div class="d-flex align-items-center justify-content-center    ">
                                <img class="p-1" src="../includes/contents/user_profile/default.svg" alt="profile" />
                                <p class="p-1 mb-0">Hi! <?php echo $_SESSION['NAMA_LENGKAP'] ?></p>
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
                    <li class="nav-item">
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
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome, <?php echo $_SESSION['NAMA_LENGKAP'] ?>...
                                    </h3>
                                    <h6 class="font-weight-normal mb-0">Selamat datang di Sistem Informasi Manajemen
                                        Akreditasi</h6>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Total Skoor -->
                    <div class="row">
                        <div class="col-md-12 grid-margin transparent ">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="title_beranda mb-4">
                                                Nilai Laporan Kinerja Berdasarkan Tabel LKPT

                                                <!-- Toltip 1-->
                                                <a id="button1" class="btn" aria-describedby="tooltip1"><i
                                                        class="fa-solid fa-circle-info text-white"
                                                        style="font-size:24px;"></i>
                                                </a>
                                                <div id="tooltip1" role="tooltip1">
                                                    <p class="card-title mr-3">Rincian Perolehan Skor Nilai Laporan
                                                        Kinerja Berdasarkan List Tabel LKPT (Laporan Kinerja Perguruan
                                                        Tinggi)</p>
                                                    <!-- Looping Tabel LKPT Beserta Skoor -->
                                                    <?php
                                                    $skor_radar = $skor_array_radar; 
                                                    echo '<ul>';
                                                    foreach ($data_lkpt as $index => $row) {
                                                        // Logika menampilkan data berdasarkan data pilihan
                                                        if (in_array ($row['NO'], $data_pilihan)){
                                                            $row['SKOR'] = array_shift ($skor_radar);
                                                            echo '<li><span class="font-weight">' . $row['JUDUL'] .' : </span>' .$row['SKOR'] . '</li>';
                                                        }
                                                    }
                                                    echo '</ul>';
                                                    ?>
                                                    <!-- END Looping Tabel LKPT Beserta Skoor -->
                                                    <div id="arrow1" data-popper-arrow></div>
                                                </div>
                                                <!-- End Toltip -->
                                            </p>
                                            <p class="fs-30 mb-2">
                                                <?php
                                                echo $skor_iapt
                                                ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="title_beranda mb-4">
                                                Nilai Laporan Kinerja Berdasarkan Matriks IAPT 3.0
                                                <!-- Toltip 2-->
                                                <a id="button2" class="btn" aria-describedby="tooltip2"><i
                                                        class="fa-solid fa-circle-info text-white"
                                                        style="font-size:24px;"></i>
                                                </a>
                                                <div id="tooltip2" role="tooltip2">
                                                    <p class="card-title mr-3">Rincian Perolehan Skor Nilai Laporan
                                                        Kinerja Berdasarkan Matriks IAPT 3.0</p>
                                                    <!-- Looping Tabel LKPT Beserta Skoor -->
                                                    <?php
                                                    $skor_radar = $skor_array_radar; 
                                                    echo '<ul>';
                                                    foreach ($data_lkpt as $index => $row) {
                                                        // Logika menampilkan data berdasarkan data pilihan
                                                        if (in_array ($row['NO'], $data_pilihan)){
                                                            $row['SKOR'] = array_shift ($skor_radar);
                                                            echo '<li><span class="font-weight">' . $row['JUDUL'] .' : </span>' .$row['SKOR'] . '</li>';
                                                        }
                                                    }
                                                    echo '</ul>';
                                                    ?>
                                                    <!-- END Looping Tabel LKPT Beserta Skoor -->
                                                    <div id="arrow1" data-popper-arrow></div>
                                                </div>
                                            </p>
                                            <p class="fs-30 mb-2">
                                                <?php
                                                echo $skor_iapt
                                                ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Report Grafik Radar Infografis -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card position-relative">
                                <div class="card-body">
                                    <div id="detailedReports"
                                        class="carousel slide detailed-report-carousel position-static pt-2"
                                        data-ride="carousel" data-interval="false">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row">
                                                    <div class="col-md-12 col-xl-12">
                                                        <div class="row">
                                                            <div class="col-md-7 border-right">
                                                                <p class="card-title">Tabel Data Capaian Skoor LKPT
                                                                </p>
                                                                <div class="table-responsive">

                                                                    <?php
                                                            echo '<table id="table_radar" class="display expandable-table table-hover table-border" style="width:100%;">';
                                                                    echo '<thead>';
                                                                    echo' <tr>
                                                                            <th>No</th>
                                                                            <th>Tabel</th>
                                                                            <th>Sheet</th>
                                                                            <th>Maksimal</th>
                                                                            <th>Minimal</th>
                                                                            <th>Skoor Tabel</th>                                                        
                                                                        </tr>';
                                                                    echo '</thead>';
                                                                    echo '<tbody>';
                                                                    $skor_radar = $skor_array_radar; 
                                                                    foreach ($data_lkpt as $index => $row) {
                                                                        // Logika menampilkan data berdasarkan data pilihan
                                                                        if (in_array ($row['NO'], $data_pilihan)){
                                                                            $row['SKOR'] = array_shift ($skor_radar);

                                                                        echo '<tr>';
                                                                        echo '<td>' . $row['NO'] . '</td>';
                                                                        echo '<td>' . $row['JUDUL'] . '</td>';
                                                                        echo '<td><a href="' .$row['SHEET']. '.php">' .$row['SHEET']. '</a></td>';
                                                                        echo '<td style="color:green">' . $skor_maksimal . '</td>';
                                                                        echo '<td style="color: orange">' . $skor_minimal . '</td>';
                                                                        
                                                                        if($row['SKOR'] == 4){
                                                                            echo '<td style="color:green; font-weight:bold">' .$row['SKOR']. '</td>';
                                                                        } else if($row['SKOR'] < 4 && $row['SKOR'] > 0){
                                                                            echo '<td style="color:orange; font-weight:bold">' .$row['SKOR']. '</td>';
                                                                        } else {
                                                                            echo '<td style="color:red; font-weight:bold">' .$row['SKOR']. '</td>';
                                                                        }
                                                                        echo '</tr>';
                                                                        }
                                                                    }
                                                                echo '</tbody>';
                                                                // echo '<tfoot class="table-row">';
                                                                //    echo '<tr >';
                                                                //     echo '<td class="total" colspan="2">Total Skoor Matriks IAPT 3.0 Berdasarkan Tabel LKPT</td>';
                                                                //     echo '<td></td>';
                                                                //     echo '<td></td>';   
                                                                //     echo '<td>' .$skor_iapt. '</td>';
                                                                //     echo '</tr>';
                                                                //     echo '</tfoot>';
                                                                echo '</table>'
                                                                ?>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 mt-3">
                                                                <p class="card-title">Grafik Radar Capaian Skoor LKPT
                                                                </p>
                                                                <div id="container">
                                                                    <canvas id="grafik_radar"></canvas>
                                                                </div>
                                                                <div id="legen"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Carousel 2 -->
                                            <div class=" carousel-item">
                                                <!-- Logic  Frontend Row-->

                                                <!-- Logic  Frontend Row-->
                                            </div>
                                        </div>
                                        <!-- <a class="carousel-control-prev" href="#detailedReports" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#detailedReports" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Report Grafik Radar Infografis -->

                    <!-- Matriks IAPT 3.0 -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <p class="card-title mr-3">Elemen & Indikator Akreditasi
                                            Berdasarkan Matriks
                                            LKPT
                                        </p>
                                        <div class="card-title">
                                            <button class="btn btn-sm btn-primary" type="button" id="dropdownMenu"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Daftar Tabel <i class="fa-solid fa-chevron-down ml-2"></i>
                                            </button>

                                            <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenu"
                                                id="dropdownMenuContent">
                                                <div class="list-wrapper pt-2">
                                                    <a href="daftar_tabel.php" type="button" href="daftar_tabel.php"
                                                        class="dropdown btn btn-sm btn-outline-primary ml-1 mt-1 mb-1 active">
                                                        Daftar Tabel
                                                    </a>
                                                    <?php foreach ($data_lkpt as $row) : ?>
                                                    <a href="<?php echo $row['SHEET'] . '.php'; ?>" type="button"
                                                        class="dropdown btn btn-sm btn-outline-primary ml-1 mt-1 mb-1">
                                                        <?php echo $row['SHEET']; ?>
                                                    </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <a href="../Controller/export/resume_beranda.php" type="button"
                                                class="btn btn-sm btn-primary btn-icon-text ml-2">
                                                <i class="fa-solid fa-file-pdf"></i>
                                                Export Data
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <?php
                                                echo '<table id="table" class="display expandable-table table-hover table-border" style="width:100%;">';
                                                        echo '<thead>';
                                                        echo' <tr>
                                                                <th>No Butir</th>
                                                                <th>Bab/Kriteria/Elemen</th>
                                                                <th>Indikator</th>
                                                                <th>Sheet</th>
                                                                <th>Rumus</th>
                                                                <th>Skoor Tabel</th>                                                        
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        $skorCount = count($skorArray); // Jumlah elemen dalam $skorArray
                                                        foreach ($data as $index => $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NO'] . '</td>';
                                                            echo '<td>' . $row['BAB'] . '</td>';
                                                            echo '<td>' . $row['INDIKATOR'] . '</td>';
                                                            echo '<td><a href="' .$row['SHEET']. '.php">' .$row['SHEET']. '</a></td>';
                                                            
                                                            // Memanggil Rumus
                                                            echo '<td>';
                                                            echo '<a class="btn-icon" class="tooltip" data-toggle="tooltip" data-html="true" title="' . $row['RUMUS'] . '">';
                                                            echo '<i class="fa-solid fa-circle-info" style="font-size:20px;"></i>';
                                                            echo '</a>';
                                                            echo '</td>';

                                                            // Retrive Skor
                                                            $skor = ($index < $skorCount) ? $skorArray[$index] : '';
                                                            if($skor == 4){
                                                                echo '<td style="color:green; font-weight:bold">' .$skor. '</td>';
                                                            } else if($skor < 4 && $skor> 0){
                                                                echo '<td style="color:orange; font-weight:bold">' .$skor. '</td>';
                                                            } else {
                                                                echo '<td style="color:red; font-weight:bold">' .$skor. '</td>';
                                                            }
                                                            echo '</tr>';
                                                            }
                                                    echo '</tbody>';
                                                    // echo '<tfoot class="table-row">';
                                                    //    echo '<tr >';
                                                    //     echo '<td class="total" colspan="2">Total Skoor Matriks IAPT 3.0 Berdasarkan Tabel LKPT</td>';
                                                    //     echo '<td></td>';
                                                    //     echo '<td></td>';   
                                                    //     echo '<td>' .$skor_iapt. '</td>';
                                                    //     echo '</tr>';
                                                    //     echo '</tfoot>';
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
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made
                                With love
                                by
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
    <!-- Script untuk Layout Tabel -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ], // Mengganti nama -1 menjadi All
                "scrollY": "350px",
                "scrollCollapse": true
            });
        });
        $(document).ready(function () {
            $('#table_radar').DataTable({
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ], // Mengganti nama -1 menjadi All
                "scrollY": "350px",
                "scrollCollapse": true
            });
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <!-- Script Untuk Fungsi Tootip -->
    <script src="../Controller/script_fungsi/toltip.js"></script>

    <!-- Script Untuk Fungsi Radar JS -->
    <script src="../Controller/script_fungsi/grafik_radar.js"></script>

    <!-- JS untuk Proses fungsi Logout-->
    <script src="../Controller/script_fungsi/logout_view.js"></script>
    <!-- plugins:js -->
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