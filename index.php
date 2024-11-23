<?php
session_start(); // Memulai session

// Mengatur path aplikasi
define("APP_PATH", "/unkpresent/devops/");

// Autoloading dan inisialisasi model dan controller
require_once 'app/core/Database.php';

// Tangani routing berdasarkan URL yang diterima
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Menangani setiap route
if ($uri == "/unkpresent/devops/") {
    // Halaman Login
    $controller = new \App\Controllers\UserController();
    $controller->login();
} elseif ($uri == "/unkpresent/devops/login") {
    // Halaman Login
    $controller = new \App\Controllers\UserController();
    $controller->login();
} elseif ($uri == "/unkpresent/devops/register") {
    // Halaman Register
    $controller = new \App\Controllers\UserController();
    $controller->register();
} elseif ($uri == "/unkpresent/devops/logout") {
    // Logout
    $controller = new \App\Controllers\UserController();
    $controller->logout();
} elseif ($uri == "/unkpresent/devops/pengeluaran") {
    // Halaman Daftar Pengeluaran
    $controller = new \App\Controllers\PengeluaranController();
    $controller->listPengeluaran();
} elseif ($uri == "/unkpresent/devops/add_pengeluaran") {
    // Halaman Tambah Pengeluaran
    $controller = new \App\Controllers\PengeluaranController();
    $controller->addPengeluaran();
} else {
    // Halaman tidak ditemukan
    echo "Page not found!";
}
?>
