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
    <?php
include "../Controller/daftar_tabel.php";
// include "../Controller/nilai_2b.php";
include "../Controller/nilai_2c.php";
include "../Controller/nilai_3a1.php";
include "../Controller/nilai_3a2.php";
include "../Controller/nilai_3a3.php";
include "../Controller/nilai_3a4.php";
include "../Controller/nilai_3b.php";
include "../Controller/nilai_3c1.php";
include "../Controller/nilai_3c2.php";
include "../Controller/nilai_3d.php";
include "../Controller/nilai_5b1.php";
include "../Controller/nilai_5b2.php";

// Hitung Total Skor Laporan Kinerja 
$nilai_laporan_kinerja=0;
$nilai_laporan_evaluasi_diri=0;
$nilai_akreditasi=0;
/** Variabel Hasiol Skor
 * 7 $skor_mahasiswa_asing (2b)
 * 8 $skor_kredit_matakuliah (2c)
 * 9 $skor_rasio_dosen (3a1)
 * 10 $skor_tabel_jabatan_fungsional (3a2)
 * 11 $skor_dosen_bersertifikat (3a3)
 * 12 $skor_dosen_tidak_tetap (3a4)
 * 14 $skor_tabel_penelitian (3c1)
 * 15 $skor_tabel_pkm (3c2)
 */

$nilai_laporan_kinerja = $skor_kredit_matakuliah+$skor_rasio_dosen+$skor_tabel_jabatan_fungsional+$skor_dosen_bersertifikat+$skor_dosen_tidak_tetap+$skor_tabel_penelitian+$skor_tabel_pkm;
$nilai_akreditasi = $nilai_laporan_kinerja + $nilai_laporan_evaluasi_diri;
// Syarat perlu peringkat Akreditasi 

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
                                <img class="p-1" src="../includes/contents/Image/Bu_Tita.png" alt="profile" />
                                <p class="p-1 mb-0">Hi! Tita Karlita</p>
                                <i class="fa-sharp fa-solid fa-chevron-down"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a href="pengaturan.php" class="dropdown-item">
                                <i class="fa-regular fa-gear text-primary"></i>
                                Pengaturan
                            </a>
                            <a href="index.php" class="dropdown-item">
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
            <nav class="sidebar sidebar-offcanvas fiz" id="sidebar">
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
                        <a class="nav-link" href="">
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
                                    <h3 class="font-weight-bold">Welcome, Tita Karlita...</h3>
                                    <h6 class="font-weight-normal mb-0">Selamat datang di Sistem Informasi Manajemen
                                        Akreditasi</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Skoor -->
                    <div class="row">
                        <div class="col-md-12 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">
                                                Nilai Laporan Kinerja
                                            </p>
                                            <p class="fs-30 mb-2">
                                                <?php
                                                echo $nilai_laporan_kinerja;
                                                ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Nilai Laporan Evaluasi Diri</p>
                                            <p class="fs-30 mb-2"><?php echo $nilai_laporan_evaluasi_diri ?></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Nilai Akreditasi</p>
                                            <p class="fs-30 mb-2"><?php echo $nilai_akreditasi ?></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Peringkat Akreditasi</p>
                                            <p class="fs-30 mb-2">Baik</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Total Skoor -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Elemen & Indikator Akreditasi

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php

                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/elemen_indikator_akreditasi.php');

                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);

                                                echo '<table class="display expandable-table" style="width:100%;">';
                                                        echo '<thead>';
                                                        echo' <tr>
                                                                <th>Nomor</th>
                                                                <th>Bab/Kriteria</th>
                                                                <th>Indikator</th>
                                                                <th>Skoor Tabel</th>
                                                        
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NO'] . '</td>';
                                                            echo '<td>' . $row['BAB_KRITERIA'] . '</td>';
                                                            echo '<td>' . $row['INDIKATOR'] . '</td>';
                                                            echo '<td>' . $row['SKOOR'] . '</td>';
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
    <!-- container-scroller -->
    <script src="../themes/layout.js"></script>

    <!-- container-scroller -->
    <script src="../themes/layout.js"></script>
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