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
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('/unkpresent/devops/public/image/background.jpg') no-repeat center center/cover;
            color: #fff;
            min-height: 100%;
        }

        .navbar {
            background: rgba(76, 175, 80, 0.9);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-brand img {
            height: 60px;
        }

        .container {
            flex: 1;
            padding: 20px;
        }

        .table {
            background-color: rgba(255, 255, 255, 0.8); /* Transparansi pada tabel */
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .table th, .table td {
            color: #333;
        }

        h1 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            color: #fff;
        }

        .btn {
            font-weight: bold;
        }

        .btn-secondary {
            background-color: rgba(108, 117, 125, 0.9);
        }

        .footer {
            text-align: center;
            color: #fff;
            font-size: 0.9rem;
            margin-top: auto;
            padding: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/unkpresent/devops/public/image/logoPengeluaran.png" alt="Logo">
                Catatan Pengeluaran
            </a>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mt-5">
        <h1>Pengeluaran Anda</h1>
        <a href="dashboarduser.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <table class="table table-striped table-hover">
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
                                    <input type="hidden" name="id" value="<?= $pengeluaran['id']; ?>">
                                    <input type="number" name="jumlah" value="<?= $pengeluaran['jumlah']; ?>" class="form-control form-control-sm" required>
                                    <textarea name="keterangan" class="form-control form-control-sm" required><?= $pengeluaran['keterangan']; ?></textarea>
                                    <button type="submit" name="update_pengeluaran" class="btn btn-success btn-sm mt-1">Update</button>
                                    <button type="submit" name="delete_pengeluaran" class="btn btn-danger btn-sm mt-1" onclick="return confirm('Anda yakin ingin menghapus catatan ini?')">Hapus</button>
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

    <!-- Footer -->
    <footer class="footer">
        &copy; 2024 Catatan Pengeluaran | All Rights Reserved
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
