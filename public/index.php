<?php
session_start();

// Include the config file to access the BASE_URL constant
include_once 'config.php';

$route = isset($_GET['route']) ? $_GET['route'] : '';

switch($route) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include_once '../controllers/AuthController.php';
            $authController = new AuthController();
            $isAuthenticated = $authController->login($_POST);

            if ($isAuthenticated) {
                header("Location: " . BASE_URL . "index.php?route=dashboard");
            } else {
                echo "Login Failed!";
            }
        } else {
            include '../views/auth/login.php';
        }
        break;

    case 'products':
        include_once '../controllers/ProductController.php';
        $productController = new ProductController();
        $products = $productController->getAllProducts();
        include '../views/products/product_list.php';
        break;

    case 'logout':
        include_once '../controllers/AuthController.php';
        $authController = new AuthController();
        $authController->logout();
        header("Location: " . BASE_URL . "index.php?route=login");
        break;

    default:
        include '../views/auth/login.php';
        break;
}
