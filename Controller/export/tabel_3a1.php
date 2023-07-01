<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_dosen_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.1_kecukupan_dosen_perguruan_tinggi.php?query=dosen_tetap');

// Decode JSON response $response_asing & $response_aktif ke associative array
$dosen_tetap = json_decode($response_dosen_tetap, true);

require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$tabel = new Spreadsheet();
$tabel_3a1 = $tabel->getActiveSheet();
$tabel_3a1->setTitle('3a1');
$tabel_3a1->getStyle('A3:F3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a1->getStyle('A3:F3')->getAlignment()->setWrapText(true);
$tabel_3a1->getColumnDimension('B')->setWidth(15); // Mengatur lebar kolom B
$tabel_3a1->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a1->getStyle('A3:F3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a1->getStyle('A3:F3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3a1->getStyle('A3:F3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a1->getRowDimension(3)->setRowHeight(30);
$tabel_3a1->mergeCells('A1:C1'); // Merge cells A1 and B1
$tabel_3a1->setCellValue('A1', 'Tabel 3.a.1) Kecukupan Dosen Perguruan Tinggi');
$tabel_3a1->setCellValue('A3', 'No.');
$tabel_3a1->setCellValue('B3', 'Unit Pengelola(Departemen/Jurusan)');
$tabel_3a1->setCellValue('C3', 'Doktor/Doktor Terapan');
$tabel_3a1->setCellValue('D3', 'Magister/Magister Terapan');
$tabel_3a1->setCellValue('E3', 'Profesi');
$tabel_3a1->setCellValue('F3', 'Jumlah');
// End Heading Tabel

// Set Autosize and widht height column
$tabel_3a1->getColumnDimension('A')->setAutoSize(true);
$tabel_3a1->getColumnDimension('B')->setWidth(250, 'px');
$tabel_3a1->getColumnDimension('C')->setWidth(130, 'px');
$tabel_3a1->getColumnDimension('D')->setWidth(130, 'px');
$tabel_3a1->getColumnDimension('E')->setWidth(130, 'px');
$tabel_3a1->getColumnDimension('F')->setWidth(130, 'px');


// Heading No
$tabel_3a1 = $tabel->getActiveSheet();
$tabel_3a1->getStyle('A4:F4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a1->getStyle('A4:F4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a1->getStyle('A4:F4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a1->getStyle('A4:F4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3a1->getStyle('A4:F4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a1->getRowDimension(4)->setRowHeight(15);
$tabel_3a1->setCellValue('A4', '1.');
$tabel_3a1->setCellValue('B4', '2');
$tabel_3a1->setCellValue('C4', '3');
$tabel_3a1->setCellValue('D4', '4');
$tabel_3a1->setCellValue('E4', '5');
$tabel_3a1->setCellValue('F4', '6');
// End Heading Tabel

$rowIndex = 5; // Start row index for data
foreach ($dosen_tetap as $row) {
    $tabel_3a1->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $tabel_3a1->setCellValue('B' . $rowIndex, $row['DEPARTEMEN']);
    $tabel_3a1->setCellValue('C' . $rowIndex, $row['Doktor/Doktor Terapan']);
    $tabel_3a1->setCellValue('D' . $rowIndex, $row['Magister/Magister Terapan']);
    $tabel_3a1->setCellValue('E' . $rowIndex, $row['PROFESI']);
    $tabel_3a1->setCellValue('F' . $rowIndex, $row['Jumlah']);
    $tabel_3a1->getStyle('C2:E' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a1->getStyle('A2:A' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a1->getStyle('B' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3a1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$doktor =   '=SUM(C5:C' . ($rowIndex - 1) . ')';
$magister = '=SUM(D5:D' . ($rowIndex - 1) . ')';
$profesi =  '=SUM(E5:E' . ($rowIndex - 1) . ')';
$jumlah =  '=SUM(F5:F' . ($rowIndex - 1) . ')';

// Set total row
$tabel_3a1->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3a1->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3a1->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true); 
$tabel_3a1->setCellValue('C' . $rowIndex, $doktor);
$tabel_3a1->setCellValue('D' . $rowIndex, $magister);
$tabel_3a1->setCellValue('E' . $rowIndex, $profesi);
$tabel_3a1->setCellValue('F' . $rowIndex, $jumlah);
$tabel_3a1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$tabel_3a1->getStyle('C2:F' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a1->getStyle('A2:A' . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a1->getStyle('B' . $rowIndex . ':F' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3a1->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;


$writer = new Xlsx($tabel);
// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3a1 Kecukupan Dosen.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();


?>