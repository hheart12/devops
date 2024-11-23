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
    <title><b>Tambah Pengeluaran</b></title>
    <link rel="stylesheet" href="/unkpresent/devops/public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        /* Style untuk halaman tambah pengeluaran */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #d6e8d5, #b5b8b1); /* Gradient hijau dan silver */
            min-height: 100%;
        }

        .navbar {
            background: linear-gradient(135deg, #4CAF50, #8d8f85); /* Hijau dan silver untuk navbar */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 15px;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: #d1e0e0 !important;
        }

        .card {
            border-radius: 20px;
            background-color: #ffffff;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 25px;
            background-color: #f7f7f7;
            border-radius: 15px;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #777;
            margin-bottom: 15px;
        }

        .btn-custom {
            background-color: #4CAF50; /* Hijau cerah untuk tombol */
            border-radius: 30px;
            padding: 12px 30px;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #45a049;
        }

        .footer {
            text-align: center;
            margin-top: auto; /* Footer akan berada di bagian bawah */
            color: #333;
            font-size: 0.9rem;
        }

        .container {
            flex: 1;
            padding: 20px;
        }

        .welcome-message {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            color: #333;
            margin-top: 40px;
        }

        /* Custom styling untuk form tambah pengeluaran */
        .small-label {
            font-size: 0.8rem;
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
            background-color: #28a745;
            border-color: #712cf9;
        }

        .btn-bd-primary:hover {
            background-color: #218838;
            border-color: #6528e0;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        .logo img {
            max-width: 150%;
            height: auto;
            width: 100px;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/unkpresent/devops/public/image/logoPengeluaran.png" alt="Logo">
                <span class="fw-bold">Catatan Pengeluaran</span>
            </a>
        </div>
    </nav>

    <!-- Konten tambah pengeluaran -->
    <div class="container mt-5">
        <h1 class="text-center mb-4"><b>Tambah Pengeluaran</b></h1>
        <a href="dashboarduser.php" class="btn btn-secondary mt-3 mb-3">Kembali ke Dashboard</a>
        <form method="POST" action="../controller/PengeluaranController.php" class="shadow-sm p-4 bg-white rounded">
            <div class="mb-3">
                <label for="tanggal" class="form-label small-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control form-control-sm" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label small-label">Jumlah Pengeluaran (Rp)</label>
                <input type="text" name="jumlah" id="jumlah" class="form-control form-control-sm" placeholder="Rp 500.000" required>
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
