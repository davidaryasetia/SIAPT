<?php
session_start();

if (!isset($_SESSION['USER_ROLE']) && !isset($_SESSION['NOMOR'])){
    // Redirect ke halaman login 
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tabel 3a3</title>
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
         include '../Controller/daftar_tabel.php';
        include '../Controller/nilai_3a3.php';
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
                    <!-- Tabel 3.a.3 Sertifikasi Dosen -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <p class="card-title mr-3"><a href="daftar_tabel.php"><i
                                                    class="fa-solid fa-arrow-left mr-4 btn-outline-dark"></i></a>Tabel
                                            3.a.3 Sertifikasi Dosen </p>
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
                                                        $isActive = ($row['SHEET'] === '3a3');
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
                                            <a href="../Controller/export/tabel_3a3.php" type="button"
                                                class="btn btn-sm btn-primary btn-icon-text">
                                                <i class="fa-solid fa-file-export"></i>
                                                Export Data
                                            </a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                                <i class="mr-1 fa-solid fa-info"></i>Simulasi Skoor
                                            </button>
                                            <!-- End Button Trigger -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="modal-title" id="exampleModalLabel">Keterangan
                                                                Nilai
                                                                Tabel 3.a.3
                                                                <!-- Toltip Content  -->
                                                                <a id="button1" class="btn"
                                                                    aria-describedby="tooltip1"><i
                                                                        class="fa-solid fa-circle-info text-info"
                                                                        style="font-size:24px;"></i>
                                                                </a>
                                                                <div id="tooltip1" role="tooltip1">
                                                                    <p class="mr-3 font_weight">Rumus Tabel
                                                                        3.a.3 LKPT
                                                                        Sertifikasi Dosen
                                                                    </p>
                                                                    <ul>
                                                                        <li><span class="font_weight">
                                                                                Persentase jumlah dosen
                                                                                yang memiliki sertifikat
                                                                                :</span>
                                                                            <span style="display:block">
                                                                                (Jumlah dosen tetap bersertifikasi /
                                                                                Jumlah dosen tetap) x 100%
                                                                            </span>
                                                                        </li>
                                                                        <hr>
                                                                        <li><span class="font_weight">
                                                                                Skor Tabel 3.a.3 LKPT
                                                                                Sertifikasi Dosen:</span>
                                                                            <span style="display:block;">
                                                                                <ul>
                                                                                    <li>
                                                                                        Jika Presentase > 50% : skor
                                                                                        (4)
                                                                                    </li>
                                                                                    <li>
                                                                                        Jika Presentase ≤ 50% : skor ( 1
                                                                                        + (6 x Presentase) )
                                                                                    </li>
                                                                                    <li>
                                                                                        Jika Tidak ada Skor kurang
                                                                                        dari 1
                                                                                    </li>
                                                                                </ul>
                                                                            </span>

                                                                        </li>
                                                                    </ul>
                                                                    <div id="arrow1" data-popper-arrow></div>
                                                                </div>
                                                                <!-- End Toltip -->
                                                            </h3>
                                                            <?php
                                                            echo '<div class="skor">';
                                                            echo '<p>Jumlah Dosen Tetap bersertifikasi :'.$total_dosen_bersertifikasi.'</p>';
                                                            echo '<p>Jumlah Dosen Tetap : '.$total_dosen_tetap.'</p>';
                                                            echo '<p>Persentase Jumlah Dosen Tetap Yang Memiliki Sertifikat:' .$presentase_3a3 . '%</p>';
                                                            echo '<p>Skor Tabel :'.$skor_3a3.'</p>';
                                                            echo '<p>Keterangan :<br>'.$keterangan.'</p>';
                                                            echo '</div>';
                                                           ?>
                                                        </div>
                                                        <div class="modal-body">
                                                            <hr>
                                                            <h3 class="modal-title" id="exampleModalLabel">Keterangan
                                                                Nilai
                                                                Tabel 3.a.3
                                                            </h3>
                                                            <form class="forms-sample" id="form-container">
                                                                <div class="form-group">
                                                                    <label for="dosen_bersertifikasi">
                                                                        Jumlah Dosen Tetap Bersertifikasi Kompetensi,
                                                                        profesi, atau industri
                                                                    </label>
                                                                    <input type="number" class="form-control"
                                                                        id="value_dosen_bersertifikasi"
                                                                        name="value_dosen_bersertifikasi"
                                                                        placeholder="Jumlah Dosen Tetap Bersertifikasi"
                                                                        value="<?php echo $total_dosen_bersertifikasi  ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dosen_tetap">Jumlah Dosen Tetap</label>
                                                                    <input type="number" class="form-control"
                                                                        id="value_dosen_tetap" name="dosen_tetap"
                                                                        placeholder="Masukkan Jumlah Dosen Tetap"
                                                                        value="<?php echo $total_dosen_tetap; ?>" />
                                                                </div>
                                                            </form>
                                                            <?php
                                                            echo '<div class="skor">';
                                                            echo '<h4 style="font-weight:bold">Keterangan Simulasi Skor Tabel 3.a.3</h4>';
                                                            echo '<p>Jumlah Dosen Tetap Bersertifikasi: <span id="dosen_bersertifikasi">' .$total_dosen_bersertifikasi. '</span></p>';
                                                            echo '<p>Jumlah Dosen Tetap <span id="dosen_tetap">' .$total_dosen_tetap. '</span></p>';
                                                            echo '<p>Persentase  : <span id="presentase">' .$presentase_3a3. '</span>%</p>';
                                                            echo '<p>Skor Tabel 3.2.2 Jabatan Fungsional Dosen: <span id="skor_3a3">' .$skor_3a3. '</span></p>';
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
                                                echo '<table id="table" class="display expandable-table table-hover table-border" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Departemen/Jurusan</th>
                                                                <th>Jumlah Dosen</th>
                                                                <th>Jumlah Dosen Bersertifikat</th>
                                                                <th>Total</th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($dosen_bersertifikasi as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NOMOR'] . '</td>';
                                                            echo '<td>' . $row['Departemen/Jurusan'] . '</td>';
                                                            echo '<td>' . $row['Jumlah Dosen'] . '</td>';
                                                            echo '<td>' . $row['Jumlah Dosen Bersertifikat'] . '</td>';
                                                            // Total Query 
                                                            $total =  intval($row['Jumlah Dosen']) + intval($row['Jumlah Dosen Bersertifikat']);
                                                            echo '<td>' .$total. '</td>';
                                                            echo '</tr>';
                                                        }
                                                       echo '</tbody>';
                                                        // Tambah Row Data
                                                        echo '<tfoot class="table-row">'; 
                                                        echo '<tr>'; 
                                                        echo '<td colspan="2"><p class="total">Total</p>';
                                                        echo '<td>' .$total_dosen. '</td>';
                                                        echo '<td>' .$total_dosen_bersertifikasi. '</td>';
                                                        echo '<td>' .$total_baris. '</td>';
                                                        echo '</td>';
                                                        echo '</tr>'; 
                                                        echo '<tfoot>'; 
                                                    echo '</table>';
                                                    ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tabel 3.a.3 Sertifikasi Dosen-->
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
    <!-- Script untuk Layout Tabel -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                "pageLength": 10,
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ], // Mengganti nama -1 menjadi All
                "scrollY": "350px",
                "scrollCollapse": true
            });
        });
    </script>
    <!-- Script Untuk Fungsi Tootip -->
    <script src="../Controller/script_fungsi/toltip.js"></script>
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