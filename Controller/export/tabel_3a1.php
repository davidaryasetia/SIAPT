<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');

// Decode JSON response $response_asing & $response_aktif ke associative array
$dosen_tetap = json_decode($response_dosen_tetap, true);

require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setTitle('3a1');
$activeWorksheet->getStyle('A3:F3')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A3:F3')->getAlignment()->setWrapText(true);
$activeWorksheet->getColumnDimension('B')->setWidth(15); // Mengatur lebar kolom B
$activeWorksheet->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A3:F3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A3:F3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$activeWorksheet->getStyle('A3:F3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(3)->setRowHeight(30);
$activeWorksheet->mergeCells('A1:C1'); // Merge cells A1 and B1
// $activeWorksheet->getColumnDimension('A')->setWidth(15); // Set the width of column A to 15 characters
$activeWorksheet->setCellValue('A1', 'Tabel 3.a.1) Kecukupan Dosen Perguruan Tinggi');
$activeWorksheet->setCellValue('A3', 'No.');
$activeWorksheet->setCellValue('B3', 'Unit Pengelola(Departemen/Jurusan)');
$activeWorksheet->setCellValue('C3', 'Doktor/Doktor Terapan');
$activeWorksheet->setCellValue('D3', 'Magister/Magister Terapan');
$activeWorksheet->setCellValue('E3', 'Profesi');
$activeWorksheet->setCellValue('F3', 'Jumlah');
// End Heading Tabel

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
foreach ($dosen_tetap as $row) {
    $activeWorksheet->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $activeWorksheet->setCellValue('B' . $rowIndex, $row['DEPARTEMEN']);
    $activeWorksheet->setCellValue('C' . $rowIndex, $row['Doktor/Doktor Terapan']);
    $activeWorksheet->setCellValue('D' . $rowIndex, $row['Magister/Magister Terapan']);
    $activeWorksheet->setCellValue('E' . $rowIndex, $row['PROFESI']);
    $activeWorksheet->setCellValue('F' . $rowIndex, $row['Jumlah']);
    $activeWorksheet->getStyle('C2:E' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('A2:A' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('B' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $activeWorksheet->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$doktor =   '=SUM(C5:C' . ($rowIndex - 1) . ')';
$magister = '=SUM(D5:D' . ($rowIndex - 1) . ')';
$profesi =  '=SUM(E5:E' . ($rowIndex - 1) . ')';
$jumlah =  '=SUM(F5:F' . ($rowIndex - 1) . ')';

// Set total row
$activeWorksheet->setCellValue('A' . $rowIndex, 'Total');
$activeWorksheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$activeWorksheet->setCellValue('C' . $rowIndex, $doktor);
$activeWorksheet->setCellValue('D' . $rowIndex, $magister);
$activeWorksheet->setCellValue('E' . $rowIndex, $profesi);
$activeWorksheet->setCellValue('F' . $rowIndex, $jumlah);
$activeWorksheet->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$activeWorksheet->getStyle('C2:F' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A2:A' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('B' . $rowIndex . ':F' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$activeWorksheet->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;

// Auto-size columns
foreach (range('A', 'F') as $column) {
    $activeWorksheet->getColumnDimension($column)->setAutoSize(true);
}
$writer = new Xlsx($spreadsheet);
// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3a1 Kecukupan Dosen.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();


?>