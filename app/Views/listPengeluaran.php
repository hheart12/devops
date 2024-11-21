<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pengeluaran</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h1>List Pengeluaran</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pengeluaran as $p) : ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['user_id'] ?></td>
                    <td><?= $p['tanggal'] ?></td>
                    <td><?= $p['keterangan'] ?></td>
                    <td><?= number_format($p['jumlah'], 2, ',', '.') ?></td>
                    <td>
                        <form method="POST" action="/pengeluaran/delete/<?= $p['id'] ?>" style="display:inline;">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Tambah Pengeluaran</h2>
    <form method="POST" action="/pengeluaran/add">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br>

        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" required><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" step="0.01" id="jumlah" name="jumlah" required><br>

        <button type="submit">Tambah</button>
    </form>
</body>
</html>
