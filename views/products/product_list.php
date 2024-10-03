<?php include '../public/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
    <?php include '../views/layouts/header.php'; ?>

    <div class="container">
        <h2>Available Products</h2>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
            <?php foreach($products as $product): ?>
                <tr>
                    <td><?= $product['id']; ?></td>
                    <td><?= $product['name']; ?></td>
                    <td><?= $product['price']; ?></td>
                    <td><?= $product['quantity_in_stock']; ?></td>
                    <td><a href="<?= BASE_URL ?>index.php?route=editProduct&id=<?= $product['id']; ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php include '../views/layouts/footer.php'; ?>
</body>
</html>
