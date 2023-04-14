<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/database.php';
include_once '../../Service/ruangan.php';

$database = new Database();
$db = $database->getConnection();
$items = new Ruangan($db);

$records = $items->getAllRuangan();
$itemsCount = mysqli_num_rows($records);
if ($itemsCount > 0) {
    $ruanganArr = array();
    $ruanganArr["body"] = array();
    $ruanganArr["itemCount"] = $itemsCount;
    while ($row = $records->fetch_assoc()) {
        array_push($ruanganArr["body"], $row);
    }
    echo json_encode($ruanganArr);
} else {
    http_response_code(400);
    echo json_encode(
        array("Pesan" => "Tidak ditemukan baris data Paket")
    );
}
