<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("access-control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../Service/ruangan.php';

$database = new Database();
$db = $database->getConnection();
$item = new Ruangan($db);

// Take ID from URL
$item->id = isset($_GET['id']) ? $_GET['id'] : die();

$item->getRuangan();
if ($item->nama != null) {
    $ruanganArr = array(
        "id" => $item->id,
        "id_user" => $item->id_user,
        "nama" => $item->nama,
        "keperluan" => $item->keperluan,
        "mulai" => $item->mulai,
        "selesai" => $item->selesai,
        "status" => $item->status
    );
    http_response_code(200);
    echo json_encode($ruanganArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("Pesan" => "Tidak ditemukan baris data Ruangan")
    );
}
