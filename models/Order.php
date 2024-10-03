<?php
class Order {
    private $conn;
    private $table = "order_details";

    public $id;
    public $customer_id;
    public $admin_id;
    public $payment_id;
    public $product_id;
    public $process_id;
    public $customer_address;
    public $customer_phone;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (customer_id, admin_id, payment_id, product_id, process_id, customer_address, customer_phone)
                  VALUES (:customer_id, :admin_id, :payment_id, :product_id, :process_id, :customer_address, :customer_phone)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":customer_id", $this->customer_id);
        $stmt->bindParam(":admin_id", $this->admin_id);
        $stmt->bindParam(":payment_id", $this->payment_id);
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":process_id", $this->process_id);
        $stmt->bindParam(":customer_address", $this->customer_address);
        $stmt->bindParam(":customer_phone", $this->customer_phone);
        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET customer_address = :customer_address, customer_phone = :customer_phone, payment_id = :payment_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":customer_address", $this->customer_address);
        $stmt->bindParam(":customer_phone", $this->customer_phone);
        $stmt->bindParam(":payment_id", $this->payment_id);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
