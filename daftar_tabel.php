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
    <link rel="stylesheet" type="text/css" href="themes\styles.css">
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

                                                // Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
                                                $response_asing = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_asing');
                                                $response_aktif = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_aktif');

                                                // Decode JSON response $response_asing & $response_aktif ke asociate array
                                                $mahasiswa_asing = json_decode($response_asing, true);
                                                $mahasiswa_aktif = json_decode($response_aktif, true);

                                                echo '<table class="display expandable-table" style="width:100%"; border:1px solid black;>';
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
                                                        foreach ($mahasiswa_asing as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NOMOR'] . '</td>';
                                                            echo '<td>' . $row['Program Studi'] . '</td>';
                                                            echo '<td>' . $row['TS-2(2018)'] . '</td>';
                                                            echo '<td>' . $row['TS-1(2019)'] . '</td>';
                                                            echo '<td>' . $row['TS(2020)'] . '</td>';
                                                            echo '</tr>';
                                                        }

                                                        // Hitung Total TS-2(2018), TS-1(2019), TS(2020)
                                                        $sum_ts2 = 0;
                                                        $sum_ts1 = 0;
                                                        $sum_ts = 0;
                                                        foreach ($mahasiswa_asing as $row){
                                                            $sum_ts2 += $row['TS-2(2018)'];
                                                            $sum_ts1 += $row['TS-1(2019)'];
                                                            $sum_ts += $row['TS(2020)'];
                                                        }

                                                        // Tambah Row Data
                                                        echo '<tr class="table-row">';
                                                        echo '<td colspan="2"><p class="total">Total</p></td>';
                                                        echo '<td>'. $sum_ts2 .'</td>';
                                                        echo '<td>'. $sum_ts1 .'</td>';
                                                        echo '<td>'. $sum_ts .'</td>';
                                                        echo '</tr>';
                                                       echo '</tbody>';
                                                    echo '</table>';
                                                    
                                                    // Hitung Total Mahasiswa Asing dalam 3 tahun terakhir
                                                    $total_mahasiswa_asing=0;
                                                    foreach($mahasiswa_asing as $row){
                                                        $total_mahasiswa_asing += $row['TS-2(2018)'] + $row['TS-1(2019)'] + $row['TS(2020)'];
                                                    }

                                                    // Hitung Total Mahasiswa Aktif dalam 3 tahun terakhir
                                                    $total_mahasiswa_aktif=0;
                                                    foreach($mahasiswa_aktif as $row){
                                                        $total_mahasiswa_aktif += $row['TS-2(2018)'] + $row['TS-1(2019)'] + $row['TS(2020)'];
                                                    }

                                                    /* Hitung Total Presentase Jumlah Mahasiswa Asing 
                                                    Rumus :
                                                    presentase_mahasiswa = (total_mhs_asing/total_mhs_aktif) * 100% [100% = 1]
                                                    Jika Presentase >= 0,5% skor = 4,
                                                    Jika presentase < 0,5% skor = 2 + (4 * Presentase_mahasiswa)
                                                    Jika Presentase = 0% maka skor 1 || 0
                                                    */ 
                                                    $presentase_mahasiswa;
                                                    $skor_mahasiswa_asing;
                                                    $presentase_mahasiswa = ($total_mahasiswa_asing/$total_mahasiswa_aktif) * 1;
                                                    $presentase_mahasiswa = number_format($presentase_mahasiswa, 3); // Limit Desimal Output 3 angka

                                                    // Hitung Skoor Tabel 2.b Mahasiswa Asing [notes 0,5% = 0,005]
                                                    if($presentase_mahasiswa >= 0.005 ){  //[notes 0,5% = 0,005]
                                                        $skor_mahasiswa_asing = 4;
                                                    } else if($presentase_mahasiswa < 0.005 && $presentase_mahasiswa > 0){
                                                        $skor_mahasiswa_asing = 2+(400 * $presentase_mahasiswa);
                                                    } else {
                                                        $skor_mahasiswa_asing=  0;/*0;$presentase_mahasiswa == 0 ? 0 : 1; */
                                                    }

                                                    echo '<div class="skor">';
                                                    echo '<p> Jumlah Mahasiswa Asing 3 Tahun Terakhir: '. $total_mahasiswa_asing .'</p>';
                                                    echo '<p>Jumlah Mahasiswa Aktif 3 Tahun Terakhir: ' . $total_mahasiswa_aktif.'</p>';
                                                    echo '<p>Presentase Mahasiswa Asing Bilangan Bulat:' .$presentase_mahasiswa .'</p>';
                                                    echo '<p>Presentase Mahasiswa (%):' .$presentase_mahasiswa * 100 .'%</p>';
                                                    echo '<p>Skor Tabel :'. $skor_mahasiswa_asing.'</p>';
                                                    echo '</div>';
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
                                                    // Fetch API response ?query = dosen_tetap & jumlah_prodi endpoint
                                                    $response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
                                                    $response_jumlah_prodi = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=jumlah_prodi');

                                                    // Decode JSON response $response_dosen_tetap & $response_jumlah_prodi
                                                    $dosen_tetap = json_decode($response_dosen_tetap, true);
                                                    $jumlah_prodi = json_decode($response_jumlah_prodi, true);

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
                                                        foreach ($dosen_tetap as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['NOMOR'] . '</td>';
                                                            echo '<td>' . $row['DEPARTEMEN'] . '</td>';
                                                            echo '<td>' . $row['Doktor/Doktor Terapan'] . '</td>';
                                                            echo '<td>' . $row['Magister/Magister Terapan'] . '</td>';
                                                            echo '<td>' . $row['PROFESI'] . '</td>';
                                                            echo '<td>' . $row['Jumlah'] . '</td>';
                                                            echo '</tr>';
                                                        }

                                                        // Hitung Jumlah Doktor, Magister, dan Profesi
                                                        $doktor = 0;
                                                        $magister = 0;
                                                        $profesi = 0;
                                                        $jumlah = 0;
                                                        foreach($dosen_tetap as $row){
                                                            $doktor += $row['Doktor/Doktor Terapan'];
                                                            $magister += $row['Magister/Magister Terapan'];
                                                            $profesi += $row['PROFESI'];
                                                            $jumlah += $row['Jumlah'];
                                                        }

                                                        // Tambah Row Data
                                                        echo '<tr class="table-row">';
                                                        echo '<td colspan="2"><p class="total">Total</p></td>';
                                                        echo '<td>'. $doktor .'</td>';
                                                        echo '<td>'. $magister . '</td>';
                                                        echo '<td>'. $profesi .'</td>';
                                                        echo '<td>'. $jumlah . '</td>';
                                                        echo '</tr>';
                                                       echo '</tbody>';
                                                    echo '</table>';
                                                        
                                                    // Hitung Total Dosen Tetap
                                                    $total_dosen_tetap=0;
                                                    foreach($dosen_tetap as $row){
                                                        $total_dosen_tetap += $row['Doktor/Doktor Terapan'] + $row['Magister/Magister Terapan'] + $row['PROFESI'];
                                                    }

                                                    // Hitung Jumlah Program Studi 
                                                    $total_prodi;
                                                    $total_prodi = count(array_unique(array_column($jumlah_prodi, 'Nomor')));

                                                    /* Hitung Rasio Jumlah Dosen Tetap 
                                                        Rumus : 
                                                        rasio_dosen = (total_dosen_tetap/total_prodi)
                                                    */
                                                    $rasio_dosen;
                                                    $skor_rasio_dosen;

                                                    $rasio_dosen = ($total_dosen_tetap/$total_prodi);
                                                    $rasio_dosen = number_format($rasio_dosen, 2);

                                                    // Hitung Skoor Tabel 3.a.1 Kecukupan Dosen Perguruan Tinggi
                                                    if($rasio_dosen >= 10){
                                                        $skor_rasio_dosen = 4;
                                                    } else if($rasio_dosen >= 5 && $rasio_dosen < 10){
                                                        $skor_rasio_dosen = (2 * $rasio_dosen) / 5;
                                                    } else {
                                                        $skor_rasio_dosen = 0;
                                                    }

                                                    echo '<div class="skor">';
                                                    echo '<p>Jumlah Dosen Tetap: '. $total_dosen_tetap .'</p>';
                                                    echo '<p>Jumlah Program Studi: '. $total_prodi .'</p>';
                                                    echo '<p>Rasio Dosen Tetap: '. $rasio_dosen .'</p>';
                                                    echo '<p>Skor Tabel Rasio Dosen: '. $skor_rasio_dosen .'</p>';
                                                    echo '</div>';
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