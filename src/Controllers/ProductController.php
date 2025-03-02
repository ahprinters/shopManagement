<?php
namespace Shop\Controllers;

use Shop\Core\Controller;
use Shop\Models\Product;
use Shop\Database\Connection;

class ProductController extends Controller {
    private $db;
    private $product;

    public function __construct() {
        $database = new Connection();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function index() {
        $products = $this->product->read();
        $this->render('products/index', ['products' => $products]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->product->name = $_POST['name'] ?? '';
            $this->product->description = $_POST['description'] ?? '';
            $this->product->price = $_POST['price'] ?? 0;
            $this->product->quantity = $_POST['quantity'] ?? 0;
            $this->product->category = $_POST['category'] ?? '';

            if ($this->product->create()) {
                header('Location: /products');
                exit;
            }
        }
        $this->render('products/create');
    }
} 