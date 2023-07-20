<?php
session_start();
?>

<!-- Check jika sesi tidak ada atau  tidak valid -->
<?php
if(!isset($_SESSION['EMAIL'])){
    // Redirect ke halaman ogin
    header('Location: ../login.php');
}
?>

<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Pengguna</title>
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
    <!-- Font Awesome Icon -->
    <link href="../includes/contents/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../includes/contents/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../includes/contents/assets/fontawesome/css/solid.css" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- Logo Tab -->
    <link rel="shortcut icon" href="../includes/contents/Image/logo_svg.svg" />
    <link rel="stylesheet" type="text/css" href="../themes/layout.css">
    <!-- Link CSS Data tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css" />
</head>

<body>
    <?php
     $response_data_pengguna = file_get_contents('https://project.mis.pens.ac.id/mis143/API/login_register.php');
     $data_pengguna = json_decode($response_data_pengguna, true);
    ?>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html">
                    <img src="../includes/contents/Image/logo_svg.svg" class="mr-2 w-25 h-25" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html">
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
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="p-1" src="../includes/contents/user_profile/default.svg" alt="profile" />
                                <p class="p-1 mb-0">Hi! <?php echo $_SESSION['NAMA_LENGKAP'] ?></p>
                                <i class="fa-sharp fa-solid fa-chevron-down"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a href="../View/pengaturan.php" class="dropdown-item">
                                <i class="fa-regular fa-gear text-primary"></i>
                                Pengaturan
                            </a>
                            <a id="logout_sidebar" href="login.php" class="dropdown-item">
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
                        <a class="nav-link" href="../View/beranda.php">
                            <i class="fa-regular fa-house menu-icon"></i>
                            <span class="menu-title">Beranda</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../View/daftar_tabel.php">
                            <i class="fa-regular fa-table menu-icon"></i>
                            <span class="menu-title">Daftar Tabel</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../View/pengaturan.php">
                            <i class="fa-regular fa-gear menu-icon"></i>
                            <span class="menu-title">Pengaturan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="logout_navbar" class="nav-link" href="">
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
                                    <div class="d-flex justify-content-start align-items-center">
                                        <h3 class="card-title mr-3"><a href="../View/pengaturan.php"><i
                                                    class="fa-solid fa-arrow-left mr-4 btn-outline-dark"></i></a>Pengaturan
                                            -
                                            Daftar Pengguna</h3>
                                        <div class="card-title">
                                            <!-- Jika $_SESSION['USER_ROLE'] Tambah Pengguna-->
                                            <?php 
                                            if (isset ($_SESSION['USER_ROLE']) && $_SESSION['USER_ROLE'] === 'Tim PJM'){
                                            echo '<a href="../Form_Data/Tambah_Data/tambah_user.php"
                                                class="btn btn-sm btn-outline-dark" type="button">
                                                <i class="fa-solid fa-user-plus mr-2"></i>Tambah Anggota</a>';
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <?php
                                                echo '<table id="table" class="display expandable-table table-hover" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Nama Dosen</th>
                                                                <th>Bidang Keahlian</th>
                                                                <th>Rekognisi</th>
                                                                <th>Tingkat</th>
                                                                <th>Tahun Perolehan</th>';

                                                                // Set User Role untuk Edit Tim PJM dan Tim Akreditasi
                                                                if(isset($_SESSION['USER_ROLE']) && ($_SESSION['USER_ROLE'] === 'Tim PJM') || ($_SESSION['USER_ROLE'] === 'Tim Akreditasi')){
                                                                    echo 
                                                                    '<th>Edit</th>
                                                                    <th>Hapus</th>';
                                                                }
                                                            '</tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data_pengguna as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NOMOR'] . '</td>';
                                                            echo '<td>' . $row['NAMA_LENGKAP'] . '</td>';
                                                            echo '<td>' . $row['NIP'] . '</td>';
                                                            echo '<td>' . $row['USER_ROLE'] . '</td>';
                                                            echo '<td>' . $row['EMAIL'] . '</td>';
                                                            echo '<td>' . $row['NO_TELEPON'] . '</td>';
                                                            if((isset($_SESSION['USER_ROLE']) && $_SESSION['USER_ROLE'] === 'Tim PJM') && (isset($row['EMAIL']) && $row['EMAIL'] !== $_SESSION['EMAIL']) ){
                                                                // Edit Data Pengguna untuk $_SESSION['USER_ROLE'] === 'Tim PJM' dan berdasarkan nama_lengkap
                                                                echo '<td>';
                                                                echo '<a href="https://project.mis.pens.ac.id/mis143/Form_Data/Edit_Data/edit_pengguna.php?nomor=' . $row['NOMOR'] . '" class="btn-icon">';
                                                                echo '<i class="fa-solid fa-pencil"></i>';
                                                                echo '</a>';
                                                                echo '</td>'; 

                                                                // Hapus Data Pengguna untuk $_SESSION['USER_ROLE'] === 'Tim PJM'
                                                                echo '<td>';
                                                                echo '<form id="deletePengguna" method="POST" action="https://project.mis.pens.ac.id/mis143/API/login_register.php">';
                                                                echo '<input type="hidden" name="_method" value="delete">';
                                                                echo '<input type="hidden" name="nomor" value="' . $row['NOMOR'] . '">';
                                                                echo '<button type="submit" class="delete_button" onclick="return hapus()">';
                                                                echo '<i class="fa-solid fa-trash"></i>';
                                                                echo '</button>';
                                                                echo '</form>';
                                                                echo '</td>';
                                                            }
                                                            echo '</tr>';
                                                        }
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
        function hapus() {
            var confirmation = confirm("Anda Yakin ingin menghapus data pengguna?");
            if (confirmation) {
                document.getElementById("deletePengguna").submit();
            }
            return false;
        }
    </script>
    <!-- Script untuk Layout Tabel -->

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