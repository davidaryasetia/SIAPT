<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_rasio_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.b_rasio_dosen_terhadap_mahasiswa.php');
// Decode J SON response $response_asing & $response_aktif ke associative array
$rasio_dosen = json_decode($response_rasio_dosen, true);
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$tabel = new Spreadsheet();
$tabel_3b = $tabel->getActiveSheet();
$tabel_3b->setTitle('3b');
$tabel_3b->getStyle('A3:E3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3b->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3b->getStyle('A3:E3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3b->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3b->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3b->getRowDimension(3)->setRowHeight(15);
$tabel_3b->mergeCells('A1:C1'); // Merge cells A1 and B1'
$tabel_3b->setCellValue('A1', 'Tabel 3.b) Rasio Dosen Terhadap Mahasiswa');
$tabel_3b->setCellValue('A3', 'No.');
$tabel_3b->setCellValue('B3', 'Departemen');
$tabel_3b->setCellValue('C3', 'Jumlah Dosen');
$tabel_3b->setCellValue('D3', 'Mahasiswa (TS)');
$tabel_3b->setCellValue('E3', 'Jumlah Mahasiswa TA');
// End Heading Tabel

// Set Autosize and widht height column and wrap text
$tabel_3b->getColumnDimension('A')->setAutoSize(true);
$tabel_3b->getColumnDimension('B')->setWidth(250, 'px');
$tabel_3b->getColumnDimension('C')->setWidth(150, 'px');
$tabel_3b->getColumnDimension('D')->setWidth(150, 'px');
$tabel_3b->getColumnDimension('E')->setWidth(150, 'px');


// Heading No
$tabel_3b = $tabel->getActiveSheet();
$tabel_3b->getStyle('A4:E4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3b->getStyle('A4:E4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3b->getStyle('A4:E4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3b->getStyle('A4:E4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3b->getStyle('A4:E4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3b->getRowDimension(4)->setRowHeight(15);
$tabel_3b->setCellValue('A4', '1.');
$tabel_3b->setCellValue('B4', '2');
$tabel_3b->setCellValue('C4', '3');
$tabel_3b->setCellValue('D4', '4');
$tabel_3b->setCellValue('E4', '5');


// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($rasio_dosen as $row)  {
    $tabel_3b->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $tabel_3b->setCellValue('B' . $rowIndex, $row['DEPARTEMEN']);
    $tabel_3b->setCellValue('C' . $rowIndex, $row['Jumlah Dosen']);
    $tabel_3b->setCellValue('D' . $rowIndex, $row['Mahasiswa Angkatan 2020']);
    $tabel_3b->setCellValue('E' . $rowIndex, $row['Jumlah Mahasiswa TA']);
    // Calculate Total untuk setiap row
    $tabel_3b->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3b->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3b->getStyle('B' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3b->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$jumlah_dosen    = '=SUM(C5:C' . $rowIndex . ')';
$mahasiswa    = '=SUM(D5:D' . $rowIndex . ')';
$mahasiswa_ta      = '=SUM(E5:E' . $rowIndex . ')';


// Set total row
$tabel_3b->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3b->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3b->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true);
$tabel_3b->setCellValue('C' . $rowIndex, $jumlah_dosen);
$tabel_3b->setCellValue('D' . $rowIndex, $mahasiswa);
$tabel_3b->setCellValue('E' . $rowIndex, $mahasiswa_ta);
$tabel_3b->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3b->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3b->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3b->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3b->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;


$writer = new Xlsx($tabel);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3.b Rasio Dosen Terhadap Mahasiswa.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>