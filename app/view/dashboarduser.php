<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /unkpresent/devops/index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/unkpresent/devops/public/css/style.css">
    <style>
        body {
            background: #e0e0e0; /* Warna abu-abu terang untuk latar belakang */
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .card {
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #ffffff; /* Latar belakang kartu putih */
            color: #333;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background-color: #a9a9a9; /* Chrome gray untuk tombol */
            border-color: #808080;
            border-radius: 30px;
            padding: 12px 30px;
            color: white;
        }
        .btn-custom:hover {
            background-color: #808080;
            border-color: #5f5f5f;
        }
        .navbar {
            background-color: #343a40; /* Warna hitam untuk navbar */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 15px;
        }
        .container {
            max-width: 1200px;
        }
        .welcome-message {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .card-body {
            padding: 30px;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 500;
            color: #333;
        }
        .card-text {
            font-size: 1rem;
            color: #777;
            margin-bottom: 20px;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            color: #333;
        }
        .register-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .logo img {
            max-width: 100%;
            height: auto;
            width: 100px;
        }
        .error, .success {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/unkpresent/devops/public/image/logoPengeluaran.png" alt="Logo">
                <span class="fw-bold">Catatan Pengeluaran</span>
            </a>
        </div>
    </nav>

    <!-- Konten Dashboard -->
    <div class="container mt-5">
        <h1 class="text-center welcome-message">Welcome, <?= htmlspecialchars($user['nama']); ?>!</h1>
        <p class="text-center text-muted"><?= htmlspecialchars($user['email']); ?></p>

        <!-- Cards Section -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Pengeluaran</h5>
                        <p class="card-text">Tambahkan Pengeluaran anda.</p>
                        <a href="./add_pengeluaran.php" class="btn btn-custom w-100">Tambah Pengeluaran</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pengeluaran yang Anda Keluarkan</h5>
                        <p class="card-text">Pengeluaran yang telah Anda Keluarkan.</p>
                        <a href="./my_pengeluaran.php" class="btn btn-custom w-100">Lihat Pengeluaran</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="text-center mt-5">
            <form method="POST" action="../view/logout.php">
                <button type="submit" name="logout" class="btn btn-danger w-50">Logout</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Catatan Pengeluaran | All Rights Reserved</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
