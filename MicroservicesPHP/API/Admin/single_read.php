<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("access-control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../Service/admin.php';

$database = new Database();
$db = $database->getConnection();
$item = new Admin($db);

// Take ID from URL
$item->id = isset($_GET['id']) ? $_GET['id'] : die();

$item->getAdmin();
if ($item->username != null) {
    $adminarr = array(
        "username" => $item->username,
        "password" => $item->password,
        "role" => $item->role
    );
    http_response_code(200);
    echo json_encode($adminarr);
} else {
    http_response_code(404);
    echo json_encode(
        array("Pesan" => "Tidak ditemukan baris data Admin")
    );
}