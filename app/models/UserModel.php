<?php
namespace App\Models;

use Core\Database;

class UserModel {
    public function checkLogin($email, $password) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM tbl_user WHERE email = ? AND password = ?");
        $stmt->execute([$email, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registerUser($nama, $email, $password) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO tbl_user (nama, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$nama, $email, password_hash($password, PASSWORD_DEFAULT)]);
    }
}
?>
