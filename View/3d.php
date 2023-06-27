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
include '../Controller/nilai_3d.php';
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

                    <!-- Tabel LKPT  -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">Tabel 3.d Rekognisi Dosen
                                            <a href="daftar_tabel.php" type="button"
                                                class="btn btn-sm btn-primary btn-icon-text">
                                                <i class="fa-solid fa-arrow-left"></i>
                                                Daftar Tabel
                                            </a>
                                            <a href="../Form_Data/Tambah_Data\3d_rekognisi.php" type="button"
                                                class="btn btn-sm btn-primary btn-icon-text">
                                                <i class="fa-solid fa-plus"></i>
                                                Tambah Data
                                            </a>
                                            <a href="../Controller/export/tabel_3d.php" type="button"
                                                class="btn btn-sm btn-primary btn-icon-text">
                                                <i class="fa-solid fa-file-export"></i>
                                                Export Data
                                            </a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary ml-2"
                                                data-toggle="modal" data-target="#simulasi">
                                                <i class="fa-solid fa-info mr-1"></i>Simulasi Skoor
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="simulasi" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="modal-title " style="font-weight:bolder"
                                                                id="exampleModalLabel">
                                                                Keterangan Nilai Tabel 3.d
                                                            </h3>
                                                            <?php
                                                            echo '<div class="skor">';
                                                            echo '<p>Jumlah prestasi atau kinerja dosen dalam 3 tahun terakhir : '. $total_rekognisi_dosen .'</p>';
                                                            echo '<p>Jumlah Dosen Tetap : ' . $total_dosen_tetap.'</p>';
                                                            echo '<p>Rata-rata pengakuan/prestasi kinerja dosen : ' .$rata_prestasi_dosen .' </p>';
                                                            echo '<p>Skor Tabel 3.d Rekognisi Dosen: '. $skor_3d.'</p>';
                                                            echo '<p>Keterangan :<br>'. $keterangan.'</p>';
                                                            echo '</div>';
                                                           ?>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h3 class="modal-title " style="font-weight:bolder"
                                                                id="exampleModalLabel">
                                                                Keterangan Nilai Tabel 3.d
                                                            </h3>
                                                            <form class="forms-sample" id="form-container">
                                                                <div class="form-group">
                                                                    <label for="">Jumlah
                                                                        restasi atau kinerja dosen dalam
                                                                        3 tahun terakhir</label>
                                                                    <input type="number" class="form-control"
                                                                        id="value_rekognisi_dosen"
                                                                        name="value_rekognisi_dosen"
                                                                        placeholder="Masukkan Jumlah Rekognisi Dosen"
                                                                        value="<?php echo $total_rekognisi_dosen; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Jumlah Dosen
                                                                        Tetap
                                                                    </label>
                                                                    <input type="number" class="form-control"
                                                                        id="value_dosen_tetap" name=""
                                                                        placeholder="Masukkan Jumlah Dosen Tetap"
                                                                        value="<?php echo $total_dosen_tetap; ?>" />
                                                                </div>

                                                            </form>
                                                            <?php
                                                            echo '<div class="skor">';
                                                            echo '<h4 style="font-weight:bold">Keterangan Simulasi Skor Tabel 3.a.3</h4>';
                                                            echo '<p>Jumlah prestasi atau kinerja dosen dalam 3 tahun terakhir: <span id="rekognisi_dosen">' .$total_rekognisi_dosen. '</span></p>';
                                                            echo '<p>Jumlah Dosen Tetap <span id="dosen_tetap">' .$total_dosen_tetap. '</span></p>';
                                                            echo '<p>Rata-rata pengakuan atau prestasi kinerja dosen: <span id="rata">' .$rata_prestasi_dosen. '</span></p>';
                                                            echo '<p>Skor Tabel 3.d Rekognisi Dosen: <span id="skor_3d">' .$skor_3d. '</span></p>';
                                                            echo '<p>Keterangan:<br> <span id="simulasi_keterangan">' .$keterangan. '</span></p>';
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
                                                                <th>Nama Dosen</th>
                                                                <th>Bidang Keahlian</th>
                                                                <th>Rekognisi</th>
                                                                <th>Tingkat</th>
                                                                <th>Tahun Perolehan(YYYY)</th>
                                                                <th>Edit</th>
                                                                <th>Hapus</th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($rekognisi_dosen as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NO'] . '</td>';
                                                            echo '<td>' . $row['NAMA'] . '</td>';
                                                            echo '<td>' . $row['BIDANG_KEAHLIAN'] . '</td>';
                                                            echo '<td>' . $row['REKOGNISI'] . '</td>';
                                                            echo '<td>' . $row['TINGKAT'] . '</td>';
                                                            echo '<td>' . $row['TAHUN'] . '</td>';
                                                            // Edit Data
                                                            echo '<td>';
                                                            echo '<a href="https://project.mis.pens.ac.id/mis143/Form_Data/Edit_Data/3d_rekognisi_dosen.php?no=' . $row['NO'] . '" class="btn-icon">';
                                                            echo '<i class="fa-solid fa-pencil"></i>';
                                                            echo '</a>';
                                                            echo '</td>';   
                                                            // End Edit
                                                           // Hapus Data
                                                           echo '<td>';
                                                            echo '<form method="POST" action="https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php">';
                                                            echo '<input type="hidden" name="_method" value="DELETE">';
                                                            echo '<input type="hidden" name="no" value="' . $row['NO'] . '">';
                                                            echo '<button type="submit" class="btn-icon" onclick="return confirmAndRedirect(\'Apakah anda ingin delete tabel ini?\')">';
                                                            echo '<i class="fa-solid fa-trash"></i>';
                                                            echo '</button>';
                                                            echo '</form>';
                                                            echo '</td>';
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
                                    <div class="container">
                                        <div class="pagination-container">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="daftar_tabel.php" type="button" href="daftar_tabel.php"
                                                    class="btn btn-outline-primary">
                                                    Daftar Tabel
                                                </a>
                                                <?php
                                                include '../Controller/daftar_tabel.php';
                                                ?>
                                                <?php
                                                foreach($data_lkpt as $sheet) : ?>
                                                <?php
                                                $isActive = ($sheet['SHEET'] === '3d');
                                                $btnClass = $isActive ? 'btn btn-outline-primary active' : 'btn btn-outline-primary';
                                                ?>
                                                <a href="<?php echo $sheet['SHEET'] .'.php'; ?>" type="button"
                                                    class="<?php echo $btnClass; ?>">
                                                    <?php echo $sheet['SHEET'] ?>
                                                </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
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
    <script>
        function confirmAndRedirect(message, redirectUrl) {
            if (confirm(message)) {
                window.location.href = redirectUrl;
                return true;
            }
            return false;
        }

        // Access the redirect URL from the JSON response
        var response = < ? php echo json_encode(array('Redirect' =>
            'https://project.mis.pens.ac.id/mis143/daftar_tabel.php')); ? > ;
        var redirectUrl = response.Redirect;

        // Perform redirection if the redirect URL is provided
        if (redirectUrl) {
            window.location.href = redirectUrl;
        }
    </script>

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