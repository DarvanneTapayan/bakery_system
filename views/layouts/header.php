<?php include '../public/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bakery System</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="<?= BASE_URL ?>">Home</a></li>
                <li><a href="<?= BASE_URL ?>index.php?route=products">Products</a></li>
                <li><a href="<?= BASE_URL ?>index.php?route=orders">Orders</a></li>
                <li><a href="<?= BASE_URL ?>index.php?route=logout">Logout</a></li>
            </ul>
        </nav>
    </header>
