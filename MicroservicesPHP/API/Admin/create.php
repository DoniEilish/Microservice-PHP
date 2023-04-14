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

// Take Data from URL
$item->username = $_GET['username'];
$item->password = $_GET['password'];
$item->role = $_GET['role'];
if ($item->createAdmin()) {
    echo json_encode("Berhasil Menambah Admin");
} else {
    echo json_encode("Gagal Menambah Admin");
}