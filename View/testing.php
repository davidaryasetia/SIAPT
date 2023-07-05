<?php
use phpseclib3\Net\SFTP;

require '../vendor/autoload.php'; // Assuming you have autoloaded the library

// SFTP connection settings
$host = 'pve.mis.pens.ac.id';
$port = 10143;
$username = 'www';
$password = '123123';

// Local file path and remote destination path
$remoteDestinationPath = '/home/www/includes/contents/user_profile/';

// Folder URL to retrieve the image path
$folderURL = 'https://project.mis.pens.ac.id/mis143/includes/contents/user_profile/';

// Database connection settings
$db_user = 'PA0001';
$db_pass = '726987';
$db_host = '10.252.209.213/orcl.mis.pens.ac.id';

// Set default timeout value
$timeout = 1000;

// Variable to store the image path
$imagePath = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileToUpload'])) {
    $file = $_FILES['fileToUpload'];
    $localFilePath = $file['tmp_name'];
    $fileName = $file['name'];

    try {
        // Connect to the SFTP server
        $sftp = new SFTP($host, $port);

        // Set the timeout (in seconds)
        $sftp->setTimeout($timeout);

        if (!$sftp->login($username, $password)) {
            throw new Exception('Login failed');
        }

        // Generate a unique filename on the remote server
        $remoteFileName = uniqid() . '_' . $fileName;

        // Upload the file
        $remoteFilePath = $remoteDestinationPath . $remoteFileName;
        if (!$sftp->put($remoteFilePath, $localFilePath, SFTP::SOURCE_LOCAL_FILE)) {
            throw new Exception('File upload failed');
        }

        // Insert the file information into the database
        $conn = oci_connect($db_user, $db_pass, $db_host);
        $sql = "INSERT INTO image (filename) VALUES (:filename)";
        $stmt = oci_parse($conn, $sql);
        oci_bind_by_name($stmt, ':filename', $remoteFileName);
        oci_execute($stmt);

        // Set the image path for display
        $imagePath = $folderURL . $remoteFileName;

        echo 'File uploaded successfully and saved to the database!';
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        print_r($sftp->getSFTPErrors());
    }
}

// Retrieve the image path from the database for display
try {
    $conn = oci_connect($db_user, $db_pass, $db_host);
    $sql = "SELECT filename FROM (SELECT filename FROM image ORDER BY id DESC) WHERE ROWNUM = 1";
    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);
    $result = oci_fetch_assoc($stmt);

    if ($result) {
        $imageFileName = $result['FILENAME'];
        $imagePath = $folderURL . $imageFileName;
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>File Upload</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" name="submit">
    </form>

    <?php if (!empty($imagePaths)) : ?>
    <h2>Uploaded Images:</h2>
    <div>
        <?php foreach ($imagePaths as $imagePath) : ?>
        <img width="100" src="<?php echo $imagePath; ?>" alt="Uploaded Image">
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</body>

</html>