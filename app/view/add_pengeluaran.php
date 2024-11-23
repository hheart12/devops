<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengeluaran</title>
    <link rel="stylesheet" href="/devops/public/css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Tambah Pengeluaran</h2>
        <form method="POST" action="/devops/?controller=pengeluaran&action=add">
            <input type="date" name="tanggal" required>
            <input type="number" name="jumlah" step="0.01" placeholder="Jumlah" required>
            <textarea name="keterangan" placeholder="Keterangan"></textarea>
            <button type="submit">Tambah</button>
        </form>
    </div>
</body>
</html>
