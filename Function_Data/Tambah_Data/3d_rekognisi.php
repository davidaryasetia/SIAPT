<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Tabel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link rel="stylesheet" type="text/css" href="../../themes\styling.css">
    <!-- Font Awesome Icon -->
    <link href="../../includes/contents/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../../includes/contents/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../../includes/contents/assets/fontawesome/css/solid.css" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- Logo Tab -->
    <link rel="shortcut icon" href="../../includes/contents/Image/logo_svg.svg" />
    <script>
        function redirectToRekognisiDosen() {
            window.location.href =
                "https://project.mis.pens.ac.id/mis143/3d.php";
        }
    </script>




</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html">
                    <img src="../../includes/contents/Image/logo_svg.svg" class="mr-2 w-25 h-25" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="../../includes/contents/Image/logo_svg.svg" class="w-20 h-20" alt="logo" /></a>
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
                                <img class="p-1" src="../../includes/contents/Image/Bu_Tita.png" alt="profile" />
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
                        <a class="nav-link" href="../../beranda.php">
                            <i class="fa-regular fa-house menu-icon"></i>
                            <span class="menu-title">Beranda</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="../../daftar_tabel.php">
                            <i class="fa-regular fa-table menu-icon"></i>
                            <span class="menu-title">Daftar Tabel</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pengaturan.php">
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
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12  grid-margin stretch-card ">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <p class="card-title">Tambah Data - 3.d Rekognisi Dosen
                                    </div>
                                    <div class="row">
                                        <!-- Start Fech API Endpoint -->
                                        <!-- Start Fech API Endpoint -->
                                        <?php
                                        // Jika formulir dikirim maka submit
                                        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                                            // mengambil nilai dari input form
                                            $nama = $_POST['nama'];
                                            $bidang_keahlian = $_POST['bidang_keahlian'];
                                            $rekognisi = $_POST['rekognisi'];
                                            $tingkat = $_POST['tingkat'];
                                            $tahun = $_POST['tahun'];

                                            // Data yang akan dikirimkan dalam format array
                                            $data = array(
                                                'nama' => $nama, 
                                                'bidang_keahlian' => $bidang_keahlian, 
                                                'rekognisi' => $rekognisi, 
                                                'tingkat' => $tingkat, 
                                                'tahun' => $tahun
                                            );

                                            // Mengubah data menjadi string json
                                            $json_data = json_encode($data);

                                            // Mengirimkan data ke endpoint API menggunakan fungsi file_get_contents()
                                            $url = 'https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php';
                                            $options = array(
                                                'http' => array(
                                                    'method' => 'POST', 
                                                    'header' => 'Content-Type: application/json', 
                                                    'content' => $json_data
                                                )
                                                );
                                                $context = stream_context_create($options);

                                                // Variabel Respons untuk menampung logic response data
                                                $response = file_get_contents($url, false, $context);

                                                 // Memeriksa response dari API
                                            if ($response !== false) {
                                                $responseData = json_decode($response, true);
                                                if (isset($responseData['Pesan'])) {
                                                    // Menampilkan pesan sukses
                                                    echo '<script>alert("Sukses: ' . $responseData['Pesan'] . '"); redirectToRekognisiDosen();</script>';
                                                } else {
                                                    // Tampilkan pop up error jika respon API tidak valid
                                                    echo '<script>alert("Gagal: Respon API tidak valid");</script>';
                                                }
                                            } else {
                                                // Tampilkan pop up error jika tidak dapat terhubung ke API 
                                                echo '<script>alert("Gagal: Tidak dapat terhubung ke API");</script>';
                                            }               
                                        }
                                        ?>
                                        <!-- End Fetch API Endpoint -->
                                        <!-- End Fetch API Endpoint -->


                                        <!-- Start Form -->
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form class="forms-sample" method="POST" action="">
                                                        <div class="form-group">
                                                            <label for="nama">Nama Dosen</label>
                                                            <input type="text" class="form-control" id="nama"
                                                                name="nama" placeholder="Nama Dosen" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bidang">Bidang Keahlian</label>
                                                            <input type="text" class="form-control" id="bidang_keahlian"
                                                                name="bidang_keahlian" placeholder="Bidang Keahlian" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rekognisi">Rekognisi</label>
                                                            <textarea type="text"
                                                                class="form-control centered-placeholder" id="rekognisi"
                                                                name="rekognisi"
                                                                placeholder="Rekognisi Dosen"></textarea>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="tingkat">Tingkat</label>
                                                                <select class="form-control" id="tingkat"
                                                                    name="tingkat">
                                                                    <option value="">Pilih Tingkat</option>
                                                                    <option value="Wilayah">Wilayah</option>
                                                                    <option value="Nasional">Nasional</option>
                                                                    <option value="Internasional">Internasional</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="tahun">Tahun Perolehan (YYYY)</label>
                                                                <select class="form-control" id="tahun" name="tahun">
                                                                    <option value="">Pilih Tahun</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary mr-2">
                                                            Submit
                                                        </button>
                                                        <a href="../../3d.php" class="btn btn-light">Cancel</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form -->

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


    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <script src="../../js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>