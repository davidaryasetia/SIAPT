<?php
 // Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
 $response_asing = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_asing');
 $response_aktif = file_get_contents('https://project.mis.pens.ac.id/mis143/API/2.b_mahasiswa_asing.php?query=mahasiswa_aktif');

 // Decode JSON response $response_asing & $response_aktif ke asociate array
 $mahasiswa_asing = json_decode($response_asing, true);
 $mahasiswa_aktif = json_decode($response_aktif, true);

 require '../vendor/autoload.php';    
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
 $spreadsheet = new Spreadsheet();
 $activeWorksheet = $spreadsheet->getActiveSheet();
 $activeWorksheet->getStyle('A1:E1')->getFont()->setBold(true); // Apply bold font to header row
 $activeWorksheet->fromArray([
     ['No.', 'Program Studi', 'TS-2(2017)', 'TS-1(2018)', 'TS(2019)'] // Header row
 ], NULL, 'A1');
 
 $rowIndex = 2; // Start row index for data
 foreach ($mahasiswa_asing as $row) {
     $activeWorksheet->setCellValue('A' . $rowIndex, $row['NOMOR']);
     $activeWorksheet->setCellValue('B' . $rowIndex, $row['Program Studi']);
     $activeWorksheet->setCellValue('C' . $rowIndex, $row['TS-2(2017)']);
     $activeWorksheet->setCellValue('D' . $rowIndex, $row['TS-1(2018)']);
     $activeWorksheet->setCellValue('E' . $rowIndex, $row['TS(2019)']);
     $rowIndex++;
 }
 
 // Auto-size columns
 foreach (range('A', 'E') as $column) {
     $activeWorksheet->getColumnDimension($column)->setAutoSize(true);
 }
 
 $writer = new Xlsx($spreadsheet);
 
 // Set headers for download
 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 header('Content-Disposition: attachment;filename="Tabel_2b_Mahasiswa_Asing.xlsx"');
 header('Cache-Control: max-age=0');
 
 $writer->save('php://output');
 exit();

?>