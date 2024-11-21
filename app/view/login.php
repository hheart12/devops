<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="<?= APP_PATH ?>index.php?action=login">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? <a href="<?= APP_PATH ?>index.php?action=register">Daftar</a></p>
</body>
</html>
