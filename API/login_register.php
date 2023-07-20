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
    
    // Mengecek jika nomor parameter disediakan oleh GET requess
    if (isset($_GET['nomor'])){
        $nomor = $_GET['nomor'];

        // API endpoint 1 
        $query = 'SELECT NOMOR, NAMA_LENGKAP, NIP, USER_ROLE, EMAIL, NO_TELEPON, FOTO
        FROM USER_PROFILE
        WHERE NOMOR = :nomor';
        $stid = oci_parse($con, $query);
        oci_bind_by_name($stid, ":nomor", $nomor);
        oci_execute($stid);
        
        $data = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);

        oci_free_statement($stid);
        if($data !== false){
            http_response_code(200);
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo json_encode(array('Pesan' => 'Data Tidak Ditemukan'));
        }

    } else {
    // Endpoint Get semua user 
    $query = 'SELECT NOMOR,NAMA_LENGKAP, NIP, USER_ROLE, EMAIL, NO_TELEPON, FOTO
    FROM USER_PROFILE
    ORDER BY 1';
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
                $_SESSION['NOMOR'] = $data['NOMOR'];
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
    }
    // Endpoint Edit Profile (PUT), berdasarkan $_SESSION == USER
    else if ($method === 'put_session'){
        $nomor = $_SESSION['NOMOR'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $nip = $_POST['nip'];
        $email = $_POST['email'];
        $no_telepon = $_POST['no_telepon'];    

        // Update user ke database  
        $query = 'UPDATE USER_PROFILE
                SET NAMA_LENGKAP=:nama_lengkap, NIP=:nip, EMAIL=:email,NO_TELEPON=:no_telepon
                WHERE NOMOR=:nomor';
        $stid = oci_parse($con, $query);
        oci_bind_by_name($stid, ":nomor", $nomor);
        oci_bind_by_name($stid, ":nama_lengkap", $nama_lengkap);
        oci_bind_by_name($stid, ":nip", $nip);
        oci_bind_by_name($stid, ":email", $email);
        oci_bind_by_name($stid, ":no_telepon", $no_telepon);
        $success = oci_execute($stid);

        if($success){
            // Edit Profile berdasarkan session_user jika sukses
            // Ambil Data Terbaru dari database
            $query = 'SELECT *
                        FROM USER_PROFILE 
                        WHERE NOMOR=:nomor';
            $stid = oci_parse($con, $query);
            oci_bind_by_name($stid, ":nomor", $nomor);
            oci_execute($stid);

            // Mengambil hasil query 
            $data = oci_fetch_assoc($stid);

            // Mengupdate $_SESSION dengan data terbaru 
            $_SESSION['NAMA_LENGKAP'] = $data['NAMA_LENGKAP'];
            $_SESSION['NIP'] = $data['NIP'];
            $_SESSION['EMAIL'] = $data['EMAIL'];
            $_SESSION['NO_TELEPON'] = $data['NO_TELEPON'];

            http_response_code(200);
            echo json_encode(array('message' => 'Edit Profile Sukses'));
            // echo json_encode($data);
        } else {
            // Edit Profile berdasarkan session_user gagal
            http_response_code(500);
            echo json_encode(array('message' => 'Edit profile Gagal'));
        }
        oci_free_statement($stid);
    }
    // Endpopint Edit Pengguna PUT untuk $_SESSION['USER_ROLE'] === 'Tim PJM'
    else if ($method === 'put'){
        // request put
        $nomor = $_POST['nomor'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $nip = $_POST['nip'];
        $user_role = $_POST['user_role'];
        $email = $_POST['email'];
        $no_telepon = $_POST['no_telepon'];

        // Update Profile pengguna lain 
        $query = 'UPDATE USER_PROFILE
                SET NAMA_LENGKAP= :nama_lengkap, NIP= :nip, USER_ROLE= :user_role, EMAIL= :email, NO_TELEPON= :no_telepon
                WHERE NOMOR= :nomor';

        $stid = oci_parse($con, $query);
        oci_bind_by_name($stid, ":nomor", $nomor);
        oci_bind_by_name($stid, ":nama_lengkap", $nama_lengkap);
        oci_bind_by_name($stid, ":nip", $nip);
        oci_bind_by_name($stid, ":user_role", $user_role);
        oci_bind_by_name($stid, ":email", $email);
        oci_bind_by_name($stid, ":no_telepon", $no_telepon);
        
        // Eksekusi statement dan check result 
        $success = oci_execute($stid);
        if ($success){
            // response sukses 
            http_response_code(200);
            echo json_encode(array('Pesan' => 'Data Pengguna Berhasil Di Update'));
        } else {
            // Response Error
            http_response_code(500);
            echo json_encode(array('Pesan' => 'Data Gagal Diperbarui'));
        }
        oci_free_statement($stid);
    }
    // Endpoint Delete
    else if ($method === 'delete'){
    // Delete Request
    $nomor = $_POST['nomor'];

    // Delete Statement
    $query = 'DELETE FROM USER_PROFILE
    WHERE NOMOR=:nomor';
    $stid = oci_parse($con, $query);

    // Bind Value 
    oci_bind_by_name($stid, ":nomor", $nomor);

    // Eksekusi Delete Statement dan check result 
    $success = oci_execute($stid);

    if($success){
    // Response sukses
    http_response_code(200);
    header('Location: https://project.mis.pens.ac.id/mis143/View/daftar_pengguna.php');
    // echo json_encode(array('message'=>'Delete User Pengguna Sukses'));
    } else {
        // Delete Gagal
        http_response_code(401);
        echo json_encode(array('message' => 'Delete Pengguna Gagal'));
    }
    oci_free_statement($stid);

}else if ($method === 'logout'){
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