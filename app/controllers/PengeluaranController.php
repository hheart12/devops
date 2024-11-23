<?php
require_once('../app/models/Pengeluaran.php');
require_once('../app/core/Controller.php');

class PengeluaranController extends Controller {
    public function index() {
        // Mengecek session
        if (!isset($_SESSION['user_id'])) {
            header('Location: /devops/?controller=user&action=login');
            exit();
        }

        $pengeluaran = new Pengeluaran();
        $data = $pengeluaran->getByUserId($_SESSION['user_id']);
        $this->view('pengeluaran', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tanggal = $_POST['tanggal'];
            $jumlah = $_POST['jumlah'];
            $keterangan = $_POST['keterangan'];
            $user_id = $_SESSION['user_id'];

            $pengeluaran = new Pengeluaran();
            if ($pengeluaran->add($user_id, $tanggal, $jumlah, $keterangan)) {
                $_SESSION['success'] = "Pengeluaran berhasil ditambahkan!";
                header('Location: /devops/?controller=pengeluaran&action=index');
            } else {
                $_SESSION['error'] = "Gagal menambahkan pengeluaran!";
            }
        }

        $this->view('add_pengeluaran');
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /devops/?controller=user&action=login');
        exit();
    }
}
