<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengeluaran Anda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/unkpresent/devops/public/css/style.css">
    <style>
    /* Custom styling for navbar to match the previous page */
    .navbar {
        background-color: #f8f9fa; /* Warna navbar mirip dengan dashboard */
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    .navbar-brand img {
        height: 40px;
        margin-right: 10px;
    }
    .navbar-brand span {
        font-weight: bold;
        font-size: 1.25rem;
        color: #007bff; /* Warna teks navbar */
    }

    /* Custom button styles */
    .btn-primary {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-primary:hover {
        background-color: #218838;
        border-color: #218838;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    /* Styling table and form elements */
    .table {
        background-color: #ffffff;
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); /* Shadow untuk tabel */
    }
    .form-control-sm {
        font-size: 0.875rem;
        border-radius: 0.375rem; /* Rounded form control */
    }
    .form-control-sm:focus {
        background-color: #ffffff;
        border-color: #86b7fe;
    }

    /* Adding margin for text inputs and buttons */
    .mt-1, .mt-3, .mt-5 {
        margin-top: 1rem;
    }
    .mb-3, .mb-4, .mb-5 {
        margin-bottom: 1rem;
    }

    /* Adding background color to the page */
    body {
        background-color: #f4f6f9; /* Warna latar belakang lebih terang untuk kesan modern */
    }

    .container {
        background-color: #ffffff;
        border-radius: 0.5rem;
        padding: 20px;
    }
    </style>
</head>

<body>
<nav class="navbar navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="/unkpresent/devops/public/image/logoPengeluaran.png" alt="Logo">
            <span>Catatan Pengeluaran</span>
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
                                <input type="hidden" name="id" value="<?= $pengeluaran['id']; ?>">
                                <input type="number" name="jumlah" value="<?= $pengeluaran['jumlah']; ?>" class="form-control form-control-sm" required>
                                <textarea name="keterangan" class="form-control form-control-sm" required><?= $pengeluaran['keterangan']; ?></textarea>
                                <button type="submit" name="update_pengeluaran" class="btn btn-primary btn-sm mt-1">Update</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?= $pengeluaran['id']; ?>">
                                <button type="submit" name="delete_pengeluaran" class="btn btn-danger btn-sm w-100 mt-2" onclick="return confirm('Anda yakin ingin menghapus catatan ini?')">Hapus Pengeluaran</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Anda belum memiliki pengeluaran apapun.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
