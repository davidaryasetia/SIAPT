<?php
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$tabel = new Spreadsheet();

// Daftar Tabel
$daftar_tabel = $tabel->getActiveSheet();
$daftar_tabel->setCellValue('A1', 'Daftar Tabel - Laporan Kinerja Perguruan Tinggi');
$daftar_tabel->setTitle('Daftar Tabel');


// Tabel 2.b Mahasiswa Asing
$tabel_2b = $tabel->createSheet();
$tabel_2b->setCellValue('A1', 'Tabel 2.b Mahasiswa Asing');
$tabel_2b->setTitle('2b');

// Tabel 2.c Kredit Mata Kuliah
$tabel_2c = $tabel->createSheet();
$tabel_2c->setCellValue('A1', 'Tabel 2.c Kredit Matakuliah');
$tabel_2c->setTitle('2c');

// Tabel 3.a.1 Kecukupan Dosen Perguruan Tinggi
$tabel_3a1 = $tabel->createSheet();
$tabel_3a1->setCellValue('A1', 'Tabel 3.a.1 Kecukupan Dosen Perguruan Tinggi');
$tabel_3a1->setTitle('3a1');

// Tabel 3.a.2 Jabatan Akademik Dosen Tetap
$tabel_3a2 = $tabel->createSheet();
$tabel_3a2->setCellValue('A1', 'Tabel 3.a.2 Jabatan Akademik Dosen Tetap');
$tabel_3a2->setTitle('3a2');


$writer = new Xlsx($tabel);
// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Daftar Tabel LKPT.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();