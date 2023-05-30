<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
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

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo.svg" class="mr-2"
                        alt="SIAPT" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <p>Halo David...</p>
                            <!-- <i class="icon-arrow-down ml-1 mr-1 pb-1"></i> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="index.op">
                                <i class="ti-power-off text-primary"></i>
                                Logout
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
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Beranda</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="daftar_tabel.php">
                            <i class="icon-content-left menu-icon"></i>
                            <span class="menu-title">Daftar Tabel</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pengaturan.php">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Pengaturan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="icon-layout menu-icon"></i>
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
                                    <h3 class="font-weight-bold">Daftar Tabel LKPT
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel 2.b Mahasiswa Asing -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 2.b Mahasiswa Asing
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);

                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Program Sudi</th>
                                                                <th>TS-2(2018)</th>
                                                                <th>TS-1(2019)</th>
                                                                <th>TS(2020)</th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NOMOR'] . '</td>';
                                                            echo '<td>' . $row['Program Studi'] . '</td>';
                                                            echo '<td>' . $row['TS-2(2018)'] . '</td>';
                                                            echo '<td>' . $row['TS-1(2019)'] . '</td>';
                                                            echo '<td>' . $row['TS(2020)'] . '</td>';
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
                    <!-- Tabel 2.b Mahasiswa Asing -->

                    <!-- Tabel 2.c Kredit Mata Kuliah -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 2.c Kredit Mata Kuliah
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.c_kredit_mata_kuliah.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);

                                                echo '<table class="display expandable-table" style="width:100%">';
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
                    <!-- Tabel 2.c Kredit Mata Kuliah -->

                    <!-- Tabel 3.a.1 kecukupan dosen perguruan tinggi -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 3.a.1 Kecukupan Dosen Perguruan Tinggi
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);
                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Departemen</th>
                                                                <th>Doktor/Doktor Terapan</th>
                                                                <th>Magister/ Magister Terapan</th>
                                                                <th>Profesi</th>
                                                                <th>Jumlah</th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NOMOR'] . '</td>';
                                                            echo '<td>' . $row['DEPARTEMEN'] . '</td>';
                                                            echo '<td>' . $row['Doktor/Doktor Terapan'] . '</td>';
                                                            echo '<td>' . $row['Magister/Magister Terapan'] . '</td>';
                                                            echo '<td>' . $row['PROFESI'] . '</td>';
                                                            echo '<td>' . $row['Jumlah'] . '</td>';
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
                    <!-- Tabel 3.a.1 kecukupan dosen perguruan tinggi -->


                    <!-- Tabel 3.a.2 Jabatan Akademik Dosen Tetap -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 3.a.2 Jabatan Akademik Dosen Tetap
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.2_jabatan_akademik_dosen_tetap.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);
                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Pendidikan </th>
                                                                <th>Guru Besar</th>
                                                                <th>Lektor Kepala</th>
                                                                <th>Lektor</th>
                                                                <th>Asisten Ahli</th>
                                                                <th>Tenaga Pengajar</th>
                                                                <th>Total</th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['Nomor'] . '</td>';
                                                            echo '<td>' . $row['Pendidikan'] . '</td>';
                                                            echo '<td>' . $row['Guru Besar'] . '</td>';
                                                            echo '<td>' . $row['Lektor Kepala'] . '</td>';
                                                            echo '<td>' . $row['Lektor'] . '</td>';
                                                            echo '<td>' . $row['Asisten Ahli'] . '</td>';
                                                            echo '<td>' . $row['Tenaga Pengajar'] . '</td>';
                                                           
                                                            // Total Query
                                                            $sum = intval($row['Guru Besar']) + intval($row['Lektor Kepala']) + intval($row['Lektor']) + intval($row['Asisten Ahli'] + intval($row['Tenaga Pengajar']));
                                                            echo '<td>' . $sum . '</td>';
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
                    <!-- Tabel 3.a.2 Jabatan Akademik Dosen Tetap -->


                    <!-- Tabel 3.a.3 Sertifikasi Dosen -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 3.a.3 Sertifikasi Dosen
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.3_sertifikasi_dosen.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);
                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Departemen/Jurusan</th>
                                                                <th>Jumlah Dosen</th>
                                                                <th>Jumlah Dosen Bersertifikat</th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NOMOR'] . '</td>';
                                                            echo '<td>' . $row['Departemen/Jurusan'] . '</td>';
                                                            echo '<td>' . $row['Jumlah Dosen'] . '</td>';
                                                            echo '<td>' . $row['Jumlah Dosen Bersertifikat'] . '</td>';
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
                    <!-- Tabel 3.a.3 Sertifikasi Dosen-->

                    <!-- Tabel 3.a.4 Dosen Tidak Tetap -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 3.a.4 Dosen Tidak Tetap
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.4_dosen_tidak_tetap.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);
                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>No. </th>
                                                                <th>Pendidikan</th>
                                                                <th>Guru Besar</th>
                                                                <th>Lektor Kepala</th>
                                                                <th>Lektor</th>
                                                                <th>Asisten Ahli</th>
                                                                <th>Tenaga Pengajar </th>
                                                                <th>Total </th>
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {

                                                            echo '<tr>';
                                                            echo '<td>' . $row['Nomor'] . '</td>';
                                                            echo '<td>' . $row['Pendidikan'] . '</td>';
                                                            echo '<td>' . $row['Guru Besar'] . '</td>';
                                                            echo '<td>' . $row['Lektor Kepala'] . '</td>';
                                                            echo '<td>' . $row['Lektor'] . '</td>';
                                                            echo '<td>' . $row['Asisten Ahli'] . '</td>';
                                                            echo '<td>' . $row['Tenaga Pengajar'] . '</td>';

                                                            // Total Query
                                                            $sum= intval($row['Guru Besar']) + intval($row['Lektor Kepala']) + intval($row['Lektor']) + intval($row['Asisten Ahli']) + intval($row['Tenaga Pengajar']);
                                                            echo '<td>'. $sum . '</td>';
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
                    <!-- Tabel 3.a.4 Dosen Tidak Tetap-->

                    <!-- Tabel 3.b Rasio Dosen Terhadap Mahasiswa -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 3.b Rasio Dosen Terhadap Mahasiswa
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.b_rasio_dosen_terhadap_mahasiswa.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);
                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>Nomor </th>
                                                                <th>Departemen</th>
                                                                <th>Jumlah Dosen</th>
                                                                <th>Mahasiswa Angkatan 20</th>
                                                                <th>Jumlah Mahasiswa TA</th>    
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NOMOR'] . '</td>';
                                                            echo '<td>' . $row['DEPARTEMEN'] . '</td>';
                                                            echo '<td>' . $row['Jumlah Dosen'] . '</td>';
                                                            echo '<td>' . $row['Mahasiswa Angkatan 2020'] . '</td>';
                                                            echo '<td>' . $row['Jumlah Mahasiswa TA'] . '</td>';
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
                    <!-- Tabel 3.b Rasio Dosen Terhadap Mahasiswa-->

                    <!-- Tabel 3.c.1 Produktivitas Penelitian Dosen -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 3.c.1 Produktivitas Penelitian Dosen
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.c.1_produktivitas_penelitian_dosen.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);
                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>Nomor</th>
                                                                <th>Sumber Pembiayaan</th>
                                                                <th>TS-2(2019)</th>
                                                                <th>TS-1(2020)</th>
                                                                <th>TS(2021)</th>    
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['Nomor'] . '</td>';
                                                            echo '<td>' . $row['Sumber Pembiayaan'] . '</td>';
                                                            echo '<td>' . $row['TS-2(2019)'] . '</td>';
                                                            echo '<td>' . $row['TS-1(2020)'] . '</td>';
                                                            echo '<td>' . $row['TS(2021)'] . '</td>';
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
                    <!-- Tabel 3.c.1 Produktivitas Penelitian Dosen-->


                    <!-- Tabel 3.c.1 Produktivitas Penelitian Dosen -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 3.c.1 Produktivitas Penelitian Dosen
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.c.1_produktivitas_penelitian_dosen.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);
                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>Nomor</th>
                                                                <th>Sumber Pembiayaan</th>
                                                                <th>TS-2(2019)</th>
                                                                <th>TS-1(2020)</th>
                                                                <th>TS(2021)</th>    
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['Nomor'] . '</td>';
                                                            echo '<td>' . $row['Sumber Pembiayaan'] . '</td>';
                                                            echo '<td>' . $row['TS-2(2019)'] . '</td>';
                                                            echo '<td>' . $row['TS-1(2020)'] . '</td>';
                                                            echo '<td>' . $row['TS(2021)'] . '</td>';
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
                    <!-- Tabel 3.c.1 Produktivitas Penelitian Dosen-->


                    <!-- Tabel 3.c.2 Produktivitas Pkm Dosen -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 3.c.2 Produktivitas Pkm Dosen
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.c.2_produktivitas_pkm_dosen.php');
                                                // Decode JSON response into an associative array
                                                $data = json_decode($response, true);
                                                echo '<table class="display expandable-table" style="width:100%">';
                                                        echo '<thead>';
                                                           echo' <tr>
                                                                <th>Nomor</th>
                                                                <th>Sumber Pembiayaan</th>
                                                                <th>TS-2(2019)</th>
                                                                <th>TS-1(2020)</th>
                                                                <th>TS(2021)</th>    
                                                            </tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        foreach ($data as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['Nomor'] . '</td>';
                                                            echo '<td>' . $row['Sumber Pembiayaan'] . '</td>';
                                                            echo '<td>' . $row['TS-2(2019)'] . '</td>';
                                                            echo '<td>' . $row['TS-1(2020)'] . '</td>';
                                                            echo '<td>' . $row['TS(2021)'] . '</td>';
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
                    <!-- Tabel 3.c.2 Produktivitas Pkm Dosen-->

                    <!-- Tabel 5.b.1 Prestasi Akademik Mahasiswa -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card ">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 5.b.1 Prestasi Akademik Mahaiswa
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/5.b.1_prestasi_akademik_mahasiswa.php');
                                                // Decode JSON response into an associative array
                                             $data = json_decode($response, true);
                                                echo '<table class="display expandable-table" style="width:100%">';
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
                                                        foreach ($data as $row) {
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tabel 5.b.1 Prestasi Akademik Mahasiswa-->

                    <!-- Tabel 5.b.2 Prestasi Non Akademik Mahasiswa -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card ">
                            <div class="card ">
                                <div class="card-body">
                                    <p class="card-title">Tabel 5.b.2 Prestasi Non Akademik Mahasiswa
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <?php
                                                // fetch api response
                                                $response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/5.b.2_prestasi_non_akademik_mahasiswa.php');
                                                // Decode JSON response into an associative array
                                             $data = json_decode($response, true);
                                                echo '<table class="display expandable-table" style="width:100%">';
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
                                                        foreach ($data as $row) {
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