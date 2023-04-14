<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("access-control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../Service/customer.php';

$database = new Database();
$db = $database->getConnection();
$item = new Customer($db);

// Take ID from URL
$data = json_decode(file_get_contents("php://input"));
// Take Data from URL
$item->id = $data->id;
$item->nik = $data->nik;
$item->nama = $data->nama;
$item->nomor_telepon = $data->nomor_telepon;
$item->username = $data->username;
$item->password = $data->password;
if ($item->updateCustomer()) {
    echo json_encode("Berhasil Mengubah Customer");
} else {
    echo json_encode("Gagal Mengubah Customer");
}
