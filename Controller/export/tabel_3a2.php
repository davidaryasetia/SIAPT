<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_jabatan_akademik = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.2_jabatan_akademik_dosen_tetap.php');


// Decode JSON response $response_asing & $response_aktif ke associative array
$jabatan_akademik= json_decode($response_jabatan_akademik, true);


require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Nama Tabel


// Heading Tabel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setTitle('3a2');
$activeWorksheet->getStyle('A3:H3')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A3:H3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A3:H3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A3:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$activeWorksheet->getStyle('A3:H3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(3)->setRowHeight(30);


$activeWorksheet->mergeCells('A1:C1'); // Merge cells A1 and B1
// $activeWorksheet->getColumnDimension('A')->setWidth(15); // Set the width of column A to 15 characters
$activeWorksheet->setCellValue('A1', 'Tabel 3.a.2) Jabatan Akademik Dosen Tetap');
$activeWorksheet->setCellValue('A3', 'No.');
$activeWorksheet->setCellValue('B3', 'Pendidikan ');
$activeWorksheet->setCellValue('C3', 'Guru Besar');
$activeWorksheet->setCellValue('D3', 'Lektor Kepala');
$activeWorksheet->setCellValue('E3', 'Lektor');
$activeWorksheet->setCellValue('F3', 'Asisten Ahli');
$activeWorksheet->setCellValue('G3', 'Tenaga Pengajar');
$activeWorksheet->setCellValue('H3', 'Jumlah');
// End Heading Tabel


// Heading No
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->getStyle('A4:H4')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A4:H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A4:H4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A4:H4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$activeWorksheet->getStyle('A4:H4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(4)->setRowHeight(15);

$activeWorksheet->setCellValue('A4', '1.');
$activeWorksheet->setCellValue('B4', '2');
$activeWorksheet->setCellValue('C4', '3');
$activeWorksheet->setCellValue('D4', '4');
$activeWorksheet->setCellValue('E4', '5');
$activeWorksheet->setCellValue('F4', '6');
$activeWorksheet->setCellValue('G4', '7');
$activeWorksheet->setCellValue('H4', '8');
// End Heading Tabel

$rowIndex = 5; // Start row index for data
foreach ($jabatan_akademik as $row) {
    $activeWorksheet->setCellValue('A' . $rowIndex, $row['Nomor']);
    $activeWorksheet->setCellValue('B' . $rowIndex, $row['Pendidikan']);
    $activeWorksheet->setCellValue('C' . $rowIndex, $row['Guru Besar']);
    $activeWorksheet->setCellValue('D' . $rowIndex, $row['Lektor Kepala']);
    $activeWorksheet->setCellValue('E' . $rowIndex, $row['Lektor']);
    $activeWorksheet->setCellValue('F' . $rowIndex, $row['Asisten Ahli']);
    $activeWorksheet->setCellValue('G' . $rowIndex, $row['Tenaga Pengajar']);

    $activeWorksheet->getStyle('C2:E' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('A2:A' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $activeWorksheet->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $activeWorksheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$guru_besar =    '=SUM(C5:C' . ($rowIndex - 1) . ')';
$lektor_kepala = '=SUM(D5:D' . ($rowIndex - 1) . ')';
$lektor =        '=SUM(E5:E' . ($rowIndex - 1) . ')';
$asisten_ahli =  '=SUM(F5:F' . ($rowIndex - 1) . ')';
$tenaga_pengajar=  '=SUM(G5:G' . ($rowIndex - 1) . ')';


// Set total row
$activeWorksheet->setCellValue('A' . $rowIndex, 'Total');
$activeWorksheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$activeWorksheet->setCellValue('C' . $rowIndex, $guru_besar);
$activeWorksheet->setCellValue('D' . $rowIndex, $lektor_kepala);
$activeWorksheet->setCellValue('E' . $rowIndex, $lektor);
$activeWorksheet->setCellValue('F' . $rowIndex, $asisten_ahli);
$activeWorksheet->setCellValue('G' . $rowIndex, $tenaga_pengajar);


$activeWorksheet->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping

$activeWorksheet->getStyle('C2:F' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A2:A' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$activeWorksheet->getStyle('B' . $rowIndex . ':H' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$activeWorksheet->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;



// Auto-size columns
foreach (range('A', 'H') as $column) {
    $activeWorksheet->getColumnDimension($column)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3a2 Jabatan Akademik Dosen Tetap.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit();


?>