<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_sertifikasi_dosen = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.3_sertifikasi_dosen.php');
// Decode J SON response $response_asing & $response_aktif ke associative array
$sertifikasi_dosen = json_decode($response_sertifikasi_dosen, true);
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$tabel = new Spreadsheet();
$tabel_3a3 = $tabel->getActiveSheet();
$tabel_3a3->setTitle('3a3');
$tabel_3a3->getStyle('A3:E3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a3->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a3->getStyle('A3:E3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a3->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3a3->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a3->getDefaultColumnDimension('D')->setWidth(5, 'cm');
$tabel_3a3->getRowDimension(3)->setRowHeight(15);
$tabel_3a3->mergeCells('A1:C1'); // Merge cells A1 and B1'
$tabel_3a3->setCellValue('A1', 'Tabel 3.a.3 Sertifikasi Dosen');
$tabel_3a3->setCellValue('A3', 'No.');
$tabel_3a3->setCellValue('B3', 'Departemen/Jurusan');
$tabel_3a3->setCellValue('C3', 'Jumlah Dosen');
$tabel_3a3->setCellValue('D3', 'Jumlah Dosen Bersertifikat');
$tabel_3a3->setCellValue('E3', 'Jumlah');
// End Heading Tabel

// Set Autosize and widht height column and wrap text
$tabel_3a3->getColumnDimension('A')->setAutoSize(true);
$tabel_3a3->getColumnDimension('B')->setWidth(250, 'px');
$tabel_3a3->getColumnDimension('C')->setWidth(130, 'px');
$tabel_3a3->getColumnDimension('D')->setWidth(130, 'px');
$tabel_3a3->getColumnDimension('E')->setWidth(130, 'px');


// Heading No
$tabel_3a3 = $tabel->getActiveSheet();
$tabel_3a3->getStyle('A4:E4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a3->getStyle('A4:E4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a3->getStyle('A4:E4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a3->getStyle('A4:E4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3a3->getStyle('A4:E4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a3->getRowDimension(4)->setRowHeight(15);
$tabel_3a3->setCellValue('A4', '1.');
$tabel_3a3->setCellValue('B4', '2');
$tabel_3a3->setCellValue('C4', '3');
$tabel_3a3->setCellValue('D4', '4');
$tabel_3a3->setCellValue('E4', '5');

// End Heading Tabel

$rowIndex = 5; // Start row index for data
foreach ($sertifikasi_dosen as $row)  {
    $tabel_3a3->setCellValue('A' . $rowIndex, $row['NOMOR']);
    $tabel_3a3->setCellValue('B' . $rowIndex, $row['Departemen/Jurusan']);
    $tabel_3a3->setCellValue('C' . $rowIndex, $row['Jumlah Dosen']);
    $tabel_3a3->setCellValue('D' . $rowIndex, $row['Jumlah Dosen Bersertifikat']);
    // Calculate Total untuk setiap row
    $tabel_3a3->setCellValue('E'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex );
    $tabel_3a3->getStyle('A2:E' . $rowIndex)->getAlignment()->setWrapText(true);
    $tabel_3a3->getStyle('C' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a3->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a3->getStyle('B' . $rowIndex . ':D' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$dosen =    '=SUM(C5:C' . $rowIndex . ')';
$dosen_bersertifikat = '=SUM(D5:D' . $rowIndex . ')';
$jumlah =        '=SUM(E5:E' . $rowIndex . ')';


// Set total row
$tabel_3a3->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3a3->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3a3->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true);
$tabel_3a3->setCellValue('C' . $rowIndex, $dosen);
$tabel_3a3->setCellValue('D' . $rowIndex, $dosen_bersertifikat);
$tabel_3a3->setCellValue('E' . $rowIndex, $jumlah);
$tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$tabel_3a3->getStyle('C2:F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a3->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3a3->getStyle('A' . $rowIndex . ':E' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;

$writer = new Xlsx($tabel);
// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3a3 Sertifikasi Dosen.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>