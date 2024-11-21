<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengeluaran</title>
</head>
<body>
    <h2>Daftar Pengeluaran</h2>
    
    <table border="1">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pengeluaran as $item): ?>
            <tr>
                <td><?= $item['tanggal'] ?></td>
                <td><?= $item['keterangan'] ?></td>
                <td><?= $item['jumlah'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="<?= APP_PATH ?>index.php?action=tambahPengeluaran">Tambah Pengeluaran</a></p>
    <p><a href="<?= APP_PATH ?>index.php?action=logout">Logout</a></p>
</body>
</html>
