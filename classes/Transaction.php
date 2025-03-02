<?php
class Transaction {
    private $conn;
    private $table = "transactions";

    public $id;
    public $type; // 'credit' or 'debit'
    public $amount;
    public $description;
    public $transaction_date;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . 
                 " (type, amount, description, transaction_date) VALUES
                 (:type, :amount, :description, :transaction_date)";
        
        $stmt = $this->conn->prepare($query);
        
        return $stmt->execute([
            ':type' => $this->type,
            ':amount' => $this->amount,
            ':description' => $this->description,
            ':transaction_date' => $this->transaction_date
        ]);
    }

    public function getBalance() {
        $query = "SELECT 
                    SUM(CASE WHEN type='credit' THEN amount ELSE -amount END) 
                    as balance 
                 FROM " . $this->table;
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['balance'];
    }
} 