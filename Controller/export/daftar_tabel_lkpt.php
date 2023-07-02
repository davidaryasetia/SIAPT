<?php
// Fetch API daftar_tabel LKPT
$response_tabel_lkpt = file_get_contents('https://project.mis.pens.ac.id/mis143/API/TABEL_LKPT.php');
$response_mahasiswa_asing = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_asing');
$response_sks = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.c_kredit_mata_kuliah.php');
$response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');
$response_jabatan_akademik = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.2_jabatan_akademik_dosen_tetap.php');
$response_sertifikasi_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.3_sertifikasi_dosen.php');
$response_dosen_tidak_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.4_dosen_tidak_tetap.php');
$response_rasio_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.b_rasio_dosen_terhadap_mahasiswa.php');
$response_penelitian_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.c.1_produktivitas_penelitian_dosen.php');
$response_pkm_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.c.2_produktivitas_pkm_dosen.php');
$response_rekognisi = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php');
$response_prestasi_akademik = file_get_contents('https://project.mis.pens.ac.id/mis143/API/5.b.1_prestasi_akademik_mahasiswa.php');
$response_prestasi_nonakademik = file_get_contents('https://project.mis.pens.ac.id/mis143/API/5.b.2_prestasi_non_akademik_mahasiswa.php');

// json_Decode JSON $response
$tabel_lkpt = json_decode($response_tabel_lkpt, true);
$mahasiswa_asing = json_decode($response_mahasiswa_asing, true);
$sks = json_decode($response_sks, true);
$dosen_tetap = json_decode ($response_dosen_tetap, true);
$jabatan_akademik = json_decode($response_jabatan_akademik, true);
$sertifikasi_dosen = json_decode($response_sertifikasi_dosen, true);
$dosen_tidak_tetap = json_decode($response_dosen_tidak_tetap, true);
$rasio_dosen = json_decode($response_rasio_dosen, true);
$penelitian_dosen = json_decode($response_penelitian_dosen, true);
$pkm_dosen = json_decode($response_pkm_dosen, true);
$rekognisi = json_decode($response_rekognisi, true);
$prestasi_akademik = json_decode($response_prestasi_akademik, true);
$prestasi_nonakademik = json_decode($response_prestasi_nonakademik, true);


require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;

$tabel = new Spreadsheet();

