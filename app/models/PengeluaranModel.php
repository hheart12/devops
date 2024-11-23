<?php
namespace App\Models;

use Core\Database;

class PengeluaranModel {
    public function getPengeluaran() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM tbl_pengeluaran ORDER BY tanggal DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPengeluaran($tanggal, $jumlah, $keterangan) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO tbl_pengeluaran (tanggal, jumlah, keterangan) VALUES (?, ?, ?)");
        $stmt->execute([$tanggal, $jumlah, $keterangan]);
    }
}
?>
