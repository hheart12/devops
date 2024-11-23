<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /unkpresent/devops/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengeluaran</title>
    <link rel="stylesheet" href="/unkpresent/devops/public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        /* Additional styles */
        .small-label {
            font-size: 0.8rem; /* Adjust label size as needed */
        }
        .form-control-sm {
            font-size: 0.875rem;
            background-color: #f8f9fa;
            transition: background-color 0.3s ease;
        }
        .form-control-sm:focus {
            background-color: #ffffff;
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .btn-bd-primary {
            background-color: #712cf9;
            border-color: #712cf9;
        }
        .btn-bd-primary:hover {
            background-color: #6528e0;
            border-color: #6528e0;
        }
        .bg-light {
            background-color: #f8f9fa !important;
        }
        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Pengeluaran</h1>
        <br>
        <a href="dashboarduser.php" class="btn btn-secondary mt-3 mb-3">Kembali ke Dashboard</a>
        <form method="POST" action="../controller/PengeluaranController.php" class="shadow-sm p-4 bg-white rounded">
            
            <div class="mb-3">
                <label for="tanggal" class="form-label small-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control form-control-sm" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label small-label">Jumlah Pengeluaran</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control form-control-sm" placeholder="Jumlah Pengeluaran" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label small-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control form-control-sm" placeholder="Keterangan Pengeluaran" required></textarea>
            </div>

            <button type="submit" name="add_pengeluaran" class="btn btn-bd-primary">Tambah Pengeluaran</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
