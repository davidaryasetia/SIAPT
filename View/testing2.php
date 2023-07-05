<?php

// File to upload
$filePath = 'file:///C:/Users/User/Desktop/syntax.txt';

// Destination URL
$uploadUrl = 'https://project.mis.pens.ac.id/mis143/includes/contents/user_profile/';

// Create a cURL handle
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $uploadUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);

// Create a CURLFile object for the file
$file = new CURLFile($filePath);

// Set the file parameter
$postFields = array('file' => $file);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);

// Set the timeout to 60 seconds
curl_setopt($curl, CURLOPT_TIMEOUT, 60);

// Execute the request
$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// Check for errors
if ($httpCode == 200) {
    echo "File uploaded successfully!";
} else {
    echo "File upload failed. HTTP Code: " . $httpCode;
}

// Close cURL handle
curl_close($curl);