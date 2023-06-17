<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A1', 'Hello World !');
$activeWorksheet->setCellValue('A2', 'Hello World !');
$activeWorksheet->setCellValue('A3', 'Hello World !');
$activeWorksheet->setCellValue('A4', 'Hello World !');
$activeWorksheet->setCellValue('A5', 'Hello World !');
$activeWorksheet->setCellValue('A6', 'Hello World !');
$activeWorksheet->setCellValue('A6', 'Hello World !');

$writer = new Xlsx($spreadsheet);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tabel 2b Mahasiswa Asing.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit();
?>