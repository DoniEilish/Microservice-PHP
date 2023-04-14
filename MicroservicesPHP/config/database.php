<?php
class Database
{
    public $db;
    public function getConnection()
    {
        $this->db = null;
        try {
            $this->db = new mysqli('localhost', 'root', '', 'db_kel05', 3308);
        } catch (Exception $e) {
            echo "Tidak bisa Konek ke Database" . $e->getMessage();
        }
        return $this->db;
    }
}