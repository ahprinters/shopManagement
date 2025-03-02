<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Shop\Core\Router;
use Shop\Controllers\ProductController;

$router = new Router();

// Define routes
$router->get('/', function() {
    header('Location: /products');
    exit;
});

$router->get('/products', [ProductController::class, 'index']);
$router->get('/products/create', [ProductController::class, 'create']);
$router->post('/products/create', [ProductController::class, 'create']);

// Resolve the current route
$router->resolve(); 