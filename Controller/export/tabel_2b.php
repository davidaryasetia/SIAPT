<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_asing = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_asing');

// Decode JSON response $response_asing & $response_aktif ke associative array
$mahasiswa_asing = json_decode($response_asing, true);

require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// Heading Tabel
$tabel = new Spreadsheet();
$tabel_2b = $tabel->getActiveSheet();
$tabel_2b->setTitle('2b');
$tabel_2b->getStyle('A3:E3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_2b->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2b->getStyle('A3:E3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_2b->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_2b->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_2b->getRowDimension(3)->setRowHeight(30);
$tabel_2b->mergeCells('A1:C1'); // Merge cells A1 and B1
$tabel_2b->setCellValue('A1', 'Tabel 2.b Mahasiswa Asing');
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
$tabel_2b = $tabel->getActiveSheet();
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
$tabel_2b->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true); // Merge cells A and B
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
$writer = new Xlsx($tabel);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 2b Mahasiswa Asing.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>