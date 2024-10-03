<?php
include_once '../config/database.php';
include_once '../models/Admin.php';

class AuthController {
    private $conn;
    private $admin;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->admin = new Admin($this->conn);
    }

    public function login($data) {
        $this->admin->username = $data['username'];
        $this->admin->password = $data['password'];
        
        $admin = $this->admin->login();
        if ($admin) {
            // Set session variables for the logged-in user
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
    }
}
