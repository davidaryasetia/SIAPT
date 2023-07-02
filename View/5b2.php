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
    include '../Controller/daftar_tabel.php';
    include '../Controller/nilai_5b2.php';
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
                    <!-- Tabel 5.b.2 Prestasi Non Akademik Mahasiswa -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card ">
                            <div class="card ">
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-betweend-flex justify-content-start align-items-center">
                                        <p class="card-title mr-3">Tabel 5.b.2 Prestasi Non Akademik Mahasiswa </p>
                                        <div class="card-title">
                                            <!-- Button Pagination -->
                                            <button class="btn btn-sm btn-primary" type="button" id="dropdownMenu"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Daftar Tabel <i class="fa-solid fa-chevron-down ml-2"></i>
                                            </button>
                                            <div class="dropdown-menu mt-2 " aria-labelledby="dropdownMenu"
                                                id="dropdownMenuContent">
                                                <div class="pt-2 pb-0 d-flex justify-content-center">
                                                    <div class="">
                                                        <a href="daftar_tabel.php" type="button" href="daftar_tabel.php"
                                                            class="dropdown btn btn-sm btn-outline-primary ml-1 mt-1 mb-1">
                                                            Daftar Tabel
                                                        </a>
                                                        <?php foreach($data_lkpt as $row) : ?>
                                                        <?php
                                                        $isActive = ($row['SHEET'] === '5b2');
                                                        $btnClass = $isActive ? 'dropdown btn btn-sm btn-primary active ml-1 mt-1 mb-1' : 'dropdown btn btn-sm btn-outline-primary ml-1 mt-1 mb-1';
                                                        ?>
                                                        <a href="<?php echo $row['SHEET'] .'.php'; ?>" type="button"
                                                            class="<?php echo $btnClass; ?>">
                                                            <?php echo $row['SHEET'] ?>
                                                        </a>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Button Pagination -->
                                            <a href="../Controller/export/tabel_5b2.php" type="button"
                                                class="btn btn-sm btn-primary btn-icon-text">
                                                <i class="fa-solid fa-file-export"></i>
                                                Export Tabel
                                            </a>
                                            <!-- Modal -->
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                                <i class="fa-solid fa-info mr-1"></i>Simulasi Skoor
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="modal-title" id="exampleModalLabel">Keterangan
                                                                Nilai 5.b.2
                                                            </h3>
                                                            <?php
                                                             echo '<div class="skor">';
                                                             echo '<p>Jumlah Non-Prestasi Akademik Tingkat Internasional: '.$prestasi_internasional.'</p>';
                                                             echo '<p>Jumlah Non-Prestasi Akademik Tingkat Nasional: '.$prestasi_nasional.'</p>';
                                                             echo '<p>Jumlah Non-Prestasi Akademik Tingkat Wilayah/Provinsi: '.$prestasi_provinsi.'</p>';
                                                             echo '<p>Jumlah Mahasiswa Aktif Pada Saat TS: '.$total_mahasiswa_aktif.'</p>';
                                                             echo '<hr>';
                                                             echo '<p>Rata-Rata Non-Prestasi Akademik Tingkat Internasional: '.$rata_prestasi_internasional.'%</p>';
                                                             echo '<p>Rata-Rata Non-Prestasi Akademik Tingkat Nasional: '.$rata_prestasi_nasional.'%</p>';
                                                             echo '<p>Rata-Rata Non-Prestasi Akademik Tingkat Wilayah/Provinsi: '.$rata_prestasi_provinsi.'%</p>';
                                                             echo '<p>Skor Tabel 5.b.1 Non-Prestasi Akademik Mahasiswa: '.$skor_5b2.'</p>';
                                                             echo '<p>Keterangan : <br>'.$keterangan.'</p>';
                                                             echo '</div>';
                                                           ?>
                                                        </div>
                                                        <div class="modal-body">
                                                            <hr>
                                                            <h3 class="modal-title" id="exampleModalLabel">
                                                                Simulasi Nilai Tabel 5.b.1
                                                            </h3>
                                                            <form class="forms-sample" id="form-container">
                                                                <div class="form-group">
                                                                    <label for="">Jumlah Non-Prestasi Akademik Tingkat
                                                                        Internasional</label>
                                                                    <input type="number" class="form-control"
                                                                        id="value_prestasi_internasional"
                                                                        name="prestasi_internasional"
                                                                        placeholder="Masukkan Jumlah Non-Prestasi Akademik Tingkat Internasional"
                                                                        value="<?php echo $prestasi_internasional; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Jumlah Non-Prestasi Akademik Tingkat
                                                                        Nasional</label>
                                                                    <input type="number" class="form-control"
                                                                        id="value_prestasi_nasional"
                                                                        name="penelitian_nasional"
                                                                        placeholder="Masukkan Jumlah Non-Prestasi Akademik Tingkat Nasional"
                                                                        value="<?php echo $prestasi_nasional; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Jumlah Non-Prestasi Akademik Tingkat
                                                                        Wilayah/Provinsi</label>
                                                                    <input type="number" class="form-control"
                                                                        id="value_prestasi_provinsi"
                                                                        name="penelitian_mandiri"
                                                                        placeholder="Masukkan Jumlah Penelitian dengan Biaya PT atau Mandiri"
                                                                        value="<?php echo $prestasi_provinsi; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Jumlah Mahasiswa Aktif Pada saat
                                                                        TS</label>
                                                                    <input type="number" class="form-control"
                                                                        id="value_mahasiswa_aktif" name="dosen_tetap"
                                                                        placeholder="Masukkan Jumlah Mahasiswa Aktif"
                                                                        value="<?php echo $total_mahasiswa_aktif; ?>" />
                                                                </div>
                                                            </form>
                                                            <?php
                                                            echo '<div class="skor">';
                                                            echo '<h4 style="font-weight:bold">Keterangan Simulasi Skor 5.b.1</h4>';
                                                            echo '<p>Jumlah Non-Prestasi Akademik Tingkat Internasional: <span id="prestasi_internasional">' .$prestasi_internasional. '</span></p>';
                                                            echo '<p>Jumlah Non-Prestasi Akademik Tingkat Nasional: <span id="prestasi_nasional">' .$prestasi_nasional. '</span></p>';
                                                            echo '<p>Jumlah Non-Prestasi Akademik Tingkat Wilayah/Provinsi: <span id="prestasi_provinsi">' .$prestasi_provinsi. '</span></p>';
                                                            echo '<p>Jumlah Mahasiswa Aktif Pada Saat TS: <span id="mahasiswa_aktif">' .$total_mahasiswa_aktif. '</span></p>';
                                                            echo '<hr>';
                                                            echo '<p>Rata-Rata Non-Prestasi Akademik Tingkat Internasional: <span id="rata_prestasi_internasional">' .$rata_prestasi_internasional. '</span>%</p>';
                                                            echo '<p>Rata-Rata Non-Prestasi Akademik Tingkat Nasional: <span id="rata_prestasi_nasional">' .$rata_prestasi_nasional. '</span>%</p>';
                                                            echo '<p>Rata-Rata Non-Prestasi Akademik Tingkat Wilayah/Provinsi: <span id="rata_prestasi_provinsi">' .$rata_prestasi_provinsi. '</span>%</p>';
                                                            echo '<p>Skor Tabel 5.b.1: <span id="skor">' .$skor_5b2. '</span></p>';
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <?php
                                                echo '<table class="display expandable-table table-hover table-border" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No.</th>
                                                                <th>Nama Kegiatan</th>
                                                                <th>Waktu Penyelenggaraan</th>
                                                                <th>Tingkat</th>
                                                                <th>Prestasi Yang Dicapai</th>    
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($prestasi_nonakademik as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['Nomor'] . '</td>';
                                                            echo '<td>' . $row['Nama Kegiatan'] . '</td>';
                                                            echo '<td>' . $row['Waktu Penyelenggaraan'] . '</td>';
                                                            echo '<td>' . $row['Tingkat'] . '</td>';
                                                            echo '<td>' . $row['Prestasi Yang Dicapai'] . '</td>';
                                                            echo '</tr>';
                                                        }
                                                       echo '</tbody>';
                                                    echo '</table>'
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
                                                $isActive = ($sheet['SHEET'] === '5b2');
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
                    <!-- Tabel 5.b.2 Prestasi Non Akademik Mahasiswa-->
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