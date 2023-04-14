<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/database.php';
include_once '../../Service/admin.php';

$database = new Database();
$db = $database->getConnection();
$items = new Admin($db);

$records = $items->getAllAdmin();
$itemsCount = mysqli_num_rows($records);
if ($itemsCount > 0) {
    $adminArr = array();
    $adminArr["body"] = array();
    $adminArr["itemCount"] = $itemsCount;
    while ($row = $records->fetch_assoc()) {
        array_push($adminArr["body"], $row);
    }
    echo json_encode($adminArr);
} else {
    http_response_code(400);
    echo json_encode(
        array("Pesan" => "Tidak ditemukan baris data Admin")
    );
}