<?php
namespace Core;

use PDO;
use PDOException;

// Pastikan APP_PATH didefinisikan di tempat yang lebih tepat, misalnya di config.
define("APP_PATH", "http://103.59.95.145/unkpresent/devops/");

class Database {
    private static $instance = null;
    private static $connection;

    // Constructor private untuk mencegah instansiasi langsung
    private function __construct() {
        try {
            // Koneksi ke database menggunakan PDO
            self::$connection = new PDO(
                'mysql:host=localhost;dbname=db_catatpengeluaran', 
                'testadmin', 
                '@Unklab12345'
            );
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Tangani exception jika koneksi gagal
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Ubah getConnection menjadi metode statis
    public static function getConnection() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$connection;
    }
}

