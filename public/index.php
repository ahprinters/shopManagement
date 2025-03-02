<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Shop\Database\Connection;
use Shop\Models\Product;
use Shop\Models\Customer;
use Shop\Models\Invoice;
use Shop\Models\Transaction;

// Initialize database connection
$database = new Connection();
$db = $database->getConnection();

// Create a new product
$product = new Product($db);
$product->name = "Test Product";
$product->description = "Test Description";
$product->price = 99.99;
$product->quantity = 10;
$product->category = "Test Category";
$product->create();

// Create a new customer
$customer = new Customer($db);
$customer->name = "John Doe";
$customer->email = "john@example.com";
$customer->phone = "1234567890";
$customer->address = "123 Test St";
$customer->create(); 