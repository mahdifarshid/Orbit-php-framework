<?php

use Orbit\Orbit\Router;

$router = new Router();

// Define routes
$router->get('/', function () {
    echo "Welcome to the homepage!";
});

$router->get('/about', function () {
    echo "About us page.";
});

$router->get('/home', 'HomeController@index');

return $router;
