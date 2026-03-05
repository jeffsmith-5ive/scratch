<?php

// Start the session for managing cart and user data
session_start();

// Define constants
define('BASE_PATH', __DIR__);

// Simple Autoloader for Controllers and Models
spl_autoload_register(function ($class) {
    $paths = [
        BASE_PATH . '/app/controllers/',
        BASE_PATH . '/app/models/',
    ];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Basic Router
$route = isset($_GET['route']) ? $_GET['route'] : (isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : 'home');
if (empty($route)) {
    $route = 'home';
}

$parts = explode('/', $route);
$controllerName = ucfirst($parts[0]) . 'Controller';
$action = isset($parts[1]) ? $parts[1] : 'index';

// Initialize global user and cart if they don't exist
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [
        'points' => 0,
        'rank' => 'Freshman Liming',
        'wishlist' => [],
        'order_history' => []
    ];
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Dispatch
if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        // Pass any additional URL params to the action, excluding route parameter itself if from GET
        $params = $_GET;
        unset($params['route']);
        $controller->$action($params);
    } else {
        http_response_code(404);
        echo "404 Not Found - Action '$action' not found in '$controllerName'";
    }
} else {
    http_response_code(404);
    echo "404 Not Found - Controller '$controllerName' not found";
}
