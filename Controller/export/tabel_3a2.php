<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_jabatan_akademik = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.2_jabatan_akademik_dosen_tetap.php');
// Decode JSON response $response_asing & $response_aktif ke associative array
$jabatan_akademik= json_decode($response_jabatan_akademik, true);
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$tabel = new Spreadsheet();
$tabel_3a2 = $tabel->getActiveSheet();
$tabel_3a2->setTitle('3a2');
$tabel_3a2->getStyle('A3:H3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a2->getStyle('A3:H3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a2->getStyle('A3:H3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a2->getStyle('A3:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3a2->getStyle('A3:H3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a2->getRowDimension(3)->setRowHeight(30);
$tabel_3a2->mergeCells('A1:C1'); // Merge cells A1 and B1
$tabel_3a2->getColumnDimension('B')->setWidth(20); // Set the width of column A to 15 characters
$tabel_3a2->setCellValue('A1', 'Tabel 3.a.2) Jabatan Akademik Dosen Tetap');
$tabel_3a2->setCellValue('A3', 'No.');
$tabel_3a2->setCellValue('B3', 'Pendidikan ');
$tabel_3a2->setCellValue('C3', 'Guru Besar');
$tabel_3a2->setCellValue('D3', 'Lektor Kepala');
$tabel_3a2->setCellValue('E3', 'Lektor');
$tabel_3a2->setCellValue('F3', 'Asisten Ahli');
$tabel_3a2->setCellValue('G3', 'Tenaga Pengajar');
$tabel_3a2->setCellValue('H3', 'Jumlah');
// End Heading Tabel

// Set Autosize and widht height column and wrap text
$tabel_3a2->getColumnDimension('A')->setAutoSize(true);
$tabel_3a2->getColumnDimension('B')->setWidth(320, 'px');
$tabel_3a2->getColumnDimension('C')->setWidth(100, 'px');
$tabel_3a2->getColumnDimension('D')->setWidth(100, 'px');
$tabel_3a2->getColumnDimension('E')->setWidth(100, 'px');
$tabel_3a2->getColumnDimension('F')->setWidth(100, 'px');
$tabel_3a2->getColumnDimension('G')->setWidth(100, 'px');
$tabel_3a2->getColumnDimension('H')->setWidth(100, 'px');

// Heading No
$tabel_3a2 = $tabel->getActiveSheet();
$tabel_3a2->getStyle('A4:H4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a2->getStyle('A4:H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a2->getStyle('A4:H4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a2->getStyle('A4:H4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3a2->getStyle('A4:H4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a2->getRowDimension(4)->setRowHeight(15);
$tabel_3a2->setCellValue('A4', '1.');
$tabel_3a2->setCellValue('B4', '2');
$tabel_3a2->setCellValue('C4', '3');
$tabel_3a2->setCellValue('D4', '4');
$tabel_3a2->setCellValue('E4', '5');
$tabel_3a2->setCellValue('F4', '6');
$tabel_3a2->setCellValue('G4', '7');
$tabel_3a2->setCellValue('H4', '8');
// End Heading Tabel

$rowIndex = 5; // Start row index for data
foreach ($jabatan_akademik as $row)  {
    $tabel_3a2->setCellValue('A' . $rowIndex, $row['Nomor']);
    $tabel_3a2->setCellValue('B' . $rowIndex, $row['Pendidikan']);
    $tabel_3a2->setCellValue('C' . $rowIndex, $row['Guru Besar']);
    $tabel_3a2->setCellValue('D' . $rowIndex, $row['Lektor Kepala']);
    $tabel_3a2->setCellValue('E' . $rowIndex, $row['Lektor']);
    $tabel_3a2->setCellValue('F' . $rowIndex, $row['Asisten Ahli']);
    $tabel_3a2->setCellValue('G' . $rowIndex, $row['Tenaga Pengajar']);
    // Calculate Total untuk setiap row
    $tabel_3a2->getStyle('A2:H' . $rowIndex)->getAlignment()->setWrapText(true);
    $tabel_3a2->setCellValue('H'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex. '+E' .$rowIndex. '+F' .$rowIndex. '+G' .$rowIndex );
    $tabel_3a2->getStyle('A' .$rowIndex . ':H' .$rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
    $tabel_3a2->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a2->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a2->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $rowIndex++;
}

// Calculate column sums
$guru_besar =    '=SUM(C5:C' . $rowIndex . ')';
$lektor_kepala = '=SUM(D5:D' . $rowIndex . ')';
$lektor =        '=SUM(E5:E' . $rowIndex . ')';
$asisten_ahli =  '=SUM(F5:F' . $rowIndex . ')';
$tenaga_pengajar=  '=SUM(G5:G' . $rowIndex . ')';
$jumlah=  '=SUM(H5:H' . $rowIndex . ')';

// Set total row
$tabel_3a2->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3a2->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3a2->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true); 
$tabel_3a2->setCellValue('C' . $rowIndex, $guru_besar);
$tabel_3a2->setCellValue('D' . $rowIndex, $lektor_kepala);
$tabel_3a2->setCellValue('E' . $rowIndex, $lektor);
$tabel_3a2->setCellValue('F' . $rowIndex, $asisten_ahli);
$tabel_3a2->setCellValue('G' . $rowIndex, $tenaga_pengajar);
$tabel_3a2->setCellValue('H' . $rowIndex, $jumlah);
$tabel_3a2->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a2->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a2->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setWrapText(true); // Enable text wrapping
$tabel_3a2->getStyle('C2:F' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a2->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a2->getStyle('B' . $rowIndex . ':H' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3a2->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;


$writer = new Xlsx($tabel);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3a2 Jabatan Akademik Dosen Tetap.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>