<?php
class Ruangan
{
    private $db;
    private $table = "ruangan";

    public $id;
    public $id_user;
    public $nama;
    public $keperluan;
    public $mulai;
    public $selesai;
    public $status;

    // Connect to database
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ambil Semua Data Ruangan
    public function getAllRuangan()
    {
        $sql = "SELECT * FROM " . $this->table . "";
        $this->result = $this->db->query($sql);
        return $this->result;
    }

    // Ambil 1 Data Ruangan
    public function getRuangan()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $this->id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        $this->nama = $row['nama'];
        $this->id_user = $row['id_user'];
        $this->keperluan = $row['keperluan'];
        $this->mulai = $row['mulai'];
        $this->selesai = $row['selesai'];
        $this->status = $row['status'];
    }

    //  Tambah Data Ruangan
    public function createRuangan()
    {
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->keperluan = htmlspecialchars(strip_tags($this->keperluan));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $sql = "INSERT INTO " . $this->table . " VALUES (null, " . $this->id_user . ", '" . $this->nama . "', '" . $this->keperluan . "', '" . $this->mulai . "', '" . $this->selesai . "', '" . $this->status . "')";
        $this->db->query($sql);
        if ($this->db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    //  Ubah Ruangan
    public function updateRuangan()
    {
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->keperluan = htmlspecialchars(strip_tags($this->keperluan));
        $this->mulai = htmlspecialchars(strip_tags($this->mulai));
        $this->selesai = htmlspecialchars(strip_tags($this->selesai));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $sql = "UPDATE " . $this->table . " SET `id_user` = '" . $this->id_user . "', `nama` = '" . $this->nama . "', `keperluan` = '" . $this->keperluan . "', `mulai` = '" . $this->mulai . "', `selesai` = '" . $this->selesai . "', `status` = '" . $this->status . "' WHERE `id` = '" . $this->id . "'";
        $this->db->query($sql);
        if ($this->db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Hapus Ruangan
    public function deleteRuangan()
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
