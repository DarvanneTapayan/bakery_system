<?php
include_once '../config/database.php';
include_once '../models/Order.php';

class OrderController {

    private $conn;
    private $order;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->order = new Order($this->conn);
    }

    public function createOrder($data) {
        $this->order->customer_id = $data['customer_id'];
        $this->order->admin_id = $data['admin_id'];
        $this->order->payment_id = $data['payment_id'];
        $this->order->product_id = $data['product_id'];
        $this->order->process_id = $data['process_id'];
        $this->order->customer_address = $data['customer_address'];
        $this->order->customer_phone = $data['customer_phone'];

        if ($this->order->create()) {
            return "Order Created Successfully!";
        }
        return "Order Creation Failed.";
    }

    public function getOrder($id) {
        $this->order->id = $id;
        return $this->order->read();
    }

    public function updateOrder($data) {
        $this->order->id = $data['id'];
        $this->order->customer_address = $data['customer_address'];
        $this->order->customer_phone = $data['customer_phone'];
        $this->order->payment_id = $data['payment_id'];

        if ($this->order->update()) {
            return "Order Updated Successfully!";
        }
        return "Order Update Failed.";
    }

    public function deleteOrder($id) {
        $this->order->id = $id;
        if ($this->order->delete()) {
            return "Order Deleted Successfully!";
        }
        return "Order Deletion Failed.";
    }
}
