<?php
include_once '../config/database.php';
include_once '../models/Admin.php';

class AdminController {

    private $conn;
    private $admin;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->admin = new Admin($this->conn);
    }

    public function createAdmin($data) {
        $this->admin->username = $data['username'];
        $this->admin->password = $data['password'];
        $this->admin->email = $data['email'];
        $this->admin->contact_id = $data['contact_id'];

        if ($this->admin->create()) {
            return "Admin Created Successfully!";
        }
        return "Admin Creation Failed.";
    }

    public function getAdmin($id) {
        $this->admin->id = $id;
        return $this->admin->read();
    }

    public function updateAdmin($data) {
        $this->admin->id = $data['id'];
        $this->admin->username = $data['username'];
        $this->admin->email = $data['email'];
        $this->admin->contact_id = $data['contact_id'];

        if ($this->admin->update()) {
            return "Admin Updated Successfully!";
        }
        return "Admin Update Failed.";
    }

    public function deleteAdmin($id) {
        $this->admin->id = $id;
        if ($this->admin->delete()) {
            return "Admin Deleted Successfully!";
        }
        return "Admin Deletion Failed.";
    }
}
