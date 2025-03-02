<?php
class Product {
    private $conn;
    private $table = "products";

    public $id;
    public $name;
    public $description;
    public $price;
    public $quantity;
    public $category;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . 
                 " (name, description, price, quantity, category) VALUES
                 (:name, :description, :price, :quantity, :category)";
        
        $stmt = $this->conn->prepare($query);
        
        return $stmt->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':price' => $this->price,
            ':quantity' => $this->quantity,
            ':category' => $this->category
        ]);
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table . 
                 " SET name=:name, description=:description, 
                 price=:price, quantity=:quantity, category=:category 
                 WHERE id=:id";
        
        $stmt = $this->conn->prepare($query);
        
        return $stmt->execute([
            ':id' => $this->id,
            ':name' => $this->name,
            ':description' => $this->description,
            ':price' => $this->price,
            ':quantity' => $this->quantity,
            ':category' => $this->category
        ]);
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':id' => $this->id]);
    }
} 