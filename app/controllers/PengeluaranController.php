<?php
namespace App\Controllers;

use App\Models\PengeluaranModel;

class PengeluaranController {
    public function listPengeluaran() {
        // Mengambil data pengeluaran dari model
        $pengeluaranModel = new PengeluaranModel();
        $pengeluaran = $pengeluaranModel->getPengeluaran();

        // Menampilkan view dengan data pengeluaran
        include_once 'app/views/pengeluaran_list.php';
    }

    public function addPengeluaran() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
            $keterangan = $_POST['keterangan'];

            // Proses penambahan pengeluaran
            $pengeluaranModel = new PengeluaranModel();
            $pengeluaranModel->addPengeluaran($tanggal, $jumlah, $keterangan);

            // Redirect ke halaman pengeluaran
            header("Location: " . APP_PATH . "pengeluaran");
            exit();
        }
        // Tampilkan form tambah pengeluaran
        include_once 'app/views/add_pengeluaran.php';
    }
}
?>
