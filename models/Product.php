<?php
class Product {
    private $conn;
    private $table = "product";

    public $id;
    public $name;
    public $image;
    public $price;
    public $quantity_in_stock;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create Product
    public function create() {
        $query = "INSERT INTO " . $this->table . " (name, image, price, quantity_in_stock) VALUES (:name, :image, :price, :quantity_in_stock)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":quantity_in_stock", $this->quantity_in_stock);
        return $stmt->execute();
    }

    // Read Products
    public function readAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update Product
    public function update() {
        $query = "UPDATE " . $this->table . " SET name = :name, image = :image, price = :price, quantity_in_stock = :quantity_in_stock WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":quantity_in_stock", $this->quantity_in_stock);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    // Delete Product
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
