<?php
class Customer {
    private $conn;
    private $table = "customers";

    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . 
                 " (name, email, phone, address) VALUES
                 (:name, :email, :phone, :address)";
        
        $stmt = $this->conn->prepare($query);
        
        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':address' => $this->address
        ]);
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
} 