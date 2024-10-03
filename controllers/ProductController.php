<?php
include_once '../config/database.php';
include_once '../models/Product.php';

class ProductController {

    private $conn;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->product = new Product($this->conn);
    }

    public function createProduct($data) {
        $this->product->name = $data['name'];
        $this->product->image = $data['image'];
        $this->product->price = $data['price'];
        $this->product->quantity_in_stock = $data['quantity_in_stock'];
        
        if ($this->product->create()) {
            return "Product Created Successfully!";
        }
        return "Product Creation Failed.";
    }

    public function getAllProducts() {
        return $this->product->readAll();
    }

    public function updateProduct($data) {
        $this->product->id = $data['id'];
        $this->product->name = $data['name'];
        $this->product->image = $data['image'];
        $this->product->price = $data['price'];
        $this->product->quantity_in_stock = $data['quantity_in_stock'];

        if ($this->product->update()) {
            return "Product Updated Successfully!";
        }
        return "Product Update Failed.";
    }

    public function deleteProduct($id) {
        $this->product->id = $id;
        if ($this->product->delete()) {
            return "Product Deleted Successfully!";
        }
        return "Product Deletion Failed.";
    }
}
