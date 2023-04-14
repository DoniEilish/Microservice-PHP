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

if ($item->deleteRuangan()) {
    echo json_encode("Berhasil Menghapus Ruangan");
} else {
    echo json_encode("Gagal Menghapus Ruangan");
}
