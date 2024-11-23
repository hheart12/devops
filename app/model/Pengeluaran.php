<?php
require_once('../app/core/Database.php');

class Pengeluaran {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getByUserId($user_id) {
        $query = "SELECT * FROM pengeluaran WHERE user_id = :user_id ORDER BY tanggal DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($user_id, $tanggal, $jumlah, $keterangan) {
        $query = "INSERT INTO pengeluaran (user_id, tanggal, jumlah, keterangan) VALUES (:user_id, :tanggal, :jumlah, :keterangan)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':keterangan', $keterangan);
        return $stmt->execute();
    }
}
