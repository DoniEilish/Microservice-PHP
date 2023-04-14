<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("access-control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../Service/customer.php';

$database = new Database();
$db = $database->getConnection();
$item = new Customer($db);

// Take ID from URL
$item->id = isset($_GET['id']) ? $_GET['id'] : die();

$item->getCustomer();
if ($item->nama != null) {
    $customerArr = array(
        "id" => $item->id,
        "nik" => $item->nik,
        "nama" => $item->nama,
        "nomor_telepon" => $item->nomor_telepon,
        "username" => $item->username,
        "password" => $item->password
    );
    http_response_code(200);
    echo json_encode($customerArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("Pesan" => "Tidak ditemukan baris data Customer")
    );
}
