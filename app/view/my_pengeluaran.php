<?php
error_reporting(E_ALL & ~E_NOTICE); // Menyembunyikan pesan notice
session_start(); // Pastikan ini dipanggil hanya sekali

// Redirect if the user is not logged in
if (!isset($_SESSION['user'])) {
    header("Location: /unkpresent/devops/index.php");
    exit();
}

// Include the PengeluaranController
require_once '../controller/PengeluaranController.php';

use Controller\PengeluaranController;

// Instantiate the controller
$pengeluaranController = new PengeluaranController();
$userId = $_SESSION['user']['id'];
$userPengeluaranList = $pengeluaranController->showUserPengeluaran($userId);

// Handle the form submission for updating pengeluaran
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_pengeluaran'])) {
    $pengeluaranController->updatePengeluaran($_POST['id'], $_POST['jumlah'], $_POST['keterangan']);
    header("Location: my_pengeluaran.php"); // Refresh halaman setelah update
    exit();
}

// Handle the form submission for deleting pengeluaran
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_pengeluaran'])) {
    $pengeluaranController->deletePengeluaran($_POST['id']);
    header("Location: my_pengeluaran.php"); // Refresh halaman setelah delete
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengeluaran Anda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/unkpresent/devops/public/css/style.css">
    <style>
                html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

    body {
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #d6e8d5, #b5b8b1); /* Gradient hijau dan silver */
            min-height: 100%;
        }
    .navbar-brand img {
            height: 40px; /* Ukuran logo */
            margin-right: 15px;
        }

    .navbar {
        background: linear-gradient(135deg, #4CAF50, #8d8f85); /* Hijau dan silver untuk navbar */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

    .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

    .navbar-light .navbar-nav .nav-link {
            color: #fff !important;
        }

    .navbar-light .navbar-nav .nav-link:hover {
            color: #d1e0e0 !important;
        }

    
    </style>
</head>

<body class="bg-light">
<nav class="navbar navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/unkpresent/devops/public/image/logoPengeluaran.png" alt="Logo">
                <span class="fw-bold">Catatan Pengeluaran</span>
            </a>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pengeluaran Anda</h1>
        <a href="dashboarduser.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($userPengeluaranList): ?>
                    <?php foreach ($userPengeluaranList as $pengeluaran): ?>
                        <tr>
                            <td><?= htmlspecialchars($pengeluaran['tanggal']); ?></td>
                            <td>Rp <?= htmlspecialchars(number_format($pengeluaran['jumlah'], 2, ',', '.')); ?></td>
                            <td><?= htmlspecialchars($pengeluaran['keterangan']); ?></td>
                            <td>
                                <form method="POST" action="">
                                    <!-- Input hidden untuk ID pengeluaran -->
                                    <input type="hidden" name="id" value="<?= $pengeluaran['id']; ?>">

                                    <!-- Input form untuk jumlah dan keterangan -->
                                    <input type="number" name="jumlah" value="<?= $pengeluaran['jumlah']; ?>" class="form-control form-control-sm" required>
                                    <textarea name="keterangan" class="form-control form-control-sm" required><?= $pengeluaran['keterangan']; ?></textarea>
                                    
                                    <!-- Tombol untuk update pengeluaran -->
                                    <button type="submit" name="update_pengeluaran" class="btn btn-success btn-sm mt-1">Update</button>
                                    <button type="submit" name="delete_pengeluaran" class="btn btn-danger btn-sm w-100 mt-2" onclick="return confirm('Anda yakin ingin menghapus catatan ini?')">Hapus Pengeluaran</button>
                                </form>
                            </td>
                            <td>
                                <!-- Form untuk Hapus Pengeluaran -->
                                <form method="POST" action="">
                                    <!-- Input hidden untuk ID pengeluaran -->
                                    <input type="hidden" name="id" value="<?= $pengeluaran['id']; ?>">
                                    
                                    <!-- Tombol Hapus Pengeluaran -->
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Anda belum memiliki pengeluaran apapun.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
