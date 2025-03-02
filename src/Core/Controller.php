<?php
namespace Shop\Core;

class Controller {
    protected function render($view, $data = []) {
        extract($data);
        require_once __DIR__ . "/../../views/{$view}.php";
    }

    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
} 