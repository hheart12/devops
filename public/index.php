<?php
session_start(); // Memulai session

// Mengatur path aplikasi
define("APP_PATH", "/unkpresent/devops/");

// Autoloading dan inisialisasi model dan controller
require_once 'app/core/Database.php';

// Tangani routing berdasarkan URL yang diterima
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Menangani setiap route
switch ($uri) {
    case "/unkpresent/devops/":
    case "/unkpresent/devops/login.php":
        // Halaman Login
        $controller = new \App\Controllers\UserController();
        $controller->login();
        break;

    case "/unkpresent/devops/register.php":
        // Halaman Register
        $controller = new \App\Controllers\UserController();
        $controller->register();
        break;

    case "/unkpresent/devops/logout.php":
        // Logout
        $controller = new \App\Controllers\UserController();
        $controller->logout();
        break;

    case "/unkpresent/devops/pengeluaran":
        // Halaman Daftar Pengeluaran
        $controller = new \App\Controllers\PengeluaranController();
        $controller->listPengeluaran();
        break;

    case "/unkpresent/devops/add_pengeluaran":
        // Halaman Tambah Pengeluaran
        $controller = new \App\Controllers\PengeluaranController();
        $controller->addPengeluaran();
        break;

    default:
        // Halaman tidak ditemukan
        echo "Page not found!";
        break;
}
?>
