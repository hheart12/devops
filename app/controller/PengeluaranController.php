<?php
namespace Controller;

// Correct the constant to __DIR__
require_once __DIR__ . '/../model/PengeluaranModel.php'; // Update the path to use PengeluaranModel

use Model\PengeluaranModel;

class PengeluaranController {
    private $pengeluaranModel;

    public function __construct() {
        $this->pengeluaranModel = new PengeluaranModel();
    }

    // Show all pengeluaran records
    public function showAllPengeluaran() {
        return $this->pengeluaranModel->getAllPengeluaran();
    }

    // Add new pengeluaran record
    public function addPengeluaran($data, $userId) {
        return $this->pengeluaranModel->addPengeluaran($data, $userId);
    }

    // Update pengeluaran record by id
    public function updatePengeluaran($id, $jumlah, $keterangan) {
        return $this->pengeluaranModel->updatePengeluaran($id, $jumlah, $keterangan);
    }

    // Handle request based on POST data
    public function handleRequest() {
        session_start();

        // Check if the form to add new pengeluaran has been submitted
        if (isset($_POST['add_pengeluaran'])) {
            $data = [
                'tanggal' => $_POST['tanggal'],
                'jumlah' => $_POST['jumlah'],
                'keterangan' => $_POST['keterangan']
            ];

            if (isset($_SESSION['user']['id'])) {
                $userId = $_SESSION['user']['id'];

                // Attempt to add the pengeluaran record
                if ($this->addPengeluaran($data, $userId)) {
                    header("Location: ../view/pengeluaran_list.php");
                    exit();
                } else {
                    echo "Gagal menambahkan pengeluaran.";
                }
            } else {
                echo "User belum login.";
            }
        }

        // Handle other types of requests (like updating, etc.) if needed
    }

    // Show pengeluaran for a specific user
    public function showUserPengeluaran($userId) {
        return $this->pengeluaranModel->getPengeluaranByUser($userId);
    }
}

// Instantiate and handle the request
$pengeluaranController = new PengeluaranController();
$pengeluaranController->handleRequest();
