<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_prestasi_akademik = file_get_contents('https://project.mis.pens.ac.id/mis143/API/5.b.1_prestasi_akademik_mahasiswa.php');

// Decode JSON response $response_asing & $response_aktif ke associative array
$prestasi_akademik= json_decode($response_prestasi_akademik, true);

require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$tabel = new Spreadsheet();
$tabel_5b1 = $tabel->getActiveSheet();
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

$tabel_5b1->mergeCells('A1:C1');  // Merge cells A1 and B1
$tabel_5b1->setCellValue('A1', 'Tabel 5.b.1) Prestasi Akademik Mahasiswa');
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
$writer = new Xlsx($tabel);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 5b1 Prestasi Akademik Mahasiswa.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>