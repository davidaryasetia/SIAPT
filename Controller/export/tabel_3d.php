<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_rekognisi = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php');

// Decode JSON response $response_asing & $response_aktif ke associative array
$rekognisi= json_decode($response_rekognisi, true);

require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setTitle('3d');
$activeWorksheet->getStyle('A3:F3')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A3:F3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A3:F3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$activeWorksheet->getStyle('A3:F3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(3)->setRowHeight(30);

$activeWorksheet->mergeCells('A1:C1'); // Merge cells A1 and B1
// $activeWorksheet->getColumnDimension('A')->setWidth(15); // Set the width of column A to 15 characters
$activeWorksheet->setCellValue('A1', 'Tabel 3d) Rekognisi Dosen');
$activeWorksheet->setCellValue('A3', 'No.');
$activeWorksheet->setCellValue('B3', 'Nama Dosen');
$activeWorksheet->setCellValue('C3', 'Bidang Keahlian');
$activeWorksheet->setCellValue('D3', 'Rekognisi');
$activeWorksheet->setCellValue('E3', 'Tingkat');
$activeWorksheet->setCellValue('F3', 'Tahun Perolehan');

// Heading No
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->getStyle('A4:F4')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A4:F4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A4:F4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A4:F4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$activeWorksheet->getStyle('A4:F4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(4)->setRowHeight(15);
$activeWorksheet->setCellValue('A4', '1.');
$activeWorksheet->setCellValue('B4', '2');
$activeWorksheet->setCellValue('C4', '3');
$activeWorksheet->setCellValue('D4', '4');
$activeWorksheet->setCellValue('E4', '5');
$activeWorksheet->setCellValue('F4', '6');

// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($rekognisi as $row) {
    $activeWorksheet->setCellValue('A' . $rowIndex, $row['NO']);
    $activeWorksheet->setCellValue('B' . $rowIndex, $row['NAMA']);
    $activeWorksheet->setCellValue('C' . $rowIndex, $row['BIDANG_KEAHLIAN']);
    $activeWorksheet->setCellValue('D' . $rowIndex, $row['REKOGNISI']);
    $activeWorksheet->setCellValue('E' . $rowIndex, $row['TINGKAT']);
    $activeWorksheet->setCellValue('F' . $rowIndex, $row['TAHUN']);

    // Mengatur wrap text
    $activeWorksheet->getStyle('A2:F' . $rowIndex)->getAlignment()->setWrapText(true);
    $activeWorksheet->getStyle('B2:C' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('E2:F' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('B2:C' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $activeWorksheet->getStyle('E2:F' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $activeWorksheet->getStyle('D5:D' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
    $activeWorksheet->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('A2:A' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $activeWorksheet->getStyle('B' . $rowIndex . ':F' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $activeWorksheet->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}
// Mengatur lebar kolom
$activeWorksheet->getColumnDimension('A')->setWidth(5); // Mengatur lebar kolom A
$activeWorksheet->getColumnDimension('B')->setWidth(20); // Mengatur lebar kolom B
$activeWorksheet->getColumnDimension('C')->setWidth(20); // Mengatur lebar kolom C
$activeWorksheet->getColumnDimension('D')->setWidth(20); // Mengatur lebar kolom D
$activeWorksheet->getColumnDimension('E')->setWidth(10); // Mengatur lebar kolom E
$activeWorksheet->getColumnDimension('F')->setWidth(10); // Mengatur lebar kolom F
// Auto-size columns
foreach (range('A', 'F') as $column) {
    $activeWorksheet->getColumnDimension($column)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3d Rekognisi Dosen.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>