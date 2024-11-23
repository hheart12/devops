<!-- app/views/pengeluaran_list.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengeluaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Daftar Pengeluaran</h2>

    <!-- Tabel pengeluaran -->
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pengeluaran as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['tanggal']) ?></td>
                    <td><?= htmlspecialchars(number_format($item['jumlah'], 2, ',', '.')) ?></td>
                    <td><?= htmlspecialchars($item['keterangan']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= APP_PATH ?>add_pengeluaran">Tambah Pengeluaran</a>
    <br><br>
    <a href="<?= APP_PATH ?>logout">Logout</a>
</body>
</html>
