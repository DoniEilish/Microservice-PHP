<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/database.php';
include_once '../../Service/customer.php';

$database = new Database();
$db = $database->getConnection();
$items = new Customer($db);

$records = $items->getAllCustomer();
$itemsCount = mysqli_num_rows($records);
if ($itemsCount > 0) {
    $customerArr = array();
    $customerArr["body"] = array();
    $customerArr["itemCount"] = $itemsCount;
    while ($row = $records->fetch_assoc()) {
        array_push($customerArr["body"], $row);
    }
    echo json_encode($customerArr);
} else {
    http_response_code(400);
    echo json_encode(
        array("Pesan" => "Tidak ditemukan baris data Customer")
    );
}