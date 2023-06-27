<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_sks = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.c_kredit_mata_kuliah.php');

// Decode JSON response $response_asing & $response_aktif ke associative array
$sks = json_decode($response_sks, true);
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setTitle('2c');
$activeWorksheet->getStyle('A3:G3')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A3:G3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A3:G3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A3:G3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$activeWorksheet->getStyle('A3:G3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(3)->setRowHeight(30);
$activeWorksheet->mergeCells('A1:C1'); // Merge cells A1 and B1
// $activeWorksheet->getColumnDimension('A')->setWidth(15); // Set the width of column A to 15 characters
$activeWorksheet->setCellValue('A1', 'Tabel 2.c Kredit Matakuliah');
$activeWorksheet->setCellValue('A3', 'No.');
$activeWorksheet->setCellValue('B3', 'Program Studi.');
$activeWorksheet->setCellValue('C3', 'Teori');
$activeWorksheet->setCellValue('D3', 'Praktikum');
$activeWorksheet->setCellValue('E3', 'Praktik');
$activeWorksheet->setCellValue('F3', 'PKL');
$activeWorksheet->setCellValue('G3', 'Total');
// End Heading Tabel

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
foreach ($sks as $row) {
    $activeWorksheet->setCellValue('A' . $rowIndex, $row['No.']);
    $activeWorksheet->setCellValue('B' . $rowIndex, $row['Program Studi']);
    $activeWorksheet->setCellValue('C' . $rowIndex, $row['Teori']);
    $activeWorksheet->setCellValue('D' . $rowIndex, $row['Praktikum']);
    $activeWorksheet->setCellValue('E' . $rowIndex, $row['Praktik']);
    $activeWorksheet->setCellValue('F' . $rowIndex, $row['PKL']);
    // Calculate total untuk setiap row
    $activeWorksheet->setCellValue('G' . $rowIndex, '=C' . $rowIndex . '+D' . $rowIndex . '+E' . $rowIndex . '+F' . $rowIndex);
    $activeWorksheet->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('C' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('B' . $rowIndex . ':F' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $activeWorksheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$teori =     '=SUM(C5:C' . $rowIndex . ')';
$praktikum = '=SUM(D5:D' . $rowIndex . ')';
$praktik =   '=SUM(E5:E' . $rowIndex . ')';
$pkl =       '=SUM(F5:F' . $rowIndex . ')';
$total =     '=SUM(G5:G' . $rowIndex . ')';

// Set total row
$activeWorksheet->setCellValue('A' . $rowIndex, 'Total');
$activeWorksheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$activeWorksheet->setCellValue('C' . $rowIndex, $teori);
$activeWorksheet->setCellValue('D' . $rowIndex, $praktikum);
$activeWorksheet->setCellValue('E' . $rowIndex, $praktik);
$activeWorksheet->setCellValue('F' . $rowIndex, $pkl);
$activeWorksheet->setCellValue('G' . $rowIndex, $total);
$activeWorksheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$activeWorksheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$activeWorksheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$activeWorksheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;

// Auto-size columns
foreach (range('A', 'G') as $column) {
    $activeWorksheet->getColumnDimension($column)->setAutoSize(true);
}
$writer = new Xlsx($spreadsheet);
// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 2c Kredit Matakuliah.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();


?>