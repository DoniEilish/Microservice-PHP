<?php
class Paket
{
    private $db;
    private $table = "paket";

    public $id;
    public $id_user;
    public $nama;
    public $alamat_tujuan;
    public $no_hp_pengirim;
    public $no_hp_penerima;
    public $ongkir;
    public $deksripsi;
    public $tanggal;

    // Connect to database
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ambil Semua Data Paket
    public function getAllPaket()
    {
        $sql = "SELECT * FROM " . $this->table . "";
        $this->result = $this->db->query($sql);
        return $this->result;
    }

    // Ambil 1 Data Paket
    public function getPaket()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $this->id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        $this->nama = $row['nama'];
        $this->id_user = $row['id_user'];
        $this->alamat_tujuan = $row['alamat_tujuan'];
        $this->no_hp_pengirim = $row['no_hp_pengirim'];
        $this->no_hp_penerima = $row['no_hp_penerima'];
        $this->ongkir = $row['ongkir'];
        $this->deskripsi = $row['deskripsi'];
        $this->tanggal = $row['tanggal'];
    }

    //  Tambah Data Paket
    public function createPaket()
    {
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->alamat_tujuan = htmlspecialchars(strip_tags($this->alamat_tujuan));
        $this->no_hp_pengirim = htmlspecialchars(strip_tags($this->no_hp_pengirim));
        $this->no_hp_penerima = htmlspecialchars(strip_tags($this->no_hp_penerima));
        $this->ongkir = htmlspecialchars(strip_tags($this->ongkir));
        $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
        $sql = "INSERT INTO " . $this->table . " VALUES (null, '" . $this->nama . "', " . $this->id_user . ",'" . $this->alamat_tujuan . "', '" . $this->no_hp_pengirim . "', '" . $this->no_hp_penerima . "', " . $this->ongkir . ", '" . $this->deskripsi . "', '" . $this->tanggal . "')";
        $this->db->query($sql);
        if ($this->db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    //  Ubah Paket
    public function updatePaket()
    {
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->alamat_tujuan = htmlspecialchars(strip_tags($this->alamat_tujuan));
        $this->no_hp_pengirim = htmlspecialchars(strip_tags($this->no_hp_pengirim));
        $this->no_hp_penerima = htmlspecialchars(strip_tags($this->no_hp_penerima));
        $this->ongkir = htmlspecialchars(strip_tags($this->ongkir));
        $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
        $this->tanggal = htmlspecialchars(strip_tags($this->tanggal));
        $sql = "UPDATE " . $this->table . " SET `id_user` = " . $this->id_user . ", `nama` = '" . $this->nama . "', `alamat_tujuan` = '" . $this->alamat_tujuan . "', `no_hp_pengirim` = '" . $this->no_hp_pengirim . "', `no_hp_penerima` = '" . $this->no_hp_penerima . "', `ongkir` = " . $this->ongkir . ", `deskripsi` = '" . $this->deskripsi . "', `tanggal` = '" . $this->tanggal . "' WHERE `id` = '" . $this->id . "'";
        $this->db->query($sql);
        if ($this->db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Hapus Paket
    public function deletePaket()
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = " . $this->id;
        $this->db->query($sql);
        if ($this->db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
