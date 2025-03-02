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

// Product routes
$router->get('/products', [ProductController::class, 'index']);
$router->get('/products/create', [ProductController::class, 'create']);
$router->post('/products/create', [ProductController::class, 'create']);
$router->get('/products/edit/{id}', [ProductController::class, 'edit']);
$router->post('/products/edit/{id}', [ProductController::class, 'update']);
$router->get('/products/delete/{id}', [ProductController::class, 'delete']);

// Resolve the current route
$router->resolve(); 