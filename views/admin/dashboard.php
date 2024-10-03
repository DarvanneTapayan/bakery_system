<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include('../views/layouts/header.php'); ?>
    
    <div class="container">
        <h2>Welcome to the Admin Dashboard</h2>
        <ul>
            <li><a href="index.php?route=products">Manage Products</a></li>
            <li><a href="index.php?route=orders">Manage Orders</a></li>
            <li><a href="index.php?route=customers">Manage Customers</a></li>
        </ul>
    </div>
    
    <?php include('../views/layouts/footer.php'); ?>
</body>
</html>
