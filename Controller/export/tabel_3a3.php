<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_sertifikasi_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.3_sertifikasi_dosen.php');
// Decode J SON response $response_asing & $response_aktif ke associative array
$sertifikasi_dosen = json_decode($response_sertifikasi_dosen, true);
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setTitle('3a3');
$activeWorksheet->getStyle('A3:E3')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A3:E3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$activeWorksheet->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getDefaultColumnDimension('D')->setWidth(5, 'cm');
$activeWorksheet->getRowDimension(3)->setRowHeight(15);
$activeWorksheet->mergeCells('A1:C1'); // Merge cells A1 and B1'
$activeWorksheet->setCellValue('A1', 'Tabel 3.a.3 Sertifikasi Dosen');
$activeWorksheet->setCellValue('A3', 'No.');
$activeWorksheet->setCellValue('B3', 'Departemen/Jurusan');
$activeWorksheet->setCellValue('C3', 'Jumlah Dosen');
$activeWorksheet->setCellValue('D3', 'Jumlah Dosen Bersertifikat');
$activeWorksheet->setCellValue('E3', 'Jumlah');
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
foreach ($sertifikasi_dosen as $row)  {
    $activeWorksheet->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $activeWorksheet->setCellValue('B' . $rowIndex, $row['Departemen/Jurusan']);
    $activeWorksheet->setCellValue('C' . $rowIndex, $row['Jumlah Dosen']);
    $activeWorksheet->setCellValue('D' . $rowIndex, $row['Jumlah Dosen Bersertifikat']);
    // Calculate Total untuk setiap row
    $activeWorksheet->setCellValue('E'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex );
    $activeWorksheet->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('B' . $rowIndex . ':D' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$dosen =    '=SUM(C5:C' . $rowIndex . ')';
$dosen_bersertifikat = '=SUM(D5:D' . $rowIndex . ')';
$jumlah =        '=SUM(E5:E' . $rowIndex . ')';


// Set total row
$activeWorksheet->setCellValue('A' . $rowIndex, 'Total');
$activeWorksheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$activeWorksheet->setCellValue('C' . $rowIndex, $dosen);
$activeWorksheet->setCellValue('D' . $rowIndex, $dosen_bersertifikat);
$activeWorksheet->setCellValue('E' . $rowIndex, $jumlah);
$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$activeWorksheet->getStyle('C2:F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$activeWorksheet->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;

// Auto-size columns
foreach (range('A', 'E') as $column) {
    $activeWorksheet->getColumnDimension($column)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3a3 Sertifikasi Dosen.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>