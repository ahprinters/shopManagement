<?php
namespace Shop\Models;

use PDO;

class Invoice {
    private $conn;
    private $table = "invoices";

    // ... existing properties ...

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    // ... existing methods ...
} 