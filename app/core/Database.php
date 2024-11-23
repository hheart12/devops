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

    // Menyimpan instance tunggal kelas Database
    private static $instance = null;

    // Konstruktor privat untuk mencegah instansiasi langsung
    private function __construct() {}

    // Metode untuk mendapatkan instance dari koneksi database
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Metode untuk mendapatkan koneksi
    public function getConnection() {
        if ($this->conn == null) {
            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
        }
        return $this->conn;
    }

    // Menonaktifkan kloning instance
    private function __clone() {}

    // Menonaktifkan destruktur jika ada
    private function __wakeup() {}
}
