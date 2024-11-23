<?php
namespace Core;

use PDO;
use PDOException;

// Pastikan APP_PATH didefinisikan di tempat yang lebih tepat, misalnya di config.
define("APP_PATH", "http://103.59.95.145/unkpresent/devops/");

class Database {
    // Konstruktor menjadi publik
    public function __construct() {
        try {
            self::$connection = new PDO(
                'mysql:host=localhost;dbname=db_catatpengeluaran', 
                'testadmin', 
                '@Unklab12345'
            );
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}

