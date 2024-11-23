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

// Delete Barang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_barang'])) {
    $barangController->deletePengeluaran($_POST['id']);
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
</head>
<body class="bg-light">
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
                                    <input type="hidden" name="id" value="<?= $pengeluaran['id']; ?>">
                                    <input type="number" name="jumlah" value="<?= $pengeluaran['jumlah']; ?>" class="form-control form-control-sm" required>
                                    <textarea name="keterangan" class="form-control form-control-sm" required><?= $pengeluaran['keterangan']; ?></textarea>
                                    <button type="submit" name="update_pengeluaran" class="btn btn-primary btn-sm mt-1">Update</button>
                                </form>
                            </td>
                            <td>
                            <button type="submit" name="delete_pengeluaran" class="btn btn-danger btn-sm w-100 mt-2" onclick="return confirm('Anda yakin ingin menghapus catatan ini?')">Hapus Pengeluaran</button>
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
