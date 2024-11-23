<?php
// Start the session to handle flash messages
session_start();

// Check if there are any session messages (error or success)
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';

// Clear session messages after displaying them
unset($_SESSION['error']);
unset($_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assuming you have a stylesheet -->
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <!-- Display error or success message if set -->
    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <form action="/unkpresent/devops/app/controller/UserController.php?action=login" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a></p>
</div>

</body>
</html>
