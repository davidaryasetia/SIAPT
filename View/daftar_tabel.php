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
    include "../Controller/daftar_tabel.php";
    include "../Controller/nilai_2b.php";
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

                    <!-- Tabel LKPT  -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex flex-row align-items-center mb">
                                        <p class="card-title d-flex align-items-center">Daftar Tabel-Laporan Kinerja
                                            Perguruan Tinggi
                                            <!-- <a href="../Form_Data/Tambah_Data/daftar_tabel.php" type="button"
                                                class="btn btn-sm btn-primary btn-icon-text ml-2">
                                                <i class="fa-solid fa-plus"></i>
                                                Tambah Data
                                            </a> -->
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
                                                            </h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
                                                           
                                                            echo '<div class="skor">';
                                                            // echo '<h5>Status Data:</h5>';
                                                            echo '<p>Data Lengkap: ' .$total_data_lengkap. '</p>';
                                                            
                                                            echo '<p>Data Tidak Tersedia: ' .$total_data_tidaktersedia. '</p>';
                                                            echo '</div>';
                                                            echo '<div class="skor">';
                                                            // echo '<h5>Sumber:</h5>';
                                                            echo '<p>Data DB MIS: ' .$total_data_mis. '</p>';
                                                            echo '<p>Data Dummy: ' .$total_data_dummy. '</p>';                            
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
                                                echo '<table class="display expandable-table table-hover table-border" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Judul Tabel</th>
                                                                <th>Nama Sheet</th>
                                                                <th>Status Data</th>
                                                                <th>Sumber Data</th>
                                                                <th>Edit</th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data_lkpt as $row) {
                                                            
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NO'] . '</td>';
                                                            echo '<td>' . $row['JUDUL'] . '</td>';
                                                            echo '<td><a href="' .$row['SHEET']. '.php">' .$row['SHEET']. '</a></td>';
                                                            
                                                            // Check Value Status and set text color 
                                                            if($row['STATUS']=='Data Lengkap'){
                                                                echo '<td style="color:green;">' .$row['STATUS'].'</td>';
                                                            }else if($row['STATUS']=='Data Tidak Lengkap'){
                                                                echo '<td style="color:yellow;">' .$row['STATUS']. '</td>';
                                                            }else {
                                                                echo '<td style="color:red">' .$row['STATUS']. '</td>';
                                                            }

                                                            // Check Value Sumber dan set text color 
                                                            if($row['SUMBER']=='Data DB MIS'){
                                                                echo '<td style="color:green;">' .$row['SUMBER']. '</td>';
                                                            }else {
                                                                echo '<td style="color:red;">' .$row['SUMBER']. '</td>';
                                                            }

                                                            // Edit Data
                                                            echo '<td>';
                                                            echo '<a href="https://project.mis.pens.ac.id/mis143/Form_Data/Edit_Data/daftar_tabel.php?no=' . $row['NO'] . '" class="btn-icon">';
                                                            echo '<i class="fa-solid fa-pencil"></i>';
                                                            echo '</a>';
                                                            echo '</td>';                       
                                                            // End Edit

                                                            // Hapus Data
                                                            //    echo '<td>';
                                                            //     echo '<form method="POST" action="https://project.mis.pens.ac.id/mis143/API/TABEL_LKPT.php">';
                                                            //     echo '<input type="hidden" name="_method" value="DELETE">';
                                                            //     echo '<input type="hidden" name="no" value="' . $row['NO'] . '">';
                                                            //     echo '<button type="submit" class="btn-icon" onclick="return confirmAndRedirect(\'Apakah anda ingin delete tabel ini?\')">';
                                                            //     echo '<i class="fa-solid fa-trash"></i>';
                                                            //     echo '</button>';
                                                            //     echo '</form>';
                                                            //     echo '</td>';
                                                            // Hapus Data
                                                            echo '</tr>';
                                                           
                                                        }
                                                       echo '</tbody>';
                                                    echo '</table>';

                                                  
                                                    ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Pagination -->
                                    <!-- <div class="container">
                                        <div class="pagination-container">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="daftar_tabel.php" type="button" href="daftar_tabel.php"
                                                    class="btn btn-outline-primary active">
                                                    Daftar Tabel
                                                </a>
                                                <?php foreach ($data_lkpt as $row) : ?>
                                                <a href="<?php echo $row['SHEET'] . '.php'; ?>" type="button"
                                                    class="btn btn-outline-primary">
                                                    <?php echo $row['SHEET']; ?>
                                                </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- End Pagination -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tabel 3.a.4 Dosen Tidak Tetap-->

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

    <!-- Start JS Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
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

    <?php
    // Process your PHP logic here and obtain the redirect URL
    $redirectUrl = 'https://project.mis.pens.ac.id/mis143/View/daftar_tabel.php';

    // Encode the redirect URL as a JSON response
    $response = json_encode(array('Redirect' => $redirectUrl));
    ?>
    <script>
        function confirmAndRedirect(message, redirectUrl) {
            if (confirm(message)) {
                window.location.href = redirectUrl;
                return true;
            }
            return false;
        }
        // Access the redirect URL from the JSON response
        var response = < ? php echo $response; ? > ;
        var redirectUrl = response.Redirect;

        // Perform redirection if the redirect URL is provided
        if (redirectUrl) {
            window.location.href = redirectUrl;
        }
    </script>
</body>

</html>