<?php
include_once '../config/database.php';
include_once '../models/Customer.php';

class CustomerController {

    private $conn;
    private $customer;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->customer = new Customer($this->conn);
    }

    public function createCustomer($data) {
        $this->customer->username = $data['username'];
        $this->customer->password = $data['password'];
        $this->customer->email = $data['email'];

        if ($this->customer->create()) {
            return "Customer Created Successfully!";
        }
        return "Customer Creation Failed.";
    }

    public function getCustomer($id) {
        $this->customer->id = $id;
        return $this->customer->read();
    }

    public function updateCustomer($data) {
        $this->customer->id = $data['id'];
        $this->customer->username = $data['username'];
        $this->customer->email = $data['email'];

        if ($this->customer->update()) {
            return "Customer Updated Successfully!";
        }
        return "Customer Update Failed.";
    }

    public function deleteCustomer($id) {
        $this->customer->id = $id;
        if ($this->customer->delete()) {
            return "Customer Deleted Successfully!";
        }
        return "Customer Deletion Failed.";
    }
}
