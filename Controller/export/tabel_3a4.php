<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_dosen_tidak_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.4_dosen_tidak_tetap.php');
// Decode J SON response $response_asing & $response_aktif ke associative array
$dosen_tidak_tetap = json_decode($response_dosen_tidak_tetap, true);
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$tabel = new Spreadsheet();
$tabel_3a4 = $tabel->getActiveSheet();
$tabel_3a4->setTitle('3a4');
$tabel_3a4->getStyle('A3:H3')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a4->getStyle('A3:H3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a4->getStyle('A3:H3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a4->getStyle('A3:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$tabel_3a4->getStyle('A3:H3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a4->getRowDimension(3)->setRowHeight(15);
$tabel_3a4->mergeCells('A1:C1'); // Merge cells A1 and B1'
$tabel_3a4->setCellValue('A1', 'Tabel 3.a.4) Dosen Tidak Tetap');
$tabel_3a4->setCellValue('A3', 'No.');
$tabel_3a4->setCellValue('B3', 'Pendidikan');
$tabel_3a4->setCellValue('C3', 'Guru Besar');
$tabel_3a4->setCellValue('D3', 'Lektor Kepala');
$tabel_3a4->setCellValue('E3', 'Lektor');
$tabel_3a4->setCellValue('F3', 'Asisten Ahli');
$tabel_3a4->setCellValue('G3', 'Tenaga Pengajar');
$tabel_3a4->setCellValue('H3', 'Jumlah');
// End Heading Tabel

// Heading No
$tabel_3a4 = $tabel->getActiveSheet();
$tabel_3a4->getStyle('A4:H4')->getFont()->setBold(true); // Apply bold font to header row
$tabel_3a4->getStyle('A4:H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a4->getStyle('A4:H4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a4->getStyle('A4:H4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9'); // Set light blue background color for header row
$tabel_3a4->getStyle('A4:H4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$tabel_3a4->getRowDimension(4)->setRowHeight(15);
$tabel_3a4->setCellValue('A4', '1.');
$tabel_3a4->setCellValue('B4', '2');
$tabel_3a4->setCellValue('C4', '3');
$tabel_3a4->setCellValue('D4', '4');
$tabel_3a4->setCellValue('E4', '5');
$tabel_3a4->setCellValue('F4', '6');
$tabel_3a4->setCellValue('G4', '7');
$tabel_3a4->setCellValue('H4', '8');
// End Heading Tabel


// Set Autosize and widht height column and wrap text
$tabel_3a4->getColumnDimension('A')->setAutoSize(true);
$tabel_3a4->getColumnDimension('B')->setWidth(200, 'px');
$tabel_3a4->getColumnDimension('C')->setWidth(100, 'px');
$tabel_3a4->getColumnDimension('D')->setWidth(100, 'px');
$tabel_3a4->getColumnDimension('E')->setWidth(100, 'px');
$tabel_3a4->getColumnDimension('F')->setWidth(100, 'px');
$tabel_3a4->getColumnDimension('G')->setWidth(110, 'px');
$tabel_3a4->getColumnDimension('H')->setWidth(100, 'px');


$rowIndex = 5; // Start row index for data
foreach ($dosen_tidak_tetap as $row)  {
    $tabel_3a4->setCellValue('A' . $rowIndex, $row['Nomor']);
    $tabel_3a4->setCellValue('B' . $rowIndex, $row['Pendidikan']);
    $tabel_3a4->setCellValue('C' . $rowIndex, $row['Guru Besar']);
    $tabel_3a4->setCellValue('D' . $rowIndex, $row['Lektor Kepala']);
    $tabel_3a4->setCellValue('E' . $rowIndex, $row['Lektor']);
    $tabel_3a4->setCellValue('F' . $rowIndex, $row['Asisten Ahli']);
    $tabel_3a4->setCellValue('G' . $rowIndex, $row['Tenaga Pengajar']);
    // Calculate Total untuk setiap row
    $tabel_3a4->setCellValue('H'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex. '+E' .$rowIndex. '+F' .$rowIndex. '+G' .$rowIndex );
    $tabel_3a4->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a4->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $tabel_3a4->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $tabel_3a4->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
    $rowIndex++;
}

// Calculate column sums
$guru_besar    = '=SUM(C5:C' . $rowIndex . ')';
$lektor_kepala = '=SUM(D5:D' . $rowIndex . ')';
$lektor =        '=SUM(E5:E' . $rowIndex . ')';
$asisten_ahli =  '=SUM(F5:F' . $rowIndex . ')';
$tenaga_pengajar ='=SUM(G5:G' . $rowIndex . ')';
$jumlah =        '=SUM(H5:H' . $rowIndex . ')';


// Set total row
$tabel_3a4->setCellValue('A' . $rowIndex, 'Jumlah');
$tabel_3a4->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$tabel_3a4->getStyle('A' . $rowIndex . ':B' . $rowIndex)->getFont()->setBold(true);
$tabel_3a4->setCellValue('C' . $rowIndex, $guru_besar);
$tabel_3a4->setCellValue('D' . $rowIndex, $lektor_kepala);
$tabel_3a4->setCellValue('E' . $rowIndex, $lektor);
$tabel_3a4->setCellValue('F' . $rowIndex, $asisten_ahli);
$tabel_3a4->setCellValue('G' . $rowIndex, $tenaga_pengajar);
$tabel_3a4->setCellValue('H' . $rowIndex, $jumlah);
$tabel_3a4->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a4->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$tabel_3a4->getStyle('C2:H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a4->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$tabel_3a4->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$tabel_3a4->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;

$writer = new Xlsx($tabel);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3.a.4 Dosen Tidak Tetap.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>