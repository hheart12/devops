<?php
require_once('../app/core/Database.php');

class User {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function register($nama, $email, $password) {
        $query = "INSERT INTO users (nama, email, password) VALUES (:nama, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }
}
