<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order List</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include('../views/layouts/header.php'); ?>

    <div class="container">
        <h2>Customer Orders</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
            <!-- Orders should be looped here -->
            <?php foreach($orders as $order): ?>
                <tr>
                    <td><?= $order['id']; ?></td>
                    <td><?= $order['customer_name']; ?></td>
                    <td><?= $order['product_name']; ?></td>
                    <td><?= $order['status']; ?></td>
                    <td><a href="index.php?route=viewOrder&id=<?= $order['id']; ?>">View</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php include('../views/layouts/footer.php'); ?>
</body>
</html>
