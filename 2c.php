<?php
include 'Controller/nilai_2c.php';
?>

<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Tabel</title>
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
    <link rel="stylesheet" type="text/css" href="themes/layout.css">
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

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html">
                    <img src="includes/contents/Image/logo_svg.svg" class="mr-2 w-25 h-25" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="includes/contents/Image/logo_svg.svg" class="w-20 h-20" alt="logo" /></a>
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
                                <img class="p-1" src="includes/contents/Image/Bu_Tita.png" alt="profile" />
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
                            <a href="login.php" class="dropdown-item">
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

                    <li class="nav-item active">
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
                    <!-- Tabel 2.c Kredit Mata Kuliah -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">Tabel 2.c Kredit Mata Kuliah
                                            <a href="daftar_tabel.php" type="button"
                                                class="btn btn-sm btn-primary btn-icon-text">
                                                <i class="fa-solid fa-arrow-left"></i>
                                                Daftar Tabel
                                            </a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary ml-2"
                                                data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa-solid fa-info"></i>
                                            </button>
                                            <!-- End Button Trigger -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="exampleModalLabel">Keterangan
                                                                Nilai
                                                            </h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
                                                           echo '<div class="skor">';
                                                           echo '<p> Jumlah Kredit Matakuliah Praktikum/praktik/praktik kerja lapangan: '. $total_kredit_praktik .'</p>';
                                                           echo '<p>Jumlah Kredit Seluruh Matakuliah: ' .$total_seluruh_kredit.'</p>';
                                                           echo '<p>Presentase Jumlah Kredit Matakuliah Bilangan Bulat :' .$presentase_kredit_matakuliah .'</p>';
                                                           echo '<p>Presentase Jumlah Kredit Matakuliah (%) :' .$presentase_kredit_matakuliah * 100 .'%</p>';
                                                           echo '<p>Skor Tabel :'.$skor_kredit_matakuliah.'</p>';
                                                           echo '</div>';
                                                           ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <?php
                                                echo '<table class="display expandable-table table-hover" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Program Studi</th>
                                                                <th>Teori</th>
                                                                <th>Praktikum</th>
                                                                <th>Praktik</th>
                                                                  <th>PKL</th>
                                                                <th>Total</th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['No.'] . '</td>';
                                                            echo '<td>' . $row['Program Studi'] . '</td>';
                                                            echo '<td>' . $row['Teori'] . '</td>';
                                                            echo '<td>' . $row['Praktikum'] . '</td>';
                                                            echo '<td>' . $row['Praktik'] . '</td>';
                                                            echo '<td>' . $row['PKL'] . '</td>';
                                                             // Total Query
                                                            $sum_total= intval($row['Program Studi']) + intval($row['Teori']) + intval($row['Praktikum']) + intval($row['Praktik']) + intval($row['PKL']);
                                                            echo '<td>' .$sum_total. '</td>';
                                                            echo '</tr>';                       
                                                        }

                                                        
                                                        // Tambah Row Data untuk Kolom Teori, Praktikum, Praktik, PKL
                                                        echo '<tr class="table-row">';
                                                        echo '<td colspan="2"><p class="total">Total</p></td>';
                                                        echo '<td>' .$total_teori.'</td>';
                                                        echo '<td>'. $total_praktikum .'</td>';
                                                        echo '<td>'. $total_praktik .'</td>';
                                                        echo '<td>'. $total_pkl .'</td>';
                                                        echo '<td>'. $total_kolom .'</td>';
                                                        echo '<tr>';
                                                       echo '</tbody>';
                                                    echo '</table>';
                                                   
                                                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tabel 2.c Kredit Mata Kuliah -->
                    <!-- Start Pagination -->
                    <div class="container">
                        <div class="pagination-container">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="daftar_tabel.php" type="button" href="daftar_tabel.php"
                                    class="btn btn-outline-primary">
                                    Daftar Tabel
                                </a>
                                <a href="1a1.php" type="button" class="btn btn-outline-primary">
                                    1a1
                                </a>
                                <a href="1a2.php" type="button" class="btn btn-outline-primary">
                                    1a2
                                </a>
                                <a href="1a3.php" type="button" class="btn btn-outline-primary">
                                    1a3
                                </a>
                                <a href="1b.php" type="button" class="btn btn-outline-primary">
                                    1b
                                </a>
                                <a href="1c.php" type="button" class="btn btn-outline-primary">
                                    1c
                                </a>
                                <a href="2a.php" type="button" class="btn btn-outline-primary">
                                    2a
                                </a>
                                <a href="2b.php" type="button" class="btn btn-outline-primary">
                                    2b
                                </a>
                                <a href="2c.php" type="button" class="btn btn-outline-primary active">
                                    2c
                                </a>
                                <a href="3a1.php" type="button" class="btn btn-outline-primary">
                                    3a1
                                </a>
                                <a href="3a2.php" type="button" class="btn btn-outline-primary">
                                    3a2
                                </a>
                                <a href="3a3.php" type="button" class="btn btn-outline-primary">
                                    3a3
                                </a>
                                <a href="3a4.php" type="button" class="btn btn-outline-primary">
                                    3a4
                                </a>
                                <a href="3b.php" type="button" class="btn btn-outline-primary">
                                    3b
                                </a>
                                <a href="3c1.php" type="button" class="btn btn-outline-primary">
                                    3c1
                                </a>
                                <a href="3c2.php" type="button" class="btn btn-outline-primary">
                                    3c2
                                </a>
                                <a href="3d.php" type="button" class="btn btn-outline-primary">
                                    3d
                                </a>
                                <a href="4a.php" type="button" class="btn btn-outline-primary">
                                    4a
                                </a>
                                <a href="4b.php" type="button" class="btn btn-outline-primary">
                                    4b
                                </a>
                                <a href="5a1.php" type="button" class="btn btn-outline-primary">
                                    5a1
                                </a>
                                <a href="5a2.php" type="button" class="btn btn-outline-primary">
                                    5a2
                                </a>
                                <a href="5b1.php" type="button" class="btn btn-outline-primary">
                                    5b1
                                </a>
                                <a href="5b2.php" type="button" class="btn btn-outline-primary">
                                    5b2
                                </a>
                                <a href="5c1.php" type="button" class="btn btn-outline-primary">
                                    5c1
                                </a>
                                <a href="5c2.php" type="button" class="btn btn-outline-primary">
                                    5c2
                                </a>
                                <a href="Ref5d1d2e2.php" type="button" class="btn btn-outline-primary">
                                    Ref 5d1d2e2
                                </a>
                                <a href="5d1.php" type="button" class="btn btn-outline-primary">
                                    5d1
                                </a>
                                <a href="5d2.php" type="button" class="btn btn-outline-primary">
                                    5d2
                                </a>
                                <a href="Ref5e1.php" type="button" class="btn btn-outline-primary">
                                    Ref 5e1
                                </a>
                                <a href="5e1.php" type="button" class="btn btn-outline-primary">
                                    5e1
                                </a>
                                <a href="5e2.php" type="button" class="btn btn-outline-primary">
                                    5e2
                                </a>
                                <a href="5f.php" type="button" class="btn btn-outline-primary">
                                    5f
                                </a>
                                <a href="5g.php" type="button" class="btn btn-outline-primary">
                                    5g
                                </a>
                                <a href="5h1.php" type="button" class="btn btn-outline-primary">
                                    5h1
                                </a>
                                <a href="5h2.php" type="button" class="btn btn-outline-primary">
                                    5h2
                                </a>
                                <a href="5h3.php" type="button" class="btn btn-outline-primary">
                                    5h3
                                </a>
                                <a href="5h4.php" type="button" class="btn btn-outline-primary">
                                    5h4
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Pagination -->








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
    <script src="themes/layout.js"></script>


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