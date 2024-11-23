<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .register-container {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 100%;
            height: auto;
            width: 80px; /* Ukuran logo */
        }
        .form-control {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding-left: 40px;
            height: 50px;
        }
        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
        }
        .input-icon {
            position: relative;
        }
        .input-icon .icon {
            position: absolute;
            top: 12px;
            left: 12px;
            font-size: 20px;
            color: #6a11cb;
        }
        button {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            border-radius: 8px;
            height: 50px;
            color: white;
            font-size: 16px;
            font-weight: bold;
        }
        button:hover {
            background: linear-gradient(to left, #6a11cb, #2575fc);
        }
        .text-muted {
            color: #6c757d !important;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo">
            <img src="/unkpresent/devops/public/image/logoPengeluaran.png" alt="Logo">
        </div>
        <h2 class="text-center text-dark">Create an Account</h2>
        <p class="text-center text-muted">Sign up to get started</p>
        <form method="POST" action="/unkpresent/devops/"> <!-- Ganti dengan URL yang benar -->
            <div class="mb-3 input-icon">
                <span class="icon"><i class="bi bi-person-fill"></i></span>
                <input type="text" name="nama" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="mb-3 input-icon">
                <span class="icon"><i class="bi bi-envelope-fill"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3 input-icon">
                <span class="icon"><i class="bi bi-lock-fill"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" name="register" class="btn btn-success w-100">Register</button>
        </form>

        <?php if (isset($_SESSION['error'])): ?>
            <p class="error text-danger text-center mt-3"><?= htmlspecialchars($_SESSION['error']); ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <p class="success text-success text-center mt-3"><?= htmlspecialchars($_SESSION['success']); ?></p>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <p class="text-center mt-3 text-muted">Already have an account? <a href="/unkpresent/devops/app/view/login.php" class="text-primary fw-bold">Login here</a>.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
