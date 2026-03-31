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

$router->run();