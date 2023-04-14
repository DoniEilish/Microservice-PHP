<?php
class Admin
{
    private $db;
    private $table = "admin";

    public $id;
    public $username;
    public $password;
    public $role;

    // Connect to database
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ambil Semua Data Admin
    public function getAllAdmin()
    {
        $sql = "SELECT * FROM " . $this->table . "";
        $this->result = $this->db->query($sql);
        return $this->result;
    }

    // Ambil 1 Data Admin
    public function getAdmin()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $this->id;
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        $this->username = $row['username'];
        $this->password = $row['password'];
        $this->role = $row['role'];
    }

    //  Tambah Data Admin
    public function createAdmin()
    {
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $sql = "INSERT INTO " . $this->table . " VALUES (null, '" . $this->username . "', '" . $this->password . "', '" . $this->role . "')";
        $this->db->query($sql);
        if ($this->db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    //  Ubah Admin
    public function updateAdmin()
    {
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $sql = "UPDATE " . $this->table . " SET `username` = '" . $this->username . "', `password` = '" . $this->password . "', `role` = '" . $this->role . "' WHERE `id` = '" . $this->id . "'";
        $this->db->query($sql);
        if ($this->db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Hapus Admin
    public function deleteAdmin()
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
