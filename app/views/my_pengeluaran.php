<?php
namespace Controller;

require_once __DIR__ . '/../model/PengeluaranModel.php'; // Pastikan path ini benar

use Model\PengeluaranModel;

class PengeluaranController {
    private $PengeluaranModel;

    public function __construct() {
        $this->PengeluaranModel = new PengeluaranModel();
    }

    public function showAllPengeluaran() {
        return $this->PengeluaranModel->getAllPengeluaran();
    }

    // public function addPengeluaran($data, $userId) {
    //     return $this->PengeluaranModel->addPengeluaran($data, $userId);
    // }

    // public function updatePengeluaran($id, $status) {
    //     return $this->PengeluaranModel->updatePengeluaran($id, $status);
    // }

    // public function handleRequest() {
    //     session_start();

    //     if (isset($_POST['add_Pengeluaran'])) {
    //         $data = [
    //             'nama' => $_POST['nama'],
    //             'harga' => $_POST['harga'],
    //             'kondisi' => $_POST['kondisi'],
    //             'jenis' => $_POST['jenis'],
    //             'status' => $_POST['status'],
    //             'nomor_penjual' => $_POST['nomor_penjual'],
    //             'deskripsi' => $_POST['deskripsi']
    //         ];



    //         if (isset($_SESSION['user']['id'])) {
    //             $userId = $_SESSION['user']['id'];

    //             if ($this->addPengeluaran($data, $userId)) {
    //                 header("Location: ../view/Pengeluaran_list.php");
    //                 exit();
    //             } else {
    //                 echo "Gagal menambahkan Pengeluaran.";
    //             }
    //         } else {
    //             echo "User belum login.";
    //         }
    //     }
    // }

    // public function showUserPengeluaran($userId) {
    //     return $this->PengeluaranModel->getPengeluaranByUser($userId);
    // }

    // // PengeluaranController.php
    // public function deletePengeluaran($id) {
    //     $PengeluaranModel = new PengeluaranModel();
    //     return $PengeluaranModel->deletePengeluaran($id);
    // }
}

$PengeluaranController = new PengeluaranController();
// $PengeluaranController->handleRequest();
