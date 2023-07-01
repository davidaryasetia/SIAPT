<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_sks = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.c_kredit_mata_kuliah.php');

// Decode JSON response $response_asing & $response_aktif ke associative array
$sks = json_decode($response_sks, true);
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$tabel = new Spreadsheet();
$tabel_2c = $tabel->getActiveSheet();
$tabel_2c->setTitle('2c');
$tabel_2c->getStyle('A3:G3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_2c->getStyle('A3:G3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2c->getStyle('A3:G3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_2c->getStyle('A3:G3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_2c->getStyle('A3:G3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_2c->getRowDimension(3)->setRowHeight(30);
$tabel_2c->mergeCells('A1:C1'); // Merge cells A1 and B1
$tabel_2c->setCellValue('A1', 'Tabel 2.c Kredit Matakuliah');
$tabel_2c->setCellValue('A3', 'No.');
$tabel_2c->setCellValue('B3', 'Program Studi.');
$tabel_2c->setCellValue('C3', 'Teori');
$tabel_2c->setCellValue('D3', 'Praktikum');
$tabel_2c->setCellValue('E3', 'Praktik');
$tabel_2c->setCellValue('F3', 'PKL');
$tabel_2c->setCellValue('G3', 'Total');
// End Heading Tabel

// Set Autosize and widht height column
$tabel_2c->getColumnDimension('A')->setAutoSize(true);
$tabel_2c->getColumnDimension('B')->setAutoSize(true);
$tabel_2c->getColumnDimension('C')->setWidth(80, 'px');
$tabel_2c->getColumnDimension('D')->setWidth(80, 'px');
$tabel_2c->getColumnDimension('E')->setWidth(80, 'px');
$tabel_2c->getColumnDimension('F')->setWidth(80, 'px');
$tabel_2c->getColumnDimension('G')->setWidth(80, 'px');


// Heading No
$tabel_2c = $tabel->getActiveSheet();
$tabel_2c->getStyle('A4:G4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_2c->getStyle('A4:G4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2c->getStyle('A4:G4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_2c->getStyle('A4:G4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_2c->getStyle('A4:G4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_2c->getRowDimension(4)->setRowHeight(15);
$tabel_2c->setCellValue('A4', '1.');
$tabel_2c->setCellValue('B4', '2');
$tabel_2c->setCellValue('C4', '3');
$tabel_2c->setCellValue('D4', '4');
$tabel_2c->setCellValue('E4', '5');
$tabel_2c->setCellValue('F4', '6');
$tabel_2c->setCellValue('G4', '7');
// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($sks as $row) {
    $tabel_2c->setCellValue('A' . $rowIndex, $row['No.']);
    $tabel_2c->setCellValue('B' . $rowIndex, $row['Program Studi']);
    $tabel_2c->setCellValue('C' . $rowIndex, $row['Teori']);
    $tabel_2c->setCellValue('D' . $rowIndex, $row['Praktikum']);
    $tabel_2c->setCellValue('E' . $rowIndex, $row['Praktik']);
    $tabel_2c->setCellValue('F' . $rowIndex, $row['PKL']);
    // Calculate total untuk setiap row
    $tabel_2c->setCellValue('G' . $rowIndex, '=C' . $rowIndex . '+D' . $rowIndex . '+E' . $rowIndex . '+F' . $rowIndex);
    $tabel_2c->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_2c->getStyle('C' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_2c->getStyle('B' . $rowIndex . ':F' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$teori =     '=SUM(C5:C' . $rowIndex . ')';
$praktikum = '=SUM(D5:D' . $rowIndex . ')';
$praktik =   '=SUM(E5:E' . $rowIndex . ')';
$pkl =       '=SUM(F5:F' . $rowIndex . ')';
$total =     '=SUM(G5:G' . $rowIndex . ')';

// Set total row
$tabel_2c->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_2c->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_2c->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true); 
$tabel_2c->setCellValue('C' . $rowIndex, $teori);
$tabel_2c->setCellValue('D' . $rowIndex, $praktikum);
$tabel_2c->setCellValue('E' . $rowIndex, $praktik);
$tabel_2c->setCellValue('F' . $rowIndex, $pkl);
$tabel_2c->setCellValue('G' . $rowIndex, $total);
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_2c->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$tabel_2c->getStyle('A' . $rowIndex . ':G' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;

$writer = new Xlsx($tabel);
// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 2c Kredit Matakuliah.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();


?>