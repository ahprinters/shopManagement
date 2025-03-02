<?php
namespace Shop\Models;

use PDO;

class Customer {
    private $conn;
    private $table = "customers";

    // ... existing properties ...

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    // ... existing methods ...
} 