<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_pkm_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.c.2_produktivitas_pkm_dosen.php');
// Decode J SON response $response_asing & $response_aktif ke associative array
$pkm_dosen = json_decode($response_pkm_dosen, true);
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$tabel = new Spreadsheet();
$tabel_3c2 = $tabel->getActiveSheet();
$tabel_3c2->setTitle('3c1');
$tabel_3c2->getStyle('A3:F3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3c2->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c2->getStyle('A3:F3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3c2->getStyle('A3:F3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3c2->getStyle('A3:F3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3c2->getRowDimension(3)->setRowHeight(15);
$tabel_3c2->mergeCells('A1:C1'); // Merge cells A1 and B1'
$tabel_3c2->setCellValue('A1', 'Tabel 3.c.2) Produktivitas pKm Dosen');
$tabel_3c2->setCellValue('A3', 'No.');
$tabel_3c2->setCellValue('B3', 'Sumber Pembiayaan');
$tabel_3c2->setCellValue('C3', 'TS-2');
$tabel_3c2->setCellValue('D3', 'TS-1');
$tabel_3c2->setCellValue('E3', 'TS');
$tabel_3c2->setCellValue('F3', 'Jumlah');
// End Heading Tabel

// Set Autosize and widht height column and wrap text
$tabel_3c2->getColumnDimension('A')->setAutoSize(true);
$tabel_3c2->getColumnDimension('B')->setWidth(250, 'px');
$tabel_3c2->getColumnDimension('C')->setWidth(150, 'px');
$tabel_3c2->getColumnDimension('D')->setWidth(150, 'px');
$tabel_3c2->getColumnDimension('E')->setWidth(150, 'px');
$tabel_3c2->getColumnDimension('F')->setWidth(150, 'px');


// Heading No
$tabel_3c2 = $tabel->getActiveSheet();
$tabel_3c2->getStyle('A4:F4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3c2->getStyle('A4:F4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c2->getStyle('A4:F4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3c2->getStyle('A4:F4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3c2->getStyle('A4:F4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3c2->getRowDimension(4)->setRowHeight(15);
$tabel_3c2->setCellValue('A4', '1.');
$tabel_3c2->setCellValue('B4', '2');
$tabel_3c2->setCellValue('C4', '3');
$tabel_3c2->setCellValue('D4', '4');
$tabel_3c2->setCellValue('E4', '5');
$tabel_3c2->setCellValue('F4', '6');
// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($pkm_dosen as $row)  {
    $tabel_3c2->setCellValue('A' . $rowIndex, $row['Nomor']);
    $tabel_3c2->setCellValue('B' . $rowIndex, $row['Sumber Pembiayaan']);
    $tabel_3c2->setCellValue('C' . $rowIndex, $row['TS-2(2017)']);
    $tabel_3c2->setCellValue('D' . $rowIndex, $row['TS-1(2018)']);
    $tabel_3c2->setCellValue('E' . $rowIndex, $row['TS(2019)']);
    // Calculate Total untuk setiap row
    $tabel_3c2->setCellValue('F'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex. '+E' .$rowIndex);
    $tabel_3c2->getStyle('C' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3c2->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3c2->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3c2->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$ts2    = '=SUM(C5:C' . $rowIndex . ')';
$ts1    = '=SUM(D5:D' . $rowIndex . ')';
$ts      = '=SUM(E5:E' . $rowIndex . ')';
$jumlah  = '=SUM(F5:F' . $rowIndex . ')';


// Set total row
$tabel_3c2->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3c2->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3c2->setCellValue('C' . $rowIndex, $ts2);
$tabel_3c2->setCellValue('D' . $rowIndex, $ts1);
$tabel_3c2->setCellValue('E' . $rowIndex, $ts);
$tabel_3c2->setCellValue('F' . $rowIndex, $jumlah);
$tabel_3c2->getStyle('C' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c2->getStyle('C' . $rowIndex . ':F' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3c2->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3c2->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3c2->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;

$writer = new Xlsx($tabel);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3c2 Produktivitas pKM Dosen.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>