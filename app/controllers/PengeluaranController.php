<?php
namespace Controller;

use Model\PengeluaranModel;

class PengeluaranController {

    public function tambahPengeluaran() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: " . APP_PATH . "index.php");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tanggal = $_POST['tanggal'];
            $keterangan = $_POST['keterangan'];
            $jumlah = $_POST['jumlah'];
            $user_id = $_SESSION['user_id'];

            $pengeluaranModel = new PengeluaranModel();
            if ($pengeluaranModel->createPengeluaran($user_id, $tanggal, $keterangan, $jumlah)) {
                header("Location: " . APP_PATH . "index.php");
            } else {
                echo "Failed to add pengeluaran!";
            }
        }
        require_once '../view/tambahpengeluaran.php';
    }

    public function daftarPengeluaran() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: " . APP_PATH . "index.php");
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $pengeluaranModel = new PengeluaranModel();
        $pengeluaran = $pengeluaranModel->getPengeluaranByUser($user_id);
        require_once '../view/pengeluaran.php';
    }
}
