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
$data = json_decode(file_get_contents("php://input"));
// Take Data from URL
$item->id = $data->id;
$item->id_user = $data->id_user;
$item->nama = $data->nama;
$item->keperluan = $data->keperluan;
$item->mulai = $data->mulai;
$item->selesai = $data->selesai;
$item->status = $data->status;
if ($item->updateRuangan()) {
    echo json_encode("Success");
} else {
    echo json_encode("Failed");
}
