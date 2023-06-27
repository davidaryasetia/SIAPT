<?php
// ...

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // mengambil nilai dari input form
    $nama = $_POST['nama'];
    $bidang_keahlian = $_POST['bidang_keahlian'];
    $rekognisi = $_POST['rekognisi'];
    $tingkat = $_POST['tingkat'];
    $tahun = $_POST['tahun'];

    // Data yang akan dikirimkan dalam format array
    $data = array(
        'nama' => $nama,
        'bidang_keahlian' => $bidang_keahlian,
        'rekognisi' => $rekognisi,
        'tingkat' => $tingkat,
        'tahun' => $tahun
    );

    // Mengubah data menjadi string json
    $json_data = json_encode($data);

    // Mengirimkan data ke endpoint API menggunakan fungsi file_get_contents()
    $url = 'https://project.mis.pens.ac.id/mis143/API/3.d_rekognisi_dosen.php';
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => $json_data
        )
    );
    $context = stream_context_create($options);

    // Variabel Respons untuk menampung logic response data
    $response = file_get_contents($url, false, $context);

    // Memeriksa response dari API
    if ($response !== false) {
        $responseData = json_decode($response, true);
        if (isset($responseData['Pesan'])) {
            // Menampilkan pesan sukses
            echo '<script>alert("Sukses: ' . $responseData['Pesan'] . '"); redirectToRekognisiDosen();</script>';

            // Import data yang dipost ke dalam file Excel
            $excelFilePath = 'path/to/your/excel/file.xlsx';
            $spreadsheet = IOFactory::load($excelFilePath);
            $worksheet = $spreadsheet->getActiveSheet();
            $highestRow = $worksheet->getHighestRow();

            // Ambil nilai dari kolom Excel dan simpan ke database
            for ($row = 2; $row <= $highestRow; $row++) {
                $excelNama = $worksheet->getCell('A' . $row)->getValue();
                $excelBidangKeahlian = $worksheet->getCell('B' . $row)->getValue();
                $excelRekognisi = $worksheet->getCell('C' . $row)->getValue();
                $excelTingkat = $worksheet->getCell('D' . $row)->getValue();
                $excelTahun = $worksheet->getCell('E' . $row)->getValue();

                // Simpan nilai-nilai ke dalam database melalui endpoint API
                $postData = array(
                    'nama' => $excelNama,
                    'bidang_keahlian' => $excelBidangKeahlian,
                    'rekognisi' => $excelRekognisi,
                    'tingkat' => $excelTingkat,
                    'tahun' => $excelTahun
                );

                // Mengubah data menjadi string json
                $jsonPostData = json_encode($postData);

                // Mengirimkan data ke endpoint API menggunakan fungsi file_get_contents()
                $options = array(
                    'http' => array(
                        'method' => 'POST',
                        'header' => 'Content-Type: application/json',
                        'content' => $jsonPostData
                    )
                );
                $context = stream_context_create($options);

                // Variabel Respons untuk menampung logic response data
                $response = file_get_contents($url, false, $context);

                // Memeriksa response dari API
                if ($response !== false) {
                    $responseData = json_decode($response, true);
                    if (isset($responseData['Pesan'])) {
                        // Data berhasil disimpan ke dalam database
                        echo "Data berhasil disimpan: " . $responseData['Pesan'] . "<br>";
                    } else {
                        // Gagal menyimpan data ke dalam database
                        echo "Gagal menyimpan data: " . $response . "<br>";
                    }
                } else {
                    // Tampilkan pop up error jika tidak dapat terhubung ke API 
                    echo "Gagal terhubung ke API";
                }
            }
        } else {
            // Tampilkan pop up error jika respon API tidak valid
            echo '<script>alert("Gagal: Respon API tidak valid");</script>';
        }
    } else {
        // Tampilkan pop up error jika tidak dapat terhubung ke API 
        echo '<script>alert("Gagal: Tidak dapat terhubung ke API");</script>';
    }
}
?>