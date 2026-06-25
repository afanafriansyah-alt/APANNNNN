<?php
class Database {
    private $host = "localhost";
    private $db_name = "db_reservasi_pbo_trpl1b_afanafriansyah"; 
    private $username = "root"; 
    private $password = ""; 
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // Mengatur mode error PDO menjadi exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>