<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_rasio_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.b_rasio_dosen_terhadap_mahasiswa.php');
// Decode J SON response $response_asing & $response_aktif ke associative array
$rasio_dosen = json_decode($response_rasio_dosen, true);
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setTitle('3b');
$activeWorksheet->getStyle('A3:E3')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A3:E3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$activeWorksheet->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(3)->setRowHeight(15);
$activeWorksheet->mergeCells('A1:C1'); // Merge cells A1 and B1'
$activeWorksheet->setCellValue('A1', 'Tabel 3.b) Rasio Dosen Terhadap Mahasiswa');
$activeWorksheet->setCellValue('A3', 'No.');
$activeWorksheet->setCellValue('B3', 'Departemen');
$activeWorksheet->setCellValue('C3', 'Jumlah Dosen');
$activeWorksheet->setCellValue('D3', 'Mahasiswa (TS)');
$activeWorksheet->setCellValue('E3', 'Jumlah Mahasiswa TA');
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
foreach ($rasio_dosen as $row)  {
    $activeWorksheet->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $activeWorksheet->setCellValue('B' . $rowIndex, $row['DEPARTEMEN']);
    $activeWorksheet->setCellValue('C' . $rowIndex, $row['Jumlah Dosen']);
    $activeWorksheet->setCellValue('D' . $rowIndex, $row['Mahasiswa Angkatan 2020']);
    $activeWorksheet->setCellValue('E' . $rowIndex, $row['Jumlah Mahasiswa TA']);
    // Calculate Total untuk setiap row
    $activeWorksheet->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('B' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$jumlah_dosen    = '=SUM(C5:C' . $rowIndex . ')';
$mahasiswa    = '=SUM(D5:D' . $rowIndex . ')';
$mahasiswa_ta      = '=SUM(E5:E' . $rowIndex . ')';


// Set total row
$activeWorksheet->setCellValue('A' . $rowIndex, 'Total');
$activeWorksheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$activeWorksheet->setCellValue('C' . $rowIndex, $jumlah_dosen);
$activeWorksheet->setCellValue('D' . $rowIndex, $mahasiswa);
$activeWorksheet->setCellValue('E' . $rowIndex, $mahasiswa_ta);
$activeWorksheet->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;

// Auto-size columns
foreach (range('A', 'E') as $column) {
    $activeWorksheet->getColumnDimension($column)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3.b Rasio Dosen Terhadap Mahasiswa.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>