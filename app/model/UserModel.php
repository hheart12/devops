<?php
namespace Model;

use Core\Database;

class UserModel {
    private $conn;
    private $table_name = "users";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createUser($username, $password) {
        $query = "INSERT INTO " . $this->table_name . " (username, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, password_hash($password, PASSWORD_DEFAULT));
        return $stmt->execute();
    }

    public function getUserByUsername($username) {
        $query = "SELECT id, username, password FROM " . $this->table_name . " WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
