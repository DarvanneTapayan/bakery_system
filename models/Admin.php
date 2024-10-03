<?php
class Admin {
    private $conn;
    private $table = "admin";

    public $id;
    public $username;
    public $password;
    public $email;
    public $contact_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create Admin
    public function create() {
        $query = "INSERT INTO " . $this->table . " (username, password, email, contact_id) VALUES (:username, :password, :email, :contact_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", password_hash($this->password, PASSWORD_BCRYPT));  // Hashing password
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":contact_id", $this->contact_id);
        return $stmt->execute();
    }

    // Read Admin
    public function read() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update Admin
    public function update() {
        $query = "UPDATE " . $this->table . " SET username = :username, email = :email, contact_id = :contact_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":contact_id", $this->contact_id);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    // Delete Admin
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    // Login Admin (Authentication)
    public function login() {
        if (!isset($this->username) || !isset($this->password)) {
            return false;  // Ensure username and password are set
        }

        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($admin && password_verify($this->password, $admin['password'])) {
            return $admin;
        }
        return false;
    }
}
