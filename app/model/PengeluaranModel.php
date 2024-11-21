<?php
namespace Model;

use Core\Database;

class PengeluaranModel {
    private $conn;
    private $table_name = "pengeluaran";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createPengeluaran($user_id, $tanggal, $keterangan, $jumlah) {
        $query = "INSERT INTO " . $this->table_name . " (user_id, tanggal, keterangan, jumlah) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $tanggal);
        $stmt->bindParam(3, $keterangan);
        $stmt->bindParam(4, $jumlah);
        return $stmt->execute();
    }

    public function getPengeluaranByUser($user_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = ? ORDER BY tanggal DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
