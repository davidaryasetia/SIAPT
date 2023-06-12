<?php
// Include Koneksi
include "../includes/func.inc.php";

// Set Header
header('Access-Control-Allow-Origin: *');
header('content-type:application/json');

class koneksi{
    public $con;
    public $db_user ="PA0001";
    public $db_pass ="726987";

    public function __construct(){
        // Koneksi ke DB 
        $this->con = $this->konekDb($this->db_user, $this->db_pass);
    }

    public function konekDb($db_user, $db_pass){
        // memanggil fungsi koneDb dan return koneksi
        return konekDb($db_user, $db_pass);
    }

    public function executeQuery($query) {
        // Eksekusi SQL Query menggunakan oci_parse dan oci_execute function
        $stid = oci_parse($this->con, $query);
        oci_execute($stid);

        // Inisialisasi array kosong untuk fetched data
        $data = array();

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            $data[] = $row;
        }
        oci_free_statement($stid);

        // Close koneksi DB
        oci_close($this->con);

        // Return Fetched Data
        return $data;
    }
}