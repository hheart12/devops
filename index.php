<?php
// Autoload classes (pastikan Anda sudah menambahkan autoloader atau manual require_once sesuai dengan struktur folder)
spl_autoload_register(function ($class) {
    $file = str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Menggunakan namespace Controller untuk akses controller
use controllers\UserController;
use controllers\PengeluaranController;

session_start();

// Definisikan variabel aksi
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Menangani aksi berdasarkan parameter di URL
switch ($action) {
    case 'login':
        $userController = new UserController();
        $userController->login();
        break;
        
    case 'register':
        $userController = new UserController();
        $userController->register();
        break;
        
    case 'logout':
        $userController = new UserController();
        $userController->logout();
        break;
        
    case 'tambahPengeluaran':
        $pengeluaranController = new PengeluaranController();
        $pengeluaranController->tambahPengeluaran();
        break;
        
    case 'pengeluaran':
        $pengeluaranController = new PengeluaranController();
        $pengeluaranController->daftarPengeluaran();
        break;
        
    default:
        // Default action jika tidak ada aksi yang dipilih
        if (isset($_SESSION['user_id'])) {
            // Jika sudah login, tampilkan daftar pengeluaran
            $pengeluaranController = new PengeluaranController();
            $pengeluaranController->daftarPengeluaran();
        } else {
            // Jika belum login, arahkan ke login page
            $userController = new UserController();
            $userController->login();
        }
        break;
}
