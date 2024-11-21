<?php

class Pengeluaran
{
    private $conn;
    private $table = 'pengeluaran';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get all pengeluaran
    public function getAllPengeluaran()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY tanggal DESC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add new pengeluaran
    public function addPengeluaran($data)
    {
        $query = 'INSERT INTO ' . $this->table . ' (user_id, tanggal, keterangan, jumlah) VALUES (:user_id, :tanggal, :keterangan, :jumlah)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':tanggal', $data['tanggal']);
        $stmt->bindParam(':keterangan', $data['keterangan']);
        $stmt->bindParam(':jumlah', $data['jumlah']);

        return $stmt->execute();
    }

    // Delete pengeluaran
    public function deletePengeluaran($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
