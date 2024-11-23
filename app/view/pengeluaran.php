<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengeluaran</title>
    <link rel="stylesheet" href="/devops/public/css/style.css">
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
                <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?= $item['tanggal'] ?></td>
                        <td>Rp<?= number_format($item['jumlah'], 2, ',', '.') ?></td>
                        <td><?= $item['keterangan'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="/devops/?controller=pengeluaran&action=add">Tambah Pengeluaran</a>
        <a href="/devops/?controller=pengeluaran&action=logout">Log Out</a>
    </div>
</body>
</html>
