<?php
session_start();

if (!isset($_SESSION['EMAIL']) && !isset($_SESSION['NOMOR'])){
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
    include "../Controller/daftar_tabel.php";
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
                    <!-- Tabel LKPT  -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <p class="card-title mr-3">Daftar Tabel-Laporan Kinerja
                                            Perguruan Tinggi</p>
                                        <div class="card-title">
                                            <button class="btn btn-sm btn-primary" type="button" id="dropdownMenu"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Daftar Tabel <i class="fa-solid fa-chevron-down ml-2"></i>
                                            </button>
                                            <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenu">
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
                                            <a href="../Controller/export/daftar_tabel_lkpt.php" type="button"
                                                class=" btn btn-sm btn-primary">
                                                <i class="fa-solid fa-file-export"></i>
                                                Export Data
                                            </a>
                                            <!-- <a href="../Form_Data/Tambah_Data/daftar_tabel.php" type="button"
                                                class="btn btn-sm btn-primary btn-icon-text ml-2">
                                                <i class="fa-solid fa-plus"></i>
                                                Tambah Data
                                            </a> -->
                                            <!-- Toltip 1-->
                                            <a id="button1" class="btn" aria-describedby="tooltip1"><i
                                                    class="fa-solid fa-circle-info text-primary"
                                                    style="font-size:24px;"></i>
                                            </a>
                                            <div id="tooltip1" role="tooltip1">
                                                <p class="card-title mr-3">Keterangan
                                                    Kategori & Sumber Data</p>

                                                <?php
                                                            echo '<div class="skor">';
                                                            echo '<h4>Kategori Data : </h4>';
                                                            echo '<p>Jumlah Data Lengkap       : ' .$total_data_lengkap. '</p>';
                                                            echo '<p>Jumlah Data Tidak Tersedia: ' .$total_data_tidaktersedia. '</p>';
                                                            echo '</div>';
                                                            echo '<hr/>';
                                                            echo '<div class="skor">';
                                                            echo '<h4>Sumber Data : </h4>';
                                                            echo '<p>Jumlah Data Bersumber DB MIS         : ' .$total_data_mis. '</p>';
                                                            echo '<p>Jumlah Data Bersumber Pada Data Dummy: ' .$total_data_dummy. '</p>';                            
                                                            echo '</div>';
                                                            ?>
                                                <div id="arrow1" data-popper-arrow></div>
                                            </div>
                                            <!-- End Toltip -->
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
                                                                <th>Judul Tabel</th>
                                                                <th>Nama Sheet</th>
                                                                <th>Kategori Data</th>
                                                                <th>Sumber Data</th>';
                                                                if (isset ($_SESSION['USER_ROLE']) && ($_SESSION['USER_ROLE'] === 'Tim PJM') || ($_SESSION['USER_ROLE'] === 'Tim Akreditasi')){
                                                                    echo '<th>Edit</th>';
                                                                }
                                                            '</tr>';
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
                                                            if (isset ($_SESSION['USER_ROLE']) && ($_SESSION['USER_ROLE'] === 'Tim PJM') || ($_SESSION['USER_ROLE'] === 'Tim Akreditasi')){
                                                                echo '<td>';
                                                                echo '<a href="https://project.mis.pens.ac.id/mis143/Form_Data/Edit_Data/daftar_tabel.php?no=' . $row['NO'] . '" class="btn-icon">';
                                                                echo '<i class="fa-solid fa-pencil"></i>';
                                                                echo '</a>';
                                                                echo '</td>';      
                                                            }
                                                            // Hapus Data
                                                            // echo '<td>';
                                                            // echo '<form method="POST" action="https://project.mis.pens.ac.id/mis143/API/TABEL_LKPT.php">';
                                                            // echo '<input id="deleteTabel" type="hidden" name="_method" value="DELETE">';
                                                            // echo '<input type="hidden" name="no" value="' . $row['NO'] . '">';
                                                            // echo '<button type="submit" class="delete_button" onclick="return hapus()">';
                                                            // echo '<i class="fa-solid fa-trash"></i>';
                                                            // echo '</button>';
                                                            // echo '</form>';
                                                            // echo '</td>';
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
        function hapus() {
            var confirmation = confirm("Anda Yakin Ingin menghapus Data Tabel LKPT ?");
            if (confirmation) {
                document.getElementById("deleteTabel").submit();
            }
            return false;
        }
    </script>

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
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ], // Mengganti nama -1 menjadi All
                "scrollY": "420px",
                "scrollCollapse": true
            });
        });
    </script>

    <!-- JS untuk Proses fungsi Logout-->
    <script src="../Controller/script_fungsi/logout_view.js"></script>

    <!-- Script Untuk Fungsi Tootip -->
    <script src="../Controller/script_fungsi/toltip.js"></script>

    <!-- container-scroller -->
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