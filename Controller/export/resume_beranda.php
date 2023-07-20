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
.sheet{
    color: blue;
}
.total {
    align-items: left !important;
    text-align: left !important;
    justify-content: center !important;
    font-weight: bold;
    height : 50px !important;
    font-size: 18px;
  }
  .table-row {
    background: gainsboro;
    font-weight: bold;
    align-items: left;
    justify-content: center;
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
/**  session_start() => '../store_skor1.php';
*/
$skor = $_SESSION['skor'];
$skor_2b = $skor['2b'];
$skor_2c = $skor['2c'];
$skor_3a1 = $skor['3a1'];
$skor_3a2 = $skor['3a2'];
$skor_3a3 = $skor['3a3'];
$skor_3a4 = $skor['3a4'];
$skor_3c1 = $skor['3c1'];
$skor_3c2 = $skor['3c2'];
$skor_3d = $skor['3d'];
$skor_5b1 = $skor['5b1'];
$skor_5b2 = $skor['5b2'];
$skor_null = $skor['null'];
$skor_iapt = $skor['iapt']; 
// Make Variabel Data to containt value 
$skorArray = [
    $skor_null, // 8 -> 1.a
    $skor_null, // 8 -> 1.a
    $skor_null, // 9 -> 1.a
    $skor_null, // 10 -> 1.b
    $skor_null, // 12 -> 1.c
    $skor_null, // 17 -> 2.a
    $skor_null, //18 -> 2.a
    $skor_2b, // 19 -> 2.b
    $skor_3a1, // 21 -> 3.a.1
    $skor_3a2, // 22 -> 3.a.2
    $skor_3a3, // 23 -> 3.a.3
    $skor_3a4, // 24 -> 3. a.4
    $skor_null, // 25 -> 3.b
    $skor_3c1, // 26 -> 3.c.1
    $skor_3c2, // 27 ->3.c.2
    $skor_3d, // 28 -> 3.d
    $skor_null,  // 30 -> 4.a
    $skor_null,  // 31-> 4.a
    $skor_null,  // 32 -> 4.b
    $skor_null,  // 33 -> 4.b
    $skor_null,  // 34 -> 4.b
    $skor_null,  // 35 -> 4.b
    $skor_null,  // 36 -> 4.b
    $skor_2c, // 40 -> 2.c
    $skor_null, // 46 -> 5.a.1
    $skor_null, // 47 -> 5.a.2
    $skor_5b1, // 48 -> 5.b.1
    $skor_5b2, // 49 -> 5.b.2
    $skor_null,  // 50 -> 5.c.1
    $skor_null, // 51 -> 5.c.2
    $skor_null, // 52 -> 5.c.2
    $skor_null, // 53 -> 5.d.1
    $skor_null, // 54 -> 5.d.2
    $skor_null, // 55 -> 5.e.1
    $skor_null, // 56 -> 5.e.2
    $skor_null, // 57 -> 5.f
    $skor_null, // 58 -> 5.f
    $skor_null, // 59 -> 5.g
    $skor_null, // 60 ->5.h  

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


// Baris Tambahan untuk menghitung Total Skoor
$html .= '<tr class="table-row">';
$html .= '<td class="total" colspan="4">Total Skoor Matriks IAPT 3.0 Berdasarkan Tabel LKPT</td>';
$html .= '<td>' . $skor_iapt . '</td>'; // Menggunakan variabel indeks di luar looping
$html .= '</tr>';

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