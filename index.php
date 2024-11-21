<?php
// Autoload untuk semua kelas
spl_autoload_register(function ($class) {
    require_once './app/core/' . $class . '.php';
});

// Koneksi database
$database = new Core\Database();
$db = $database->getConnection();

// Include controller dan model yang dibutuhkan
require_once './app/controllers/PengeluaranController.php';
require_once './app/models/Pengeluaran.php';

// Inisialisasi controller dengan model
$model = new Pengeluaran($db);
$controller = new PengeluaranController($model);

// Routing berdasarkan parameter URL
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'list';

// Menangani request berdasarkan URL
if ($url == 'list') {
    $controller->index(); // Menampilkan daftar pengeluaran
} elseif ($url == 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->add($_POST); // Menambahkan pengeluaran baru
} elseif (strpos($url, 'delete/') === 0) {
    $id = explode('/', $url)[1]; // Mendapatkan ID dari URL
    $controller->delete($id); // Menghapus pengeluaran
} else {
    echo "Halaman tidak ditemukan.";
}
