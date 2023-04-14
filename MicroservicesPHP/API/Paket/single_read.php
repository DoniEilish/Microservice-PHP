<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("access-control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../Service/paket.php';

$database = new Database();
$db = $database->getConnection();
$item = new Paket($db);

// Take ID from URL
$item->id = isset($_GET['id']) ? $_GET['id'] : die();

$item->getPaket();
if ($item->nama != null) {
    $paketArr = array(
        "id" => $item->id,
        "nama" => $item->nama,
        "id_user" => $item->id_user,
        "alamat_tujuan" => $item->alamat_tujuan,
        "no_hp_pengirim" => $item->no_hp_pengirim,
        "no_hp_penerima" => $item->no_hp_penerima,
        "ongkir" => $item->ongkir,
        "deskripsi" => $item->deksripsi,
        "tanggal" => $item->tanggal
    );
    http_response_code(200);
    echo json_encode($paketArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("Pesan" => "Tidak ditemukan baris data Paket")
    );
}
