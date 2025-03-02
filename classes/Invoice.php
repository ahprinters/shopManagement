<?php
class Invoice {
    private $conn;
    private $table = "invoices";

    public $id;
    public $customer_id;
    public $invoice_date;
    public $total_amount;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . 
                 " (customer_id, invoice_date, total_amount, status) VALUES
                 (:customer_id, :invoice_date, :total_amount, :status)";
        
        $stmt = $this->conn->prepare($query);
        
        return $stmt->execute([
            ':customer_id' => $this->customer_id,
            ':invoice_date' => $this->invoice_date,
            ':total_amount' => $this->total_amount,
            ':status' => $this->status
        ]);
    }

    public function getInvoiceDetails($id) {
        $query = "SELECT i.*, c.name as customer_name, c.email 
                 FROM " . $this->table . " i
                 JOIN customers c ON i.customer_id = c.id
                 WHERE i.id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
} 