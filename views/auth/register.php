<?php include '../public/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
    <?php include '../views/layouts/header.php'; ?>

    <div class="register-form">
        <form method="POST" action="<?= BASE_URL ?>index.php?route=register">
            <h2>Register</h2>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>

    <?php include '../views/layouts/footer.php'; ?>
</body>
</html>
