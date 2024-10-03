<?php include '../public/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
    <div class="login-form">
        <form method="POST" action="<?= BASE_URL ?>index.php?route=login">
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
