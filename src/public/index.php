<?php

require __DIR__ . '/../../vendor/autoload.php';

// Load routes
$router = require __DIR__ . '/../Router/web.php';

// Dispatch the request
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router->dispatch($requestUri, $requestMethod);