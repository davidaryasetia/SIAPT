<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_dosen_tidak_tetap = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.a.4_dosen_tidak_tetap.php');
// Decode J SON response $response_asing & $response_aktif ke associative array
$dosen_tidak_tetap = json_decode($response_dosen_tidak_tetap, true);
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Heading Tabel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setTitle('3a4');
$activeWorksheet->getStyle('A3:H3')->getFont()->setBold(true); // Apply bold font to header row
$activeWorksheet->getStyle('A3:H3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A3:H3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('A3:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2'); // Set light blue background color for header row
$activeWorksheet->getStyle('A3:H3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Apply thin borders to header row
$activeWorksheet->getRowDimension(3)->setRowHeight(15);
$activeWorksheet->mergeCells('A1:C1'); // Merge cells A1 and B1'
$activeWorksheet->setCellValue('A1', 'Tabel 3.a.4) Dosen Tidak Tetap');
$activeWorksheet->setCellValue('A3', 'No.');
$activeWorksheet->setCellValue('B3', 'Pendidikan');
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
foreach ($dosen_tidak_tetap as $row)  {
    $activeWorksheet->setCellValue('A' . $rowIndex, $row['Nomor']);
    $activeWorksheet->setCellValue('B' . $rowIndex, $row['Pendidikan']);
    $activeWorksheet->setCellValue('C' . $rowIndex, $row['Guru Besar']);
    $activeWorksheet->setCellValue('D' . $rowIndex, $row['Lektor Kepala']);
    $activeWorksheet->setCellValue('E' . $rowIndex, $row['Lektor']);
    $activeWorksheet->setCellValue('F' . $rowIndex, $row['Asisten Ahli']);
    $activeWorksheet->setCellValue('G' . $rowIndex, $row['Tenaga Pengajar']);
    // Calculate Total untuk setiap row
    $activeWorksheet->setCellValue('H'. $rowIndex, '=C' .$rowIndex . '+D' .$rowIndex. '+E' .$rowIndex. '+F' .$rowIndex. '+G' .$rowIndex );
    $activeWorksheet->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('A2:A' . $rowIndex )->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00'); 
    $activeWorksheet->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
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
$activeWorksheet->setCellValue('A' . $rowIndex, 'Total');
$activeWorksheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex); // Merge cells A and B
$activeWorksheet->setCellValue('C' . $rowIndex, $guru_besar);
$activeWorksheet->setCellValue('D' . $rowIndex, $lektor_kepala);
$activeWorksheet->setCellValue('E' . $rowIndex, $lektor);
$activeWorksheet->setCellValue('F' . $rowIndex, $asisten_ahli);
$activeWorksheet->setCellValue('G' . $rowIndex, $tenaga_pengajar);
$activeWorksheet->setCellValue('H' . $rowIndex, $jumlah);
$activeWorksheet->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('C' . $rowIndex . ':H' . $rowIndex)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$activeWorksheet->getStyle('C2:H' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('A2:A' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$activeWorksheet->getStyle('B' . $rowIndex . ':G' . $rowIndex)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF'); 
$activeWorksheet->getStyle('A' . $rowIndex . ':H' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
$rowIndex++;

// Auto-size columns
foreach (range('A', 'H') as $column) {
    $activeWorksheet->getColumnDimension($column)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 3.a.4 Dosen Tidak Tetap.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
?>