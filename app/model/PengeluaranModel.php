<?php
namespace Model;

require_once __DIR__ . '/../core/Database.php'; // Ensure the path is correct

use Core\Database;
use PDO;

class PengeluaranModel {
    private $conn;
    private $table_name = "tbl_pengeluaran";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Get all records from tbl_pengeluaran
    public function getAllPengeluaran() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get records by user_id
    public function getPengeluaranByUser($userId) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new record to tbl_pengeluaran
    public function addPengeluaran($data, $userId) {
        $query = "INSERT INTO " . $this->table_name . " (tanggal, jumlah, keterangan, user_id) 
                VALUES (:tanggal, :jumlah, :keterangan, :user_id)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':tanggal', $data['tanggal']);
        $stmt->bindParam(':jumlah', $data['jumlah']);
        $stmt->bindParam(':keterangan', $data['keterangan']);
        $stmt->bindParam(':user_id', $userId);

        return $stmt->execute();
    }

    // Update an existing record by id (e.g., to update 'jumlah' or 'keterangan')
    public function updatePengeluaran($id, $jumlah, $keterangan) {
        $query = "UPDATE " . $this->table_name . " SET jumlah = :jumlah, keterangan = :keterangan WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':keterangan', $keterangan);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    // Menghapus barang berdasarkan ID
    public function deletePengeluaran($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
