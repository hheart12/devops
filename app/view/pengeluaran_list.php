<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /unkpresent/devops/index.php");
    exit;
}

require_once '../controllers/PengeluaranController.php';

use Controller\PengeluaranController;

$pengeluaranController = new PengeluaranController();
$pengeluaranList = $pengeluaranController->showAllPengeluaran();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengeluaran</title>
    <link rel="stylesheet" href="../public/css/style.css"> <!-- Perbaiki jalur file CSS -->
</head>
<body>
    <div class="pengeluaran-container">
        <h2>Pengeluaran</h2>

        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pengeluaranList as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['tanggal']) ?></td>
                        <td>Rp<?= number_format($item['jumlah'], 2, ',', '.') ?></td>
                        <td><?= htmlspecialchars($item['keterangan']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="/devops/?controller=pengeluaran&action=add">Tambah Pengeluaran</a>
        <a href="/devops/?controller=pengeluaran&action=logout">Log Out</a>
    </div>
</body>
</html>