// ==================================================================================================================================================
// Daftar Tabel
$daftar_tabel = $tabel->getActiveSheet();
$daftar_tabel->mergeCells('A1:C1');
$daftar_tabel->setCellValue('A1', 'Daftar Tabel - Laporan Kinerja Perguruan Tinggi');
$daftar_tabel->getStyle('A1')->getFont()->setBold(true);
$daftar_tabel->setTitle('Daftar Tabel');
$daftar_tabel->getStyle('A3:E3')->getFont()->setBold(true); // Apply bold font to header row
$daftar_tabel->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$daftar_tabel->getStyle('A3:E3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$daftar_tabel->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$daftar_tabel->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$daftar_tabel->getRowDimension(3)->setRowHeight(30);
$daftar_tabel->setCellValue('A3', 'No.');
$daftar_tabel->setCellValue('B3', 'Nomor dan Judul Tabel');
$daftar_tabel->setCellValue('C3', 'Nama Sheet');
$daftar_tabel->setCellValue('D3', 'Status Data');
$daftar_tabel->setCellValue('E3', 'Sumber Data');
// End Heading Tabel

// Set Autosize and widht height column
$daftar_tabel->getColumnDimension('A')->setAutoSize(true);
$daftar_tabel->getColumnDimension('B')->setWidth(400, 'px');
$daftar_tabel->getColumnDimension('C')->setWidth(100, 'px');
$daftar_tabel->getColumnDimension('D')->setWidth(130, 'px');
$daftar_tabel->getColumnDimension('E')->setWidth(130, 'px');


$rowIndex = 4; // Start row index for data
foreach ($tabel_lkpt as $row) {
    $daftar_tabel->setCellValue('A' . $rowIndex, $row['NO']);
    $daftar_tabel->setCellValue('B' . $rowIndex, $row['JUDUL']);
    $daftar_tabel->setCellValue('C' . $rowIndex, $row['SHEET']);
    $daftar_tabel->setCellValue('D' . $rowIndex, $row['STATUS']);
    $daftar_tabel->setCellValue('E' . $rowIndex, $row['SUMBER']);
    $daftar_tabel->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $fontColor = new Color();
    $fontColor->setRGB('0000FF');
    $daftar_tabel->getStyle('C4:C' . $rowIndex)->getFont()->setColor($fontColor);
    $daftar_tabel->getStyle('C' .$rowIndex .':E' .$rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $daftar_tabel->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// ==================================================================================================================================================


// Tabel 2.b Mahasiswa Asing
$tabel_2b = $tabel->createSheet();
$tabel_2b->setCellValue('A1', 'Tabel 2.b Mahasiswa Asing');
$tabel_2b->mergeCells('A1:E1');
$tabel_2b->setTitle('2b');
$tabel_2b->getStyle('A3:E3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_2b->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2b->getStyle('A3:E3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_2b->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_2b->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_2b->getRowDimension(3)->setRowHeight(30);
$tabel_2b->setCellValue('A3', 'No.');
$tabel_2b->setCellValue('B3', 'Program Studi.');
$tabel_2b->setCellValue('C3', 'TS-2(2017)');
$tabel_2b->setCellValue('D3', 'TS-1(2018)');
$tabel_2b->setCellValue('E3', 'TS(2019)');
// End Heading Tabel

// Set Autosize and widht height column
$tabel_2b->getColumnDimension('A')->setAutoSize(true);
$tabel_2b->getColumnDimension('B')->setAutoSize(true);
$tabel_2b->getColumnDimension('C')->setWidth(100, 'px');
$tabel_2b->getColumnDimension('D')->setWidth(100, 'px');
$tabel_2b->getColumnDimension('E')->setWidth(100, 'px');


// Heading No
$tabel_2b->getStyle('A4:E4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_2b->getStyle('A4:E4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2b->getStyle('A4:E4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_2b->getStyle('A4:E4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_2b->getStyle('A4:E4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_2b->getRowDimension(4)->setRowHeight(15);
$tabel_2b->setCellValue('A4', '1.');
$tabel_2b->setCellValue('B4', '2');
$tabel_2b->setCellValue('C4', '3');
$tabel_2b->setCellValue('D4', '4');
$tabel_2b->setCellValue('E4', '5');
// End Heading Tabel

$rowIndex = 5; // Start row index for data
foreach ($mahasiswa_asing as $row) {
    $tabel_2b->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $tabel_2b->setCellValue('B' . $rowIndex, $row['Program Studi']);
    $tabel_2b->setCellValue('C' . $rowIndex, $row['TS-2(2017)']);
    $tabel_2b->setCellValue('D' . $rowIndex, $row['TS-1(2018)']);
    $tabel_2b->setCellValue('E' . $rowIndex, $row['TS(2019)']);
    $tabel_2b->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_2b->getStyle('C' .$rowIndex .':E' .$rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_2b->getStyle('B' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_2b->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$ts2Sum = '=SUM(C5:C' . $rowIndex . ')';
$ts1Sum = '=SUM(D5:D' . $rowIndex . ')';
$tsSum = '=SUM(E5:E' . $rowIndex . ')';

// Set total row
$tabel_2b->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_2b->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_2b->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true); 
$tabel_2b->setCellValue('C' . $rowIndex, $ts2Sum);
$tabel_2b->setCellValue('D' . $rowIndex, $ts1Sum);
$tabel_2b->setCellValue('E' . $rowIndex, $tsSum);
$tabel_2b->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2b->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_2b->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$tabel_2b->getStyle('C2:E' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2b->getStyle('A2:A' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2b->getStyle('B' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_2b->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$tabel_2b->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;


// ==================================================================================================================================================

// Tabel 2.c Kredit Mata Kuliah
$tabel_2c = $tabel->createSheet();
$tabel_2c->setCellValue('A1', 'Tabel 2.c Kredit Matakuliah');
$tabel_2c->mergeCells('A1:E1');
$tabel_2c->setTitle('2c');
$tabel_2c->getStyle('A3:G3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_2c->getStyle('A3:G3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2c->getStyle('A3:G3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_2c->getStyle('A3:G3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_2c->getStyle('A3:G3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_2c->getRowDimension(3)->setRowHeight(30);
$tabel_2c->setCellValue('A3', 'No.');
$tabel_2c->setCellValue('B3', 'Program Studi.');
$tabel_2c->setCellValue('C3', 'Teori');
$tabel_2c->setCellValue('D3', 'Praktikum');
$tabel_2c->setCellValue('E3', 'Praktik');
$tabel_2c->setCellValue('F3', 'PKL');
$tabel_2c->setCellValue('G3', 'Total');
// End Heading Tabel

// Set Autosize and widht height column
$tabel_2c->getColumnDimension('A')->setAutoSize(true);
$tabel_2c->getColumnDimension('B')->setAutoSize(true);
$tabel_2c->getColumnDimension('C')->setWidth(80, 'px');
$tabel_2c->getColumnDimension('D')->setWidth(80, 'px');
$tabel_2c->getColumnDimension('E')->setWidth(80, 'px');
$tabel_2c->getColumnDimension('F')->setWidth(80, 'px');
$tabel_2c->getColumnDimension('G')->setWidth(80, 'px');


// Heading No
$tabel_2c = $tabel->getActiveSheet();
$tabel_2c->getStyle('A4:G4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_2c->getStyle('A4:G4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2c->getStyle('A4:G4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_2c->getStyle('A4:G4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_2c->getStyle('A4:G4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_2c->getRowDimension(4)->setRowHeight(15);
$tabel_2c->setCellValue('A4', '1.');
$tabel_2c->setCellValue('B4', '2');
$tabel_2c->setCellValue('C4', '3');
$tabel_2c->setCellValue('D4', '4');
$tabel_2c->setCellValue('E4', '5');
$tabel_2c->setCellValue('F4', '6');
$tabel_2c->setCellValue('G4', '7');
// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($sks as $row) {
    $tabel_2c->setCellValue('A' . $rowIndex, $row['No.']);
    $tabel_2c->setCellValue('B' . $rowIndex, $row['Program Studi']);
    $tabel_2c->setCellValue('C' . $rowIndex, $row['Teori']);
    $tabel_2c->setCellValue('D' . $rowIndex, $row['Praktikum']);
    $tabel_2c->setCellValue('E' . $rowIndex, $row['Praktik']);
    $tabel_2c->setCellValue('F' . $rowIndex, $row['PKL']);
    // Calculate total untuk setiap row
    $tabel_2c->setCellValue('G' . $rowIndex, '=C' . $rowIndex . '+D' . $rowIndex . '+E' . $rowIndex . '+F' . $rowIndex);
    $tabel_2c->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_2c->getStyle('C' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_2c->getStyle('B' . $rowIndex . ':F' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$teori =     '=SUM(C5:C' . $rowIndex . ')';
$praktikum = '=SUM(D5:D' . $rowIndex . ')';
$praktik =   '=SUM(E5:E' . $rowIndex . ')';
$pkl =       '=SUM(F5:F' . $rowIndex . ')';
$total =     '=SUM(G5:G' . $rowIndex . ')';

// Set total row
$tabel_2c->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_2c->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_2c->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true); 
$tabel_2c->setCellValue('C' . $rowIndex, $teori);
$tabel_2c->setCellValue('D' . $rowIndex, $praktikum);
$tabel_2c->setCellValue('E' . $rowIndex, $praktik);
$tabel_2c->setCellValue('F' . $rowIndex, $pkl);
$tabel_2c->setCellValue('G' . $rowIndex, $total);
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2c->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;


// ==================================================================================================================================================

// Tabel 3.a.1 Kecukupan Dosen Perguruan Tinggi
$tabel_3a1 = $tabel->createSheet();
$tabel_3a1->mergeCells('A1:E1');
$tabel_3a1->setCellValue('A1', 'Tabel 3.a.1 Kecukupan Dosen Perguruan Tinggi');
$tabel_3a1->setTitle('3a1');
$tabel_3a1->getStyle('A3:F3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a1->getStyle('A3:F3')->getAlignment()->setWrapText(true);
$tabel_3a1->getColumnDimension('B')->setWidth(15); // Mengatur lebar kolom B
$tabel_3a1->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a1->getStyle('A3:F3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a1->getStyle('A3:F3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3a1->getStyle('A3:F3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a1->getRowDimension(3)->setRowHeight(30);
$tabel_3a1->setCellValue('A3', 'No.');
$tabel_3a1->setCellValue('B3', 'Unit Pengelola(Departemen/Jurusan)');
$tabel_3a1->setCellValue('C3', 'Doktor/Doktor Terapan');
$tabel_3a1->setCellValue('D3', 'Magister/Magister Terapan');
$tabel_3a1->setCellValue('E3', 'Profesi');
$tabel_3a1->setCellValue('F3', 'Jumlah');
// End Heading Tabel

// Set Autosize and widht height column
$tabel_3a1->getColumnDimension('A')->setAutoSize(true);
$tabel_3a1->getColumnDimension('B')->setWidth(250, 'px');
$tabel_3a1->getColumnDimension('C')->setWidth(130, 'px');
$tabel_3a1->getColumnDimension('D')->setWidth(130, 'px');
$tabel_3a1->getColumnDimension('E')->setWidth(130, 'px');
$tabel_3a1->getColumnDimension('F')->setWidth(130, 'px');


// Heading No
$tabel_3a1 = $tabel->getActiveSheet();
$tabel_3a1->getStyle('A4:F4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a1->getStyle('A4:F4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a1->getStyle('A4:F4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a1->getStyle('A4:F4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3a1->getStyle('A4:F4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a1->getRowDimension(4)->setRowHeight(15);
$tabel_3a1->setCellValue('A4', '1.');
$tabel_3a1->setCellValue('B4', '2');
$tabel_3a1->setCellValue('C4', '3');
$tabel_3a1->setCellValue('D4', '4');
$tabel_3a1->setCellValue('E4', '5');
$tabel_3a1->setCellValue('F4', '6');
// End Heading Tabel

$rowIndex = 5; // Start row index for data
foreach ($dosen_tetap as $row) {
    $tabel_3a1->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $tabel_3a1->setCellValue('B' . $rowIndex, $row['DEPARTEMEN']);
    $tabel_3a1->setCellValue('C' . $rowIndex, $row['Doktor/Doktor Terapan']);
    $tabel_3a1->setCellValue('D' . $rowIndex, $row['Magister/Magister Terapan']);
    $tabel_3a1->setCellValue('E' . $rowIndex, $row['PROFESI']);
    $tabel_3a1->setCellValue('F' . $rowIndex, $row['Jumlah']);
    $tabel_3a1->getStyle('C2:F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a1->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a1->getStyle('B' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3a1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$doktor =   '=SUM(C5:C' . $rowIndex . ')';
$magister = '=SUM(D5:D' . $rowIndex . ')';
$profesi =  '=SUM(E5:E' . $rowIndex . ')';
$jumlah =  '=SUM(F5:F' . $rowIndex . ')';

// Set total row
$tabel_3a1->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3a1->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3a1->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true); 
$tabel_3a1->setCellValue('C' . $rowIndex, $doktor);
$tabel_3a1->setCellValue('D' . $rowIndex, $magister);
$tabel_3a1->setCellValue('E' . $rowIndex, $profesi);
$tabel_3a1->setCellValue('F' . $rowIndex, $jumlah);
$tabel_3a1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$tabel_3a1->getStyle('C2:F' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a1->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a1->getStyle('B' . $rowIndex . ':F' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3a1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;


// ==================================================================================================================================================

// Tabel 3.a.2 Jabatan Akademik Dosen Tetap
$tabel_3a2 = $tabel->createSheet();
$tabel_3a2->mergeCells('A1:E1');
$tabel_3a2->setCellValue('A1', 'Tabel 3.a.2 Jabatan Akademik Dosen Tetap');
$tabel_3a2->setTitle('3a2');
$tabel_3a2->getStyle('A3:H3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a2->getStyle('A3:H3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a2->getStyle('A3:H3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a2->getStyle('A3:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3a2->getStyle('A3:H3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a2->getRowDimension(3)->setRowHeight(30);
$tabel_3a2->setCellValue('A3', 'No.');
$tabel_3a2->setCellValue('B3', 'Pendidikan ');
$tabel_3a2->setCellValue('C3', 'Guru Besar');
$tabel_3a2->setCellValue('D3', 'Lektor Kepala');
$tabel_3a2->setCellValue('E3', 'Lektor');
$tabel_3a2->setCellValue('F3', 'Asisten Ahli');
$tabel_3a2->setCellValue('G3', 'Tenaga Pengajar');
$tabel_3a2->setCellValue('H3', 'Jumlah');
// End Heading Tabel

// Set Autosize and widht height column and wrap text
$tabel_3a2->getColumnDimension('A')->setAutoSize(true);
$tabel_3a2->getColumnDimension('B')->setWidth(320, 'px');
$tabel_3a2->getColumnDimension('C')->setWidth(100, 'px');
$tabel_3a2->getColumnDimension('D')->setWidth(100, 'px');
$tabel_3a2->getColumnDimension('E')->setWidth(100, 'px');
$tabel_3a2->getColumnDimension('F')->setWidth(100, 'px');
$tabel_3a2->getColumnDimension('G')->setWidth(100, 'px');
$tabel_3a2->getColumnDimension('H')->setWidth(100, 'px');

// Heading No
$tabel_3a2 = $tabel->getActiveSheet();
$tabel_3a2->getStyle('A4:H4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a2->getStyle('A4:H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a2->getStyle('A4:H4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a2->getStyle('A4:H4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3a2->getStyle('A4:H4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a2->getRowDimension(4)->setRowHeight(15);
$tabel_3a2->setCellValue('A4', '1.');
$tabel_3a2->setCellValue('B4', '2');
$tabel_3a2->setCellValue('C4', '3');
$tabel_3a2->setCellValue('D4', '4');
$tabel_3a2->setCellValue('E4', '5');
$tabel_3a2->setCellValue('F4', '6');
$tabel_3a2->setCellValue('G4', '7');
$tabel_3a2->setCellValue('H4', '8');
// End Heading Tabel

$rowIndex = 5; // Start row index for data
foreach ($jabatan_akademik as $row)  {
    $tabel_3a2->setCellValue('A' . $rowIndex, $row['Nomor']);
    $tabel_3a2->setCellValue('B' . $rowIndex, $row['Pendidikan']);
    $tabel_3a2->setCellValue('C' . $rowIndex, $row['Guru Besar']);
    $tabel_3a2->setCellValue('D' . $rowIndex, $row['Lektor Kepala']);
    $tabel_3a2->setCellValue('E' . $rowIndex, $row['Lektor']);
    $tabel_3a2->setCellValue('F' . $rowIndex, $row['Asisten Ahli']);
    $tabel_3a2->setCellValue('G' . $rowIndex, $row['Tenaga Pengajar']);
    // Calculate Total untuk setiap row
    $tabel_3a2->getStyle('A2:H' . $rowIndex)->getAlignment()->setWrapText(true);
    $tabel_3a2->setCellValue('H'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex. '+E' .$rowIndex. '+F' .$rowIndex. '+G' .$rowIndex );
    $tabel_3a2->getStyle('A' .$rowIndex . ':H' .$rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
    $tabel_3a2->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a2->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a2->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $rowIndex++;
}

// Calculate column sums
$guru_besar =    '=SUM(C5:C' . $rowIndex . ')';
$lektor_kepala = '=SUM(D5:D' . $rowIndex . ')';
$lektor =        '=SUM(E5:E' . $rowIndex . ')';
$asisten_ahli =  '=SUM(F5:F' . $rowIndex . ')';
$tenaga_pengajar=  '=SUM(G5:G' . $rowIndex . ')';
$jumlah=  '=SUM(H5:H' . $rowIndex . ')';

// Set total row
$tabel_3a2->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3a2->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3a2->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true); 
$tabel_3a2->setCellValue('C' . $rowIndex, $guru_besar);
$tabel_3a2->setCellValue('D' . $rowIndex, $lektor_kepala);
$tabel_3a2->setCellValue('E' . $rowIndex, $lektor);
$tabel_3a2->setCellValue('F' . $rowIndex, $asisten_ahli);
$tabel_3a2->setCellValue('G' . $rowIndex, $tenaga_pengajar);
$tabel_3a2->setCellValue('H' . $rowIndex, $jumlah);
$tabel_3a2->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a2->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a2->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$tabel_3a2->getStyle('C2:F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a2->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a2->getStyle('B' . $rowIndex . ':H' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3a2->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;


// ==================================================================================================================================================

// Tabel 3.a.3 Sertifikasi Dosen (Pendidik Profesional/Profesi/Industri/Kompetensi)
$tabel_3a3 = $tabel->createSheet();
$tabel_3a3->mergeCells('A1:E1');
$tabel_3a3->setCellValue('A1', 'Tabel 3.a.3) Sertifikasi Dosen (Pendidik Profesional/Profesi/Industri/Kompetensi)');
$tabel_3a3->setTitle('3a3');
$tabel_3a3->getStyle('A3:E3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a3->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a3->getStyle('A3:E3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a3->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3a3->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a3->getRowDimension(3)->setRowHeight(15);
$tabel_3a3->setCellValue('A3', 'No.');
$tabel_3a3->setCellValue('B3', 'Departemen/Jurusan');
$tabel_3a3->setCellValue('C3', 'Jumlah Dosen');
$tabel_3a3->setCellValue('D3', 'Jumlah Dosen Bersertifikat');
$tabel_3a3->setCellValue('E3', 'Jumlah');
// End Heading Tabel

// Set Autosize and widht height column and wrap text
$tabel_3a3->getColumnDimension('A')->setAutoSize(true);
$tabel_3a3->getColumnDimension('B')->setWidth(250, 'px');
$tabel_3a3->getColumnDimension('C')->setWidth(130, 'px');
$tabel_3a3->getColumnDimension('D')->setWidth(130, 'px');
$tabel_3a3->getColumnDimension('E')->setWidth(130, 'px');

// Heading No
$tabel_3a3 = $tabel->getActiveSheet();
$tabel_3a3->getStyle('A4:E4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a3->getStyle('A4:E4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a3->getStyle('A4:E4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a3->getStyle('A4:E4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3a3->getStyle('A4:E4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a3->getRowDimension(4)->setRowHeight(15);
$tabel_3a3->setCellValue('A4', '1.');
$tabel_3a3->setCellValue('B4', '2');
$tabel_3a3->setCellValue('C4', '3');
$tabel_3a3->setCellValue('D4', '4');
$tabel_3a3->setCellValue('E4', '5');

// End Heading Tabel

$rowIndex = 5; // Start row index for data
foreach ($sertifikasi_dosen as $row)  {
    $tabel_3a3->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $tabel_3a3->setCellValue('B' . $rowIndex, $row['Departemen/Jurusan']);
    $tabel_3a3->setCellValue('C' . $rowIndex, $row['Jumlah Dosen']);
    $tabel_3a3->setCellValue('D' . $rowIndex, $row['Jumlah Dosen Bersertifikat']);
    // Calculate Total untuk setiap row
    $tabel_3a3->setCellValue('E'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex );
    $tabel_3a3->getStyle('A2:E' . $rowIndex)->getAlignment()->setWrapText(true);
    $tabel_3a3->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a3->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a3->getStyle('B' . $rowIndex . ':D' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$dosen =    '=SUM(C5:C' . $rowIndex . ')';
$dosen_bersertifikat = '=SUM(D5:D' . $rowIndex . ')';
$jumlah =        '=SUM(E5:E' . $rowIndex . ')';


// Set total row
$tabel_3a3->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3a3->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3a3->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true);
$tabel_3a3->setCellValue('C' . $rowIndex, $dosen);
$tabel_3a3->setCellValue('D' . $rowIndex, $dosen_bersertifikat);
$tabel_3a3->setCellValue('E' . $rowIndex, $jumlah);
$tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$tabel_3a3->getStyle('C2:F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a3->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;



// ==================================================================================================================================================

// Tabel 3.a.4 Dosen Tidak Tetap
$tabel_3a4 = $tabel->createSheet();
$tabel_3a4->mergeCells('A1:E1');
$tabel_3a4->setCellValue('A1', 'Tabel 3.a.4) Dosen Tidak Tetap');
$tabel_3a4->setTitle('3a4');
$tabel_3a4->getStyle('A3:H3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a4->getStyle('A3:H3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a4->getStyle('A3:H3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a4->getStyle('A3:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3a4->getStyle('A3:H3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a4->getRowDimension(3)->setRowHeight(15);
$tabel_3a4->setCellValue('A3', 'No.');
$tabel_3a4->setCellValue('B3', 'Pendidikan');
$tabel_3a4->setCellValue('C3', 'Guru Besar');
$tabel_3a4->setCellValue('D3', 'Lektor Kepala');
$tabel_3a4->setCellValue('E3', 'Lektor');
$tabel_3a4->setCellValue('F3', 'Asisten Ahli');
$tabel_3a4->setCellValue('G3', 'Tenaga Pengajar');
$tabel_3a4->setCellValue('H3', 'Jumlah');
// End Heading Tabel

// Heading No
$tabel_3a4 = $tabel->getActiveSheet();
$tabel_3a4->getStyle('A4:H4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a4->getStyle('A4:H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a4->getStyle('A4:H4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a4->getStyle('A4:H4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3a4->getStyle('A4:H4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a4->getRowDimension(4)->setRowHeight(15);
$tabel_3a4->setCellValue('A4', '1.');
$tabel_3a4->setCellValue('B4', '2');
$tabel_3a4->setCellValue('C4', '3');
$tabel_3a4->setCellValue('D4', '4');
$tabel_3a4->setCellValue('E4', '5');
$tabel_3a4->setCellValue('F4', '6');
$tabel_3a4->setCellValue('G4', '7');
$tabel_3a4->setCellValue('H4', '8');
// End Heading Tabel


// Set Autosize and widht height column and wrap text
$tabel_3a4->getColumnDimension('A')->setAutoSize(true);
$tabel_3a4->getColumnDimension('B')->setWidth(200, 'px');
$tabel_3a4->getColumnDimension('C')->setWidth(100, 'px');
$tabel_3a4->getColumnDimension('D')->setWidth(100, 'px');
$tabel_3a4->getColumnDimension('E')->setWidth(100, 'px');
$tabel_3a4->getColumnDimension('F')->setWidth(100, 'px');
$tabel_3a4->getColumnDimension('G')->setWidth(110, 'px');
$tabel_3a4->getColumnDimension('H')->setWidth(100, 'px');


$rowIndex = 5; // Start row index for data
foreach ($dosen_tidak_tetap as $row)  {
    $tabel_3a4->setCellValue('A' . $rowIndex, $row['Nomor']);
    $tabel_3a4->setCellValue('B' . $rowIndex, $row['Pendidikan']);
    $tabel_3a4->setCellValue('C' . $rowIndex, $row['Guru Besar']);
    $tabel_3a4->setCellValue('D' . $rowIndex, $row['Lektor Kepala']);
    $tabel_3a4->setCellValue('E' . $rowIndex, $row['Lektor']);
    $tabel_3a4->setCellValue('F' . $rowIndex, $row['Asisten Ahli']);
    $tabel_3a4->setCellValue('G' . $rowIndex, $row['Tenaga Pengajar']);
    // Calculate Total untuk setiap row
    $tabel_3a4->setCellValue('H'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex. '+E' .$rowIndex. '+F' .$rowIndex. '+G' .$rowIndex );
    $tabel_3a4->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a4->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a4->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3a4->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$guru_besar    = '=SUM(C5:C' . $rowIndex . ')';
$lektor_kepala = '=SUM(D5:D' . $rowIndex . ')';
$lektor =        '=SUM(E5:E' . $rowIndex . ')';
$asisten_ahli =  '=SUM(F5:F' . $rowIndex . ')';
$tenaga_pengajar ='=SUM(G5:G' . $rowIndex . ')';
$jumlah =        '=SUM(H5:H' . $rowIndex . ')';


// Set total row
$tabel_3a4->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3a4->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3a4->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true);
$tabel_3a4->setCellValue('C' . $rowIndex, $guru_besar);
$tabel_3a4->setCellValue('D' . $rowIndex, $lektor_kepala);
$tabel_3a4->setCellValue('E' . $rowIndex, $lektor);
$tabel_3a4->setCellValue('F' . $rowIndex, $asisten_ahli);
$tabel_3a4->setCellValue('G' . $rowIndex, $tenaga_pengajar);
$tabel_3a4->setCellValue('H' . $rowIndex, $jumlah);
$tabel_3a4->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a4->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a4->getStyle('C2:H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a4->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a4->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3a4->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;


// ==================================================================================================================================================

// Tabel 3.b Rasio Dosen Terhadap Mahasiswa
$tabel_3b = $tabel->createSheet();
$tabel_3b->mergeCells('A1:E1');
$tabel_3b->setCellValue('A1', 'Tabel 3.b) Rasio Dosen Terhadap Mahasiswa');
$tabel_3b->setTitle('3b');
$tabel_3b->getStyle('A3:E3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3b->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3b->getStyle('A3:E3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3b->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3b->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3b->getRowDimension(3)->setRowHeight(15);
$tabel_3b->setCellValue('A3', 'No.');
$tabel_3b->setCellValue('B3', 'Departemen');
$tabel_3b->setCellValue('C3', 'Jumlah Dosen');
$tabel_3b->setCellValue('D3', 'Mahasiswa (TS)');
$tabel_3b->setCellValue('E3', 'Jumlah Mahasiswa TA');
// End Heading Tabel

// Set Autosize and widht height column and wrap text
$tabel_3b->getColumnDimension('A')->setAutoSize(true);
$tabel_3b->getColumnDimension('B')->setWidth(250, 'px');
$tabel_3b->getColumnDimension('C')->setWidth(150, 'px');
$tabel_3b->getColumnDimension('D')->setWidth(150, 'px');
$tabel_3b->getColumnDimension('E')->setWidth(150, 'px');


// Heading No
$tabel_3b = $tabel->getActiveSheet();
$tabel_3b->getStyle('A4:E4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3b->getStyle('A4:E4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3b->getStyle('A4:E4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3b->getStyle('A4:E4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3b->getStyle('A4:E4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3b->getRowDimension(4)->setRowHeight(15);
$tabel_3b->setCellValue('A4', '1.');
$tabel_3b->setCellValue('B4', '2');
$tabel_3b->setCellValue('C4', '3');
$tabel_3b->setCellValue('D4', '4');
$tabel_3b->setCellValue('E4', '5');


// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($rasio_dosen as $row)  {
    $tabel_3b->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $tabel_3b->setCellValue('B' . $rowIndex, $row['DEPARTEMEN']);
    $tabel_3b->setCellValue('C' . $rowIndex, $row['Jumlah Dosen']);
    $tabel_3b->setCellValue('D' . $rowIndex, $row['Mahasiswa Angkatan 2020']);
    $tabel_3b->setCellValue('E' . $rowIndex, $row['Jumlah Mahasiswa TA']);
    // Calculate Total untuk setiap row
    $tabel_3b->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3b->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3b->getStyle('B' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3b->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$jumlah_dosen    = '=SUM(C5:C' . $rowIndex . ')';
$mahasiswa    = '=SUM(D5:D' . $rowIndex . ')';
$mahasiswa_ta      = '=SUM(E5:E' . $rowIndex . ')';


// Set total row
$tabel_3b->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3b->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3b->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true);
$tabel_3b->setCellValue('C' . $rowIndex, $jumlah_dosen);
$tabel_3b->setCellValue('D' . $rowIndex, $mahasiswa);
$tabel_3b->setCellValue('E' . $rowIndex, $mahasiswa_ta);
$tabel_3b->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3b->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3b->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3b->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3b->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;



// ==================================================================================================================================================

// Tabel 3.c.1 Produktivitas Penenelitian Dosen 
$tabel_3c1 = $tabel->createSheet();
$tabel_3c1->mergeCells('A1:E1');
$tabel_3c1->setCellValue('A1', 'Tabel 3.c.1) Produktivitas Penelitian Dosen');
$tabel_3c1->setTitle('3c1');
$tabel_3c1->getStyle('A3:F3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3c1->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c1->getStyle('A3:F3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3c1->getStyle('A3:F3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3c1->getStyle('A3:F3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3c1->getRowDimension(3)->setRowHeight(15);
$tabel_3c1->setCellValue('A3', 'No.');
$tabel_3c1->setCellValue('B3', 'Sumber Pembiayaan');
$tabel_3c1->setCellValue('C3', 'TS-2');
$tabel_3c1->setCellValue('D3', 'TS-1');
$tabel_3c1->setCellValue('E3', 'TS');
$tabel_3c1->setCellValue('F3', 'Jumlah');
// End Heading Tabel

// Set Autosize and widht height column and wrap text
$tabel_3c1->getColumnDimension('A')->setAutoSize(true);
$tabel_3c1->getColumnDimension('B')->setWidth(250, 'px');
$tabel_3c1->getColumnDimension('C')->setWidth(150, 'px');
$tabel_3c1->getColumnDimension('D')->setWidth(150, 'px');
$tabel_3c1->getColumnDimension('E')->setWidth(150, 'px');
$tabel_3c1->getColumnDimension('F')->setWidth(150, 'px');

// Heading No
$tabel_3c1 = $tabel->getActiveSheet();
$tabel_3c1->getStyle('A4:F4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3c1->getStyle('A4:F4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c1->getStyle('A4:F4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3c1->getStyle('A4:F4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3c1->getStyle('A4:F4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3c1->getRowDimension(4)->setRowHeight(15);
$tabel_3c1->setCellValue('A4', '1.');
$tabel_3c1->setCellValue('B4', '2');
$tabel_3c1->setCellValue('C4', '3');
$tabel_3c1->setCellValue('D4', '4');
$tabel_3c1->setCellValue('E4', '5');
$tabel_3c1->setCellValue('F4', '6');


// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($penelitian_dosen as $row)  {
    $tabel_3c1->setCellValue('A' . $rowIndex, $row['Nomor']);
    $tabel_3c1->setCellValue('B' . $rowIndex, $row['Sumber Pembiayaan']);
    $tabel_3c1->setCellValue('C' . $rowIndex, $row['TS-2(2017)']);
    $tabel_3c1->setCellValue('D' . $rowIndex, $row['TS-1(2018)']);
    $tabel_3c1->setCellValue('E' . $rowIndex, $row['TS(2019)']);
    // Calculate Total untuk setiap row
    $tabel_3c1->setCellValue('F'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex. '+E' .$rowIndex);
    $tabel_3c1->getStyle('C' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3c1->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3c1->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3c1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$ts2    = '=SUM(C5:C' . $rowIndex . ')';
$ts1    = '=SUM(D5:D' . $rowIndex . ')';
$ts      = '=SUM(E5:E' . $rowIndex . ')';
$jumlah  = '=SUM(F5:F' . $rowIndex . ')';


// Set total row
$tabel_3c1->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3c1->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3c1->getStyle('A4:F4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3c1->setCellValue('C' . $rowIndex, $ts2);
$tabel_3c1->setCellValue('D' . $rowIndex, $ts1);
$tabel_3c1->setCellValue('E' . $rowIndex, $ts);
$tabel_3c1->setCellValue('F' . $rowIndex, $jumlah);
$tabel_3c1->getStyle('C' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c1->getStyle('C' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3c1->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c1->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3c1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;

// ==================================================================================================================================================

// Tabel 3.c.2 Produktivitas PkM Dosen
$tabel_3c2 = $tabel->createSheet();
$tabel_3c2->mergeCells('A1:E1');
$tabel_3c2->setCellValue('A1', 'Tabel 3.c.2) Produktivitas PkM Dosen');
$tabel_3c2->setTitle('3c2');
$tabel_3c2->getStyle('A3:F3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3c2->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c2->getStyle('A3:F3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3c2->getStyle('A3:F3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3c2->getStyle('A3:F3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3c2->getRowDimension(3)->setRowHeight(15);
$tabel_3c2->setCellValue('A3', 'No.');
$tabel_3c2->setCellValue('B3', 'Sumber Pembiayaan');
$tabel_3c2->setCellValue('C3', 'TS-2');
$tabel_3c2->setCellValue('D3', 'TS-1');
$tabel_3c2->setCellValue('E3', 'TS');
$tabel_3c2->setCellValue('F3', 'Jumlah');
// End Heading Tabel

// Set Autosize and widht height column and wrap text
$tabel_3c2->getColumnDimension('A')->setAutoSize(true);
$tabel_3c2->getColumnDimension('B')->setWidth(250, 'px');
$tabel_3c2->getColumnDimension('C')->setWidth(150, 'px');
$tabel_3c2->getColumnDimension('D')->setWidth(150, 'px');
$tabel_3c2->getColumnDimension('E')->setWidth(150, 'px');
$tabel_3c2->getColumnDimension('F')->setWidth(150, 'px');


// Heading No
$tabel_3c2 = $tabel->getActiveSheet();
$tabel_3c2->getStyle('A4:F4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3c2->getStyle('A4:F4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c2->getStyle('A4:F4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3c2->getStyle('A4:F4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3c2->getStyle('A4:F4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3c2->getRowDimension(4)->setRowHeight(15);
$tabel_3c2->setCellValue('A4', '1.');
$tabel_3c2->setCellValue('B4', '2');
$tabel_3c2->setCellValue('C4', '3');
$tabel_3c2->setCellValue('D4', '4');
$tabel_3c2->setCellValue('E4', '5');
$tabel_3c2->setCellValue('F4', '6');
// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($pkm_dosen as $row)  {
    $tabel_3c2->setCellValue('A' . $rowIndex, $row['Nomor']);
    $tabel_3c2->setCellValue('B' . $rowIndex, $row['Sumber Pembiayaan']);
    $tabel_3c2->setCellValue('C' . $rowIndex, $row['TS-2(2017)']);
    $tabel_3c2->setCellValue('D' . $rowIndex, $row['TS-1(2018)']);
    $tabel_3c2->setCellValue('E' . $rowIndex, $row['TS(2019)']);
    // Calculate Total untuk setiap row
    $tabel_3c2->setCellValue('F'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex. '+E' .$rowIndex);
    $tabel_3c2->getStyle('C' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3c2->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3c2->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3c2->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$ts2    = '=SUM(C5:C' . $rowIndex . ')';
$ts1    = '=SUM(D5:D' . $rowIndex . ')';
$ts      = '=SUM(E5:E' . $rowIndex . ')';
$jumlah  = '=SUM(F5:F' . $rowIndex . ')';


// Set total row
$tabel_3c2->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3c2->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3c2->setCellValue('C' . $rowIndex, $ts2);
$tabel_3c2->setCellValue('D' . $rowIndex, $ts1);
$tabel_3c2->setCellValue('E' . $rowIndex, $ts);
$tabel_3c2->setCellValue('F' . $rowIndex, $jumlah);
$tabel_3c2->getStyle('C' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c2->getStyle('C' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3c2->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c2->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3c2->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;



// ==================================================================================================================================================

// Tabel 3.d Rekognisi Dosen
$tabel_3d = $tabel->createSheet();
$tabel_3d->mergeCells('A1:E1');
$tabel_3d->setCellValue('A1', 'Tabel 3.d Rekognisi Dosen');
$tabel_3d->setTitle('3d');
$tabel_3d->getStyle('A3:F3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3d->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3d->getStyle('A3:F3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3d->getStyle('A3:F3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3d->getStyle('A3:F3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3d->getRowDimension(3)->setRowHeight(30);

// Set Autosize and widht height column and wrap text
$tabel_3d->getColumnDimension('A')->setAutoSize(true);
$tabel_3d->getColumnDimension('B')->setWidth(150, 'px');
$tabel_3d->getColumnDimension('C')->setWidth(200, 'px');
$tabel_3d->getColumnDimension('D')->setWidth(400, 'px');
$tabel_3d->getColumnDimension('E')->setWidth(100, 'px');
$tabel_3d->getColumnDimension('F')->setWidth(100, 'px');


$tabel_3d->setCellValue('A3', 'No.');
$tabel_3d->setCellValue('B3', 'Nama Dosen');
$tabel_3d->setCellValue('C3', 'Bidang Keahlian');
$tabel_3d->setCellValue('D3', 'Rekognisi');
$tabel_3d->setCellValue('E3', 'Tingkat');
$tabel_3d->setCellValue('F3', 'Tahun Perolehan');

// Heading No
$tabel_3d = $tabel->getActiveSheet();
$tabel_3d->getStyle('A4:F4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3d->getStyle('A4:F4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3d->getStyle('A4:F4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3d->getStyle('A4:F4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3d->getStyle('A4:F4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3d->getRowDimension(4)->setRowHeight(15);
$tabel_3d->setCellValue('A4', '1.');
$tabel_3d->setCellValue('B4', '2');
$tabel_3d->setCellValue('C4', '3');
$tabel_3d->setCellValue('D4', '4');
$tabel_3d->setCellValue('E4', '5');
$tabel_3d->setCellValue('F4', '6');

// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($rekognisi as $row) {
    $tabel_3d->setCellValue('A' . $rowIndex, $row['NO']);
    $tabel_3d->setCellValue('B' . $rowIndex, $row['NAMA']);
    $tabel_3d->setCellValue('C' . $rowIndex, $row['BIDANG_KEAHLIAN']);
    $tabel_3d->setCellValue('D' . $rowIndex, $row['REKOGNISI']);
    $tabel_3d->setCellValue('E' . $rowIndex, $row['TINGKAT']);
    $tabel_3d->setCellValue('F' . $rowIndex, $row['TAHUN']);

    // Mengatur wrap text
    $tabel_3d->getStyle('A2:F' . $rowIndex)->getAlignment()->setWrapText(true);
    $tabel_3d->getStyle('E2:F' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3d->getStyle('A2:F' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $tabel_3d->getStyle('D5:D' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
    $tabel_3d->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3d->getStyle('A2:A' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $tabel_3d->getStyle('B' . $rowIndex . ':F' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3d->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}


// ==================================================================================================================================================

// Tabel 5.b.1 Prestasi Akademik Mahasiswa
$tabel_5b1 = $tabel->createSheet();
$tabel_5b1->mergeCells('A1:E1');
$tabel_5b1->setCellValue('A1', 'Tabel 5.b.1 Prestasi Akademik Mahasiswa');
$tabel_5b1->setTitle('5b1');
$tabel_5b1->getStyle('A3:G3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_5b1->getStyle('A3:G3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_5b1->getStyle('A3:G3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_5b1->getStyle('A3:G3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_5b1->getStyle('A3:G3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row

// Set Autosize and widht height column
$tabel_5b1->getColumnDimension('A')->setAutoSize(true);
$tabel_5b1->getColumnDimension('B')->setWidth(200, 'px');
$tabel_5b1->getColumnDimension('C')->setWidth(120, 'px');
$tabel_5b1->getColumnDimension('D')->setWidth(120, 'px');
$tabel_5b1->getColumnDimension('E')->setWidth(120, 'px');
$tabel_5b1->getColumnDimension('F')->setWidth(120, 'px');
$tabel_5b1->getColumnDimension('G')->setWidth(200, 'px');
$tabel_5b1->getRowDimension(3)->setRowHeight(30);

$tabel_5b1->setCellValue('A3', 'No.');
$tabel_5b1->setCellValue('B3', 'Nama Kegiatan');
$tabel_5b1->setCellValue('C3', 'Waktu Penyelenggaraan');
$tabel_5b1->setCellValue('D3', 'Provinsi/Wilayah');
$tabel_5b1->setCellValue('E3', 'Nasional');
$tabel_5b1->setCellValue('F3', 'Internasional');
$tabel_5b1->setCellValue('G3', 'Prestasi Yang Dicapai');

// Heading No
$tabel_5b1 = $tabel->getActiveSheet();
$tabel_5b1->getStyle('A4:G4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_5b1->getStyle('A4:G4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_5b1->getStyle('A4:G4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_5b1->getStyle('A4:G4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_5b1->getStyle('A4:G4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_5b1->getRowDimension(4)->setRowHeight(15);
$tabel_5b1->setCellValue('A4', '1.');
$tabel_5b1->setCellValue('B4', '2');
$tabel_5b1->setCellValue('C4', '3');
$tabel_5b1->setCellValue('D4', '4');
$tabel_5b1->setCellValue('E4', '5');
$tabel_5b1->setCellValue('F4', '6');
$tabel_5b1->setCellValue('G4', '7');


// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($prestasi_akademik as $row) {
    $tabel_5b1->setCellValue('A' . $rowIndex, $row['Nomor']);
    $tabel_5b1->setCellValue('B' . $rowIndex, $row['Nama Kegiatan']);
    $tabel_5b1->setCellValue('C' . $rowIndex, $row['Waktu Penyelenggaraan']);
    $tabel_5b1->setCellValue('D' . $rowIndex, $row['Provinsi/Wilayah']);
    $tabel_5b1->setCellValue('E' . $rowIndex, $row['Nasional']);
    $tabel_5b1->setCellValue('F' . $rowIndex, $row['Internasional']);
    $tabel_5b1->setCellValue('G' . $rowIndex, $row['Prestasi Yang Dicapai']);
    
    // Mengatur wrap text
    $tabel_5b1->getStyle('A2:G' . $rowIndex)->getAlignment()->setWrapText(true);
    $tabel_5b1->getStyle('D2:F' .$rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_5b1->getStyle('A2:G' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $tabel_5b1->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    // $tabel_5b1->getStyle('A2:A' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $tabel_5b1->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_5b1->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}



// ==================================================================================================================================================

// Tabel 5.b.2 Prestasi Non Akademik Mahasiswa
$tabel_5b2 = $tabel->createSheet();
$tabel_5b2->mergeCells('A1:E1');
$tabel_5b2->setCellValue('A1', 'Tabel 5.b.2 Prestasi Non Akademik Mahasiswa');
$tabel_5b2->setTitle('5b2');
$tabel_5b2->getStyle('A3:G3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_5b2->getStyle('A3:G3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_5b2->getStyle('A3:G3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_5b2->getStyle('A3:G3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_5b2->getStyle('A3:G3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row

// Set Autosize and widht height column
$tabel_5b2->getColumnDimension('A')->setAutoSize(true);
$tabel_5b2->getColumnDimension('B')->setWidth(200, 'px');
$tabel_5b2->getColumnDimension('C')->setWidth(120, 'px');
$tabel_5b2->getColumnDimension('D')->setWidth(120, 'px');
$tabel_5b2->getColumnDimension('E')->setWidth(120, 'px');
$tabel_5b2->getColumnDimension('F')->setWidth(120, 'px');
$tabel_5b2->getColumnDimension('G')->setWidth(200, 'px');
$tabel_5b2->getRowDimension(3)->setRowHeight(30);

$tabel_5b2->setCellValue('A3', 'No.');
$tabel_5b2->setCellValue('B3', 'Nama Kegiatan');
$tabel_5b2->setCellValue('C3', 'Waktu Penyelenggaraan');
$tabel_5b2->setCellValue('D3', 'Provinsi/Wilayah');
$tabel_5b2->setCellValue('E3', 'Nasional');
$tabel_5b2->setCellValue('F3', 'Internasional');
$tabel_5b2->setCellValue('G3', 'Prestasi Yang Dicapai');

// Heading No
$tabel_5b2 = $tabel->getActiveSheet();
$tabel_5b2->getStyle('A4:G4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_5b2->getStyle('A4:G4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_5b2->getStyle('A4:G4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_5b2->getStyle('A4:G4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_5b2->getStyle('A4:G4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_5b2->getRowDimension(4)->setRowHeight(15);
$tabel_5b2->setCellValue('A4', '1.');
$tabel_5b2->setCellValue('B4', '2');
$tabel_5b2->setCellValue('C4', '3');
$tabel_5b2->setCellValue('D4', '4');
$tabel_5b2->setCellValue('E4', '5');
$tabel_5b2->setCellValue('F4', '6');
$tabel_5b2->setCellValue('G4', '7');


// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($prestasi_nonakademik as $row) {
    $tabel_5b2->setCellValue('A' . $rowIndex, $row['Nomor']);
    $tabel_5b2->setCellValue('B' . $rowIndex, $row['Nama Kegiatan']);
    $tabel_5b2->setCellValue('C' . $rowIndex, $row['Waktu Penyelenggaraan']);
    $tabel_5b2->setCellValue('D' . $rowIndex, $row['Provinsi/Wilayah']);
    $tabel_5b2->setCellValue('E' . $rowIndex, $row['Nasional']);
    $tabel_5b2->setCellValue('F' . $rowIndex, $row['Internasional']);
    $tabel_5b2->setCellValue('G' . $rowIndex, $row['Prestasi Yang Dicapai']);
    
    // Mengatur wrap text
    $tabel_5b2->getStyle('A2:G' . $rowIndex)->getAlignment()->setWrapText(true);
    $tabel_5b2->getStyle('D2:F' .$rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_5b2->getStyle('A2:G' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $tabel_5b2->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    // $tabel_5b2->getStyle('A2:A' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $tabel_5b2->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_5b2->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}




$writer = new Xlsx($tabel);
$tabel->setActiveSheetIndex(0); 

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Daftar Tabel LKPT.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

exit();