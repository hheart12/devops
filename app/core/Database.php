<?php
namespace Core;

use PDO;
use PDOException;

// Pastikan APP_PATH didefinisikan di tempat yang lebih tepat, misalnya di config.
define("APP_PATH", "http://103.59.95.145/unkpresent/devops/");

class Database {

    
    private $host = 'localhost';
    private $db_name = 'db_pengeluaran';
    private $username = 'testadmin';
    private $password = '@Unklab12345';
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

