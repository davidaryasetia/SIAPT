<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_rekognisi = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php');

// Decode JSON response $response_asing & $response_aktif ke associative array
$rekognisi= json_decode($response_rekognisi, true);

require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$tabel = new Spreadsheet();
$tabel_3d = $tabel->getActiveSheet();
$tabel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$tabel_3d->setTitle('3d');
$tabel_3d->getStyle('A3:F3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3d->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3d->getStyle('A3:F3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3d->getStyle('A3:F3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3d->getStyle('A3:F3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3d->getRowDimension(3)->setRowHeight(30);

// Set Autosize and widht height column and wrap text
$tabel_3d->getColumnDimension('A')->setAutoSize(true);
$tabel_3d->getColumnDimension('B')->setWidth(150, 'px');
$tabel_3d->getColumnDimension('C')->setWidth(200, 'px');
$tabel_3d->getColumnDimension('D')->setWidth(400, 'px');
$tabel_3d->getColumnDimension('E')->setWidth(100, 'px');
$tabel_3d->getColumnDimension('F')->setWidth(100, 'px');


$tabel_3d->mergeCells('A1:C1'); // Merge cells A1 and B1
$tabel_3d->setCellValue('A1', 'Tabel 3d) Rekognisi Dosen');
$tabel_3d->setCellValue('A3', 'No.');
$tabel_3d->setCellValue('B3', 'Nama Dosen');
$tabel_3d->setCellValue('C3', 'Bidang Keahlian');
$tabel_3d->setCellValue('D3', 'Rekognisi');
$tabel_3d->setCellValue('E3', 'Tingkat');
$tabel_3d->setCellValue('F3', 'Tahun Perolehan');

// Heading No
$tabel_3d = $tabel->getActiveSheet();
$tabel_3d->getStyle('A4:F4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3d->getStyle('A4:F4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3d->getStyle('A4:F4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3d->getStyle('A4:F4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3d->getStyle('A4:F4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3d->getRowDimension(4)->setRowHeight(15);
$tabel_3d->setCellValue('A4', '1.');
$tabel_3d->setCellValue('B4', '2');
$tabel_3d->setCellValue('C4', '3');
$tabel_3d->setCellValue('D4', '4');
$tabel_3d->setCellValue('E4', '5');
$tabel_3d->setCellValue('F4', '6');

// End Heading Tabel
$rowIndex = 5; // Start row index for data
foreach ($rekognisi as $row) {
    $tabel_3d->setCellValue('A' . $rowIndex, $row['NO']);
    $tabel_3d->setCellValue('B' . $rowIndex, $row['NAMA']);
    $tabel_3d->setCellValue('C' . $rowIndex, $row['BIDANG_KEAHLIAN']);
    $tabel_3d->setCellValue('D' . $rowIndex, $row['REKOGNISI']);
    $tabel_3d->setCellValue('E' . $rowIndex, $row['TINGKAT']);
    $tabel_3d->setCellValue('F' . $rowIndex, $row['TAHUN']);

    // Mengatur wrap text
    $tabel_3d->getStyle('A2:F' . $rowIndex)->getAlignment()->setWrapText(true);
    $tabel_3d->getStyle('E2:F' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3d->getStyle('A2:F' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $tabel_3d->getStyle('D5:D' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
    $tabel_3d->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3d->getStyle('A2:A' . $rowIndex )->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $tabel_3d->getStyle('B' . $rowIndex . ':F' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3d->getStyle('A' . $rowIndex . ':F' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

$writer = new Xlsx($tabel);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3d Rekognisi Dosen.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>