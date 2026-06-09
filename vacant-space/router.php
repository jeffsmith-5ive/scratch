<?php
// Router for PHP built-in web server
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . urldecode($uri);

// If the file exists and is a regular file, serve it directly
if (file_exists($file) && is_file($file)) {
    return false;
}

// Route to index.php, setting route from path if not already set via query param
$pathRoute = ltrim($uri, '/');
if (!empty($pathRoute)) {
    $_GET['route'] = $pathRoute;
}

require_once 'index.php';
