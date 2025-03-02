<?php
namespace Shop\Models;

use PDO;

class Transaction {
    private $conn;
    private $table = "transactions";

    // ... existing properties ...

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    // ... existing methods ...
} 