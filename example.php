<?php
include_once 'includes/Database.php';
include_once 'classes/Product.php';
include_once 'classes/Customer.php';
include_once 'classes/Invoice.php';
include_once 'classes/Transaction.php';

// Initialize database connection
$database = new Database();
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