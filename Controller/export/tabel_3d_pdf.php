<?php
// Fetch API response ?query = mahasiswa_asing & mahasiswa_aktif endpoint
$response_rekognisi = file_get_contents('https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php');

// Decode JSON response $response_asing & $response_aktif ke associative array
$rekognisi = json_decode($response_rekognisi, true);

require '../../vendor/autoload.php';
use Dompdf\Dompdf;

// Create a new Dompdf instance
$dompdf = new Dompdf();

// HTML content for PDF
$html = '
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #8DB4E2;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #D9D9D9;
}

</style>
</head>
<body>
<h1>Tabel 3d Rekognisi Dosen</h1>
<table>
<thead>
<tr>
<th>No.</th>
<th>Nama Dosen</th>
<th>Bidang Keahlian</th>
<th>Rekognisi</th>
<th>Tingkat</th>
<th>Tahun Perolehan</th>
</tr>
</thead>
<tbody>';

foreach ($rekognisi as $row) {
    $html .= '<tr>';
    $html .= '<td>' . $row['NO'] . '</td>';
    $html .= '<td>' . $row['NAMA'] . '</td>';
    $html .= '<td>' . $row['BIDANG_KEAHLIAN'] . '</td>';
    $html .= '<td>' . $row['REKOGNISI'] . '</td>';
    $html .= '<td>' . $row['TINGKAT'] . '</td>';
    $html .= '<td>' . $row['TAHUN'] . '</td>';
    $html .= '</tr>';
}

$html .= '
</tbody>
</table>
</body>
</html>';


// Set the file name
$fileName = 'Tabel_3d_Rekognisi_Dosen.pdf';

// Render the HTML to PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Generate the PDF file content
$pdfContent = $dompdf->output();

// Generate a temporary file path
$savePath = tempnam(sys_get_temp_dir(), 'pdf_');

// Save the PDF file to the temporary path
file_put_contents($savePath, $pdfContent);

// Send the PDF file as a download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Content-Length: ' . filesize($savePath));
readfile($savePath);

// Delete the temporary file
unlink($savePath);
exit;
?>