<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_asing = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_asing');

// Decode JSON response $response_asing & $response_aktif ke associative array
$mahasiswa_asing = json_decode($response_asing, true);


require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Nama Tabel


// Heading Tabel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setTitle('2b');
$activeWorksheet->getStyle('A3:E3')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A3:E3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$activeWorksheet->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(3)->setRowHeight(30);


$activeWorksheet->mergeCells('A1:C1'); // Merge cells A1 and B1
// $activeWorksheet->getColumnDimension('A')->setWidth(15); // Set the width of column A to 15 characters
$activeWorksheet->setCellValue('A1', 'Tabel 2.b Mahasiswa Asing');
$activeWorksheet->setCellValue('A3', 'No.');
$activeWorksheet->setCellValue('B3', 'Program Studi.');
$activeWorksheet->setCellValue('C3', 'TS-2(2017)');
$activeWorksheet->setCellValue('D3', 'TS-1(2018)');
$activeWorksheet->setCellValue('E3', 'TS(2019)');
// End Heading Tabel


// Heading No
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->getStyle('A4:E4')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A4:E4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A4:E4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A4:E4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$activeWorksheet->getStyle('A4:E4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(4)->setRowHeight(15);

$activeWorksheet->setCellValue('A4', '1.');
$activeWorksheet->setCellValue('B4', '2');
$activeWorksheet->setCellValue('C4', '3');
$activeWorksheet->setCellValue('D4', '4');
$activeWorksheet->setCellValue('E4', '5');
// End Heading Tabel

$rowIndex = 5; // Start row index for data
foreach ($mahasiswa_asing as $row) {
    $activeWorksheet->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $activeWorksheet->setCellValue('B' . $rowIndex, $row['Program Studi']);
    $activeWorksheet->setCellValue('C' . $rowIndex, $row['TS-2(2017)']);
    $activeWorksheet->setCellValue('D' . $rowIndex, $row['TS-1(2018)']);
    $activeWorksheet->setCellValue('E' . $rowIndex, $row['TS(2019)']);

    $activeWorksheet->getStyle('C2:E' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('A2:A' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $activeWorksheet->getStyle('B' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$ts2Sum = '=SUM(C5:C' . ($rowIndex - 1) . ')';
$ts1Sum = '=SUM(D5:D' . ($rowIndex - 1) . ')';
$tsSum = '=SUM(E5:E' . ($rowIndex - 1) . ')';

// Set total row
$activeWorksheet->setCellValue('A' . $rowIndex, 'Total');
$activeWorksheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$activeWorksheet->setCellValue('C' . $rowIndex, $ts2Sum);
$activeWorksheet->setCellValue('D' . $rowIndex, $ts1Sum);
$activeWorksheet->setCellValue('E' . $rowIndex, $tsSum);

$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$activeWorksheet->getStyle('C2:E' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A2:A' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$activeWorksheet->getStyle('B' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 

$rowIndex++;



// Auto-size columns
foreach (range('A', 'E') as $column) {
    $activeWorksheet->getColumnDimension($column)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 2b Mahasiswa Asing.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit();


?>