<?php
class Customer
{
    private $db;
    private $table = "customer";

    public $id;
    public $nik;
    public $nama;
    public $nomor_telepon;
    public $username;
    public $password;

    // Connect to database
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ambil Semua Data Customer
    public function getAllCustomer()
    {
        $sql = "SELECT * FROM " . $this->table . "";
        $this->result = $this->db->query($sql);
        return $this->result;
    }

    // Ambil 1 Data Customer
    public function getCustomer()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $this->id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        $this->nik = $row['nik'];
        $this->nama = $row['nama'];
        $this->nomor_telepon = $row['nomor_telepon'];
        $this->username = $row['username'];
        $this->password = $row['password'];
    }

    //  Tambah Data Customer
    public function createCustomer()
    {
        $this->nik = htmlspecialchars(strip_tags($this->nik));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->nomor_telepon = htmlspecialchars(strip_tags($this->nomor_telepon));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $sql = "INSERT INTO " . $this->table . " VALUES (null, '" . $this->nik . "', '" . $this->nama . "', '" . $this->nomor_telepon . "', '" . $this->username . "', '" . $this->password . "')";
        $this->db->query($sql);
        if ($this->db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    //  Ubah Customer
    public function updateCustomer()
    {
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nik = htmlspecialchars(strip_tags($this->nik));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->nomor_telepon = htmlspecialchars(strip_tags($this->nomor_telepon));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $sql = "UPDATE " . $this->table . " SET `nik` = '" . $this->nik . "', `nama` = '" . $this->nama . "', `nomor_telepon` = '" . $this->nomor_telepon . "', `username` = '" . $this->username . "', `password` = '" . $this->password . "' WHERE `id` = '" . $this->id . "'";
        $this->db->query($sql);
        if ($this->db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Hapus Customer
    public function deleteCustomer()
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
