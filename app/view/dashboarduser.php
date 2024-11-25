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
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('/unkpresent/devops/public/image/background.jpg') no-repeat center center/cover;
            font-family: 'Arial', sans-serif;
            color: #fff;
            min-height: 100%;
        }

        .navbar {
            background: rgba(76, 175, 80, 0.9);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #FFFFFF;
        }

        .navbar-brand img {
            height: 60px;
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
            background-color: rgba(255, 255, 255, 0.8); /* Transparansi pada card */
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 25px;
            border-radius: 15px;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
        }

        .btn-custom {
            background-color: rgba(76, 175, 80, 0.7); /* Transparansi pada tombol */
            border-radius: 30px;
            padding: 12px 30px;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: rgba(76, 175, 80, 0.9);
        }

        .footer {
            text-align: center;
            margin-top: auto;
            color: #fff;
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
            color: #fff;
            margin-top: 40px;
        }

        .register-container {
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .error, .success {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid"> <!-- Menggunakan container-fluid untuk memenuhi lebar penuh -->
        <div class="d-flex align-items-center">
            <img src="/unkpresent/devops/public/image/logoPengeluaran.png" alt="Logo" style="height: 60px;">
            <span style="font-weight: bold; font-size: 1.5rem; color: #FFFFFF; margin-left: 10px;">Catatan Pengeluaran</span>
        </div>
    </div>
</nav>

    <!-- Konten Dashboard -->
    <div class="container mt-5">
        <h1 class="welcome-message">Welcome, <?= htmlspecialchars($user['nama']); ?>!</h1>
        <p class="text-center text-muted"><?= htmlspecialchars($user['email']); ?></p>

        <!-- Cards Section -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Pengeluaran</h5>
                        <p class="card-text">Tambahkan Pengeluaran anda.</p>
                        <a href="./add_pengeluaran.php" class="btn btn-custom w-100">Tambah Pengeluaran</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengeluaran Anda</h5>
                        <p class="card-text">Lihat daftar pengeluaran anda yang sudah tercatat.</p>
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
