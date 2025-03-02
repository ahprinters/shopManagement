<?php
namespace Shop\Models;

use PDO;

class Product {
    private $conn;
    private $table = "products";

    // ... existing properties ...

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    // ... existing methods ...
} 