<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengeluaran</title>
</head>
<body>
    <h2>Tambah Pengeluaran</h2>
    <form method="POST" action="<?= APP_PATH ?>index.php?action=tambahPengeluaran">
        <label for="tanggal">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" required><br><br>

        <label for="keterangan">Keterangan</label>
        <input type="text" id="keterangan" name="keterangan" required><br><br>

        <label for="jumlah">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" required><br><br>

        <button type="submit">Tambah</button>
    </form>

    <p><a href="<?= APP_PATH ?>index.php?action=pengeluaran">Kembali ke Daftar Pengeluaran</a></p>
</body>
</html>
