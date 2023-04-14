<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("access-control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../Service/paket.php';

$database = new Database();
$db = $database->getConnection();
$item = new Paket($db);

// Take ID from URL
$data = json_decode(file_get_contents("php://input"));
// Take Data from URL
$item->id = $data->id;
$item->nama = $data->nama;
$item->id_user = $data->id_user;
$item->alamat_tujuan = $data->alamat_tujuan;
$item->no_hp_pengirim = $data->no_hp_pengirim;
$item->no_hp_penerima = $data->no_hp_penerima;
$item->ongkir = $data->ongkir;
$item->deskripsi = $data->deskripsi;
$item->tanggal = $data->tanggal;
if ($item->updatePaket()) {
    echo json_encode("Berhasil Mengubah Paket");
} else {
    echo json_encode("Gagal Mengubah Paket");
}
