<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/database.php';
include_once '../../Service/paket.php';

$database = new Database();
$db = $database->getConnection();
$items = new Paket($db);

$records = $items->getAllPaket();
$itemsCount = mysqli_num_rows($records);
if ($itemsCount > 0) {
    $paketArr = array();
    $paketArr["body"] = array();
    $paketArr["itemCount"] = $itemsCount;
    while ($row = $records->fetch_assoc()) {
        array_push($paketArr["body"], $row);
    }
    echo json_encode($paketArr);
} else {
    http_response_code(400);
    echo json_encode(
        array("Pesan" => "Tidak ditemukan baris data Paket")
    );
}
