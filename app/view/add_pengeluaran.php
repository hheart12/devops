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
        /* Styling untuk body dengan background gambar dan overlay gelap */
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('/unkpresent/devops/public/image/my_pengeluaran_bg.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
            min-height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Navbar styling */
        .navbar {
            background-color: rgba(0, 0, 0, 0.8); /* Transparansi hitam */
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); /* Garis bawah tipis */
        }

        .navbar-brand {
            color: #fff;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .shadow-sm {
            background-color: rgba(255, 255, 255, 0.8); /* Warna putih dengan transparansi */
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.9); /* Field input lebih terang */
            color: #333;
        }

        .btn-bd-primary {
            background-color: rgba(40, 167, 69, 0.9); /* Hijau dengan sedikit transparansi */
            border: none;
            color: #fff;
        }

        .btn-bd-primary:hover {
            background-color: rgba(33, 136, 56, 0.9); /* Hijau lebih gelap pada hover */
        }

        .footer {
            text-align: center;
            margin-top: auto; /* Footer di bagian bawah */
            color: #fff;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/unkpresent/devops/public/image/logoPengeluaran.png" alt="Logo">
                <span>Catatan Pengeluaran</span>
            </a>
        </div>
    </nav>

    <!-- Konten tambah pengeluaran -->
    <div class="container mt-5">
        <h1 class="text-center mb-4"><b>Tambah Pengeluaran</b></h1>
        <a href="dashboarduser.php" class="btn btn-secondary mt-3 mb-3">Kembali ke Dashboard</a>
        <form method="POST" action="../controller/PengeluaranController.php" class="shadow-sm">
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

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Catatan Pengeluaran. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
