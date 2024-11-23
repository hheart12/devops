<?php

// Autoload file dan inisialisasi
require_once 'app/core/Database.php';

// Mengatur path aplikasi
define("APP_PATH", "http://103.59.95.145/unkpresent/devops/");

// Menangani routing
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Menggunakan controller yang sesuai berdasarkan URL
if ($uri == "/unkpresent/devops/") {
    $controller = new \App\Controllers\UserController();
    $controller->login();
} elseif ($uri == "/unkpresent/devops/register") {
    $controller = new \App\Controllers\UserController();
    $controller->register();
} elseif ($uri == "/unkpresent/devops/logout") {
    $controller = new \App\Controllers\UserController();
    $controller->logout();
} elseif ($uri == "/unkpresent/devops/pengeluaran") {
    $controller = new \App\Controllers\PengeluaranController();
    $controller->listPengeluaran();
} elseif ($uri == "/unkpresent/devops/add_pengeluaran") {
    $controller = new \App\Controllers\PengeluaranController();
    $controller->addPengeluaran();
} else {
    echo "Page not found!";
}

?>
