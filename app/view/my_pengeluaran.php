<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengeluaran Anda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/unkpresent/devops/public/css/style.css">
    <style>
        body {
            background: linear-gradient(135deg, #d6e8d5, #b5b8b1); /* Gradient hijau dan silver */
        }

        .navbar {
            background: linear-gradient(135deg, #4CAF50, #8d8f85); /* Hijau dan silver */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: #d1e0e0 !important;
        }

        .btn-custom {
            background-color: #4CAF50;
            border-radius: 30px;
            padding: 12px 30px;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #45a049;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .form-control-sm {
            background-color: #f8f9fa;
            transition: background-color 0.3s ease;
        }

        .form-control-sm:focus {
            background-color: #ffffff;
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary, .btn-danger {
            border-radius: 30px;
        }

        .btn-primary:hover, .btn-danger:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/unkpresent/devops/public/image/logoPengeluaran.png" alt="Logo">
                <span class="fw-bold">Catatan Pengeluaran</span>
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
                        <td colspan="4" class="text-center">Anda belum memiliki pengeluaran apapun.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
