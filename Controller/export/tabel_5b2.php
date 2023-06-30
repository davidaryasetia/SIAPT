<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_prestasi_nonakademik = file_get_contents('https://project.mis.pens.ac.id/mis143/API/5.b.2_prestasi_non_akademik_mahasiswa.php');

// Decode JSON response $response_asing & $response_aktif ke associative array
$prestasi_nonakademik= json_decode($response_prestasi_nonakademik, true);

require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setTitle('5b2');
$activeWorksheet->getStyle('A3:G3')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A3:G3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A3:G3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A3:G3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$activeWorksheet->getStyle('A3:G3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row


// Set Autosize and widht height column
$activeWorksheet->getColumnDimension('A')->setAutoSize(true);
$activeWorksheet->getColumnDimension('C')->setAutoSize(true);
$activeWorksheet->getColumnDimension('B')->setWidth(300, 'px');
$activeWorksheet->getColumnDimension('D')->setWidth(73, 'px');
$activeWorksheet->getColumnDimension('E')->setWidth(73, 'px');
$activeWorksheet->getColumnDimension('F')->setWidth(87, 'px');
$activeWorksheet->getColumnDimension('G')->setWidth(220, 'px');
$activeWorksheet->getRowDimension(3)->setRowHeight(30);

$activeWorksheet->mergeCells('A1:C1');  // Merge cells A1 and B1
$activeWorksheet->setCellValue('A1', 'Tabel 5.b.2) Prestasi Non-Akademik Mahasiswa');
$activeWorksheet->setCellValue('A3', 'No.');
$activeWorksheet->setCellValue('B3', 'Nama Kegiatan');
$activeWorksheet->setCellValue('C3', 'Waktu Penyelenggaraan');
$activeWorksheet->setCellValue('D3', 'Provinsi/Wilayah');
$activeWorksheet->setCellValue('E3', 'Nasional');
$activeWorksheet->setCellValue('F3', 'Internasional');
$activeWorksheet->setCellValue('G3', 'Prestasi Yang Dicapai');

// Heading No
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->getStyle('A4:G4')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A4:G4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A4:G4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A4:G4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$activeWorksheet->getStyle('A4:G4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(4)->setRowHeight(15);
$activeWorksheet->setCellValue('A4', '1.');
$activeWorksheet->setCellValue('B4', '2');
$activeWorksheet->setCellValue('C4', '3');
$activeWorksheet->setCellValue('D4', '4');
$activeWorksheet->setCellValue('E4', '5');
$activeWorksheet->setCellValue('F4', '6');
$activeWorksheet->setCellValue('G4', '7');


// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($prestasi_nonakademik as $row) {
    $activeWorksheet->setCellValue('A' . $rowIndex, $row['Nomor']);
    $activeWorksheet->setCellValue('B' . $rowIndex, $row['Nama Kegiatan']);
    $activeWorksheet->setCellValue('C' . $rowIndex, $row['Waktu Penyelenggaraan']);
    $activeWorksheet->setCellValue('D' . $rowIndex, $row['Provinsi/Wilayah']);
    $activeWorksheet->setCellValue('E' . $rowIndex, $row['Nasional']);
    $activeWorksheet->setCellValue('F' . $rowIndex, $row['Internasional']);
    $activeWorksheet->setCellValue('G' . $rowIndex, $row['Prestasi Yang Dicapai']);
    
    // Mengatur wrap text
    $activeWorksheet->getStyle('A2:G' . $rowIndex)->getAlignment()->setWrapText(true);
    $activeWorksheet->getStyle('D2:F' .$rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('A2:G' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $activeWorksheet->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    // $activeWorksheet->getStyle('A2:A' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $activeWorksheet->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $activeWorksheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}
$writer = new Xlsx($spreadsheet);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 5b2 Prestasi Non Akademik Mahasiswa.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>