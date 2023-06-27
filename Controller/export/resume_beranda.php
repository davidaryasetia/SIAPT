<?php
session_start();
?>

<?php
// Export Data Resume Elemen Indikator .pdf
$response = file_get_contents('https://project.mis.pens.ac.id/mis143/API/elemen_indikator_akreditasi.php');

// Decode ke json
$data = json_decode($response, true);

require '../../vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = '
<html>
<head>
<style>
table {
    width : 100%;
    border-collapse : collapse;
}
table, th, td{
    border : 1px solid black;
}
th, td{
    padding : 8px;
    text-align : left;
}
th{
    background-color : #8DB4E2;
}
.no, .sheet, .skor{
    text-align: center;
}
</style>
</head>
<body>
<h3>Resume Matriks IAPT 3.0 Berdasarkan Laporan Kinerja (LKPT)</h3>
<table>
<thead>
<tr>
<th>Nomor</th>
<th>Bab/Kriteria/Elemen</th>
<th>Indikator</th>
<th>Sheet</th>
<th>Skoor</th>
</tr>
</thead>
<tbody>';



// $skor
$skor = $_SESSION['skor'];
$skor_tabel_2b = $skor['2b'];
$skor_2c = $skor['2c'];
$skor_3a1 = $skor['3a1'];

$skorArray = [
    $skor_tabel_2b, 
    $skor_2c, 
    $skor_3a1
];
$skorCount = count($skorArray);


foreach ($data as $index => $row){
    $html .= '<tr>';
    $html .= '<td class="no">' .$row['NO']. '</td>';
    $html .= '<td>' .$row['BAB']. '</td>';
    $html .= '<td>' .$row['INDIKATOR']. '</td>';
    $html .= '<td class="sheet">' .$row['SHEET']. '</td>';
    $skor = ($index < $skorCount) ? $skorArray[$index] : '';

    if($skor == 4){
        $html .= '<td class="skor" style="color:green; font-weight:bold">' .$skor. '</td>';
    } else if($skor < 4 && $skor > 0){
        $html .= '<td class="skor" style="color:orange; font-weight:bold">' .$skor. '</td>';
    } else {
        $html .= '<td class="skor" style="color:red; font-weight:bold">' .$skor. '</td>';
    }
    $html .= '</tr>';
}

$html .= '
</tbody>
</table>
</body>
</html>';

// Set file name
$fileName = 'Resume Matriks IAPT Berdasarkan Laporan Kinerja(LKPT).pdf';

// Render HTML to pdf
// Render HTML to pdf
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();


// Generate the file pdf content
$pdfContent = $dompdf->output();

// Generate ke temporary file path berdasarkan default path file system
$savePath = tempnam(sys_get_temp_dir(), 'pdf_');

// Save file PDF file ke temporary path 
file_put_contents($savePath, $pdfContent);

// Send PDF file to download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Content-Length: ' . filesize($savePath));
readfile($savePath);

// Delete temporary file
unlink($savePath);
exit;
?>