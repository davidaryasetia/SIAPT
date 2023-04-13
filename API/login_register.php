<?

include "../includes/func.inc.php";
$con=konekDb($db_user, $db_pass);

// User registration API
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the request body
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    if (isset($data['nama_lengkap']) && isset($data['nip']) && isset($data['email']) && isset($data['kata_sandi']) && isset($data['no_telepon'])) {
        $nama_lengkap = $data['nama_lengkap'];
        $nip = $data['nip'];
        $email = $data['email'];
        $kata_sandi = $data['kata_sandi'];
        $no_telepon = $data['no_telepon'];

        $query = "INSERT INTO register_user (NAMA_LENGKAP, NIP, EMAIL, KATA_SANDI, NO_TELEPON) VALUES (:nama_lengkap, :nip, :email, :kata_sandi, :no_telepon)";
        $stmt = oci_parse($con, $query);
        oci_bind_by_name($stmt, ':nama_lengkap', $nama_lengkap);
        oci_bind_by_name($stmt, ':nip', $nip);
        oci_bind_by_name($stmt, ':email', $email);
        oci_bind_by_name($stmt, ':kata_sandi', $kata_sandi);
        oci_bind_by_name($stmt, ':no_telepon', $no_telepon);

        $result = oci_execute($stmt);
        if ($result) {
            // User registered successfully, return success response
            $response = array('status' => 'success', 'message' => 'User registered successfully.');
        } else {
            // User registration failed, return error response
            $response = array('status' => 'error', 'message' => 'User registration failed.');
        }
        echo json_encode($response);
        oci_free_statement($stmt);
    } else {
        // Invalid request body, return error response
        $response = array('status' => 'error', 'message' => 'Invalid request body.');
        echo json_encode($response);
    }
}

?>