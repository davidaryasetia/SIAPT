<?php

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    
    // Remote server SFTP credentials
    $sftp_host = 'pve.mis.pens.ac.id';
    $sftp_port = 10143;
    $sftp_username = 'www';
    $sftp_password = '123123';
    $sftp_remote_dir = '/home/www/includes/contents/user_profile/';

    // Load vendor autoload
    require_once '../vendor/autoload.php';

    // Connect to remote server using SFTP
    $sftp = new \phpseclib\Net\SFTP($sftp_host, $sftp_port);
    if (!$sftp->login($sftp_username, $sftp_password)) {
        die('SFTP login failed!');
    }

    // Upload the file to the remote server
    if ($sftp->put($sftp_remote_dir . $filename, $tempname, \phpseclib\Net\SFTP::SOURCE_LOCAL_FILE)) {
        echo "<h3>Image uploaded successfully!</h3>";
    } else {
        echo "<h3>Failed to upload image!</h3>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
</head>

<body>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
</body>

</html>