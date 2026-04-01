<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';

use Bramus\Router\Router;

$router = new Router();

$router->get('/', function() use ($db) {
    require_once 'controllers/HomeController.php';
    $controller = new HomeController($db);
    $controller->index();
});

$router->get('/login', function() use ($db) {
    require 'controllers/AuthController.php';
    $controller = new AuthController($db);
    $controller->login();
});

$router->post('/login', function() use ($db) {
    require 'controllers/AuthController.php';
    $controller = new AuthController($db);
    $controller->authenticate();
});

$router->get('/logout', function() use ($db) {
    require 'controllers/AuthController.php';
    $controller = new AuthController($db);
    $controller->logout();
});

$router->run();