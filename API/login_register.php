<?php
// Include Koneksi 
include "../includes/func.inc.php";

// Koneksi ke DB
$con = konekDb($db_user, $db_pass);

// Set headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: GET, POST');
header('Access-Control-Allow-Header: Content-Type');
header('Content-Type: application/json');

// Start Session 
session_start();

// Check request method
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    // Endpoint Get semua user 
    $query = 'SELECT NAMA_LENGKAP, NIP, USER_ROLE, EMAIL, NO_TELEPON, FOTO
    FROM USER_PROFILE';
    $stid = oci_parse($con, $query);
    oci_execute($stid);

    $user_profile = array();
    while ($row_user_profile = oci_fetch_array($stid, OCI_ASSOC)){
        $user_profile[] = $row_user_profile;
    }
    http_response_code(200);
    echo json_encode($user_profile);
    oci_free_statement($stid);
}

else if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Check _method key untuk membedakan login dan register
    $method = isset($_POST['_method']) ? $_POST['_method'] : '';

    // Register endpoint 
    if($method === 'register'){
        $nama_lengkap = $_POST['nama_lengkap'];
        $nip = $_POST['nip'];
        $user_role = $_POST['user_role'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $no_telepon = $_POST['no_telepon'];

        // Check jika email tersedia
        $queryCheckEmail = 'SELECT COUNT(*) FROM USER_PROFILE WHERE EMAIL=:email';
        $stidCheckEmail = oci_parse($con, $queryCheckEmail);
        oci_bind_by_name($stidCheckEmail, ":email", $email);
        oci_execute($stidCheckEmail);
        $rowEmail = oci_fetch_array($stidCheckEmail, OCI_ASSOC);
        $emailCount = $rowEmail['COUNT(*)'];

        if($emailCount > 0){
            // Email tersedia, registrasi failed
            http_response_code(400);
            echo json_encode(array('message' => 'Email Sudah Tersedia'));
        } else {
            // Enskripsi Password dengan menggunakan hash
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data ke Database 
            $queryRegister = 'INSERT INTO USER_PROFILE (NOMOR, NAMA_LENGKAP, NIP, USER_ROLE, EMAIL, PASSWORD, NO_TELEPON)
            VALUES(USER_PROFILE_SEQ.NEXTVAL, :nama_lengkap, :nip, :user_role, :email, :password, :no_telepon)';
            $stidRegister = oci_parse($con, $queryRegister);
            oci_bind_by_name($stidRegister, ":nama_lengkap", $nama_lengkap);
            oci_bind_by_name($stidRegister, ":nip", $nip);
            oci_bind_by_name($stidRegister, ":user_role", $user_role);
            oci_bind_by_name($stidRegister, ":email", $email);
            oci_bind_by_name($stidRegister, ":password", $hashedPassword);
            oci_bind_by_name($stidRegister, ":no_telepon", $no_telepon);
            $success = oci_execute($stidRegister);

            if($success){
                // Registrasi Sukses
                http_response_code(200);
                echo json_encode(array('message' => 'Registrasi Sukses'));
            } else {
                // Registrasi Gagal
                http_response_code(500);
                echo json_encode(array('message' => 'Registrasi Gagal'));
            }
        }
        oci_free_statement($stidCheckEmail);
        oci_free_statement($stidRegister);
    }
    // Endpoint Login 
    else if ($method === 'login'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check Jika email tersedia
        $queryCheckEmail = 'SELECT * FROM USER_PROFILE WHERE EMAIL = :email';
        $stidCheckEmail = oci_parse($con, $queryCheckEmail);
        oci_bind_by_name($stidCheckEmail, ":email", $email);
        oci_execute($stidCheckEmail);
        $data = oci_fetch_array($stidCheckEmail, OCI_ASSOC);

        if($data !== false){
            // Check Password
            if(password_verify($password, $data['PASSWORD'])){
                // Set session data
                $_SESSION['NAMA_LENGKAP'] = $data['NAMA_LENGKAP'];
                $_SESSION['NIP'] = $data['NIP'];
                $_SESSION['USER_ROLE'] = $data['USER_ROLE'];
                $_SESSION['EMAIL'] = $data['EMAIL'];
                $_SESSION['NO_TELEPON'] = $data['NO_TELEPON'];

                // Login Sukses
                http_response_code(200);
                echo json_encode(array('message' => 'Login Sukses', 'user' => $data));
            } else {
                // Invalid Password
                http_response_code(401);
                echo json_encode(array('message' => 'Invalid Password'));
            }
        } else {
            // Invalid Email
            http_response_code(401);
            echo json_encode(array('message' => 'Invalid Email'));
        }
        oci_free_statement($stidCheckEmail); 
} else if ($method === 'logout'){
    // Hancurkan Session 
    session_destroy();
    http_response_code(200);
    echo json_encode(array('message' => 'Logout Sukses'));
} else {
    // Ivalid request method 
    http_response_code(405);
    echo json_encode(array('message' => 'Request Method Tidak Diijinkan'));
}
}

// Close Koneksi 
oci_close($con);
?>