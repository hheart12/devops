<?php
// Memulai session untuk login dan user validation
session_start();

// Autoloader untuk mengimpor kelas-kelas
require_once('../app/core/Controller.php');
require_once('../app/core/Database.php');
require_once('../app/controllers/UserController.php');
require_once('../app/controllers/PengeluaranController.php');

// Menentukan controller dan action berdasarkan URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'user';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Membuat controller berdasarkan URL
$controllerName = ucfirst($controller) . 'Controller';
$controllerObject = new $controllerName();

// Menjalankan action yang dipilih
if(method_exists($controllerObject, $action)) {
    $controllerObject->$action();
} else {
    echo "Action not found!";
}
?>
