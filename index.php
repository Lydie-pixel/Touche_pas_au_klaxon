<?php
session_start();

if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

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

$router->get('/trajets', function() use ($db) {
    require 'controllers/TrajetController.php';
    $controller = new TrajetController($db);
    $controller->index();
});

$router->get('/trajets/create', function() use ($db) {
    require 'controllers/TrajetController.php';
    $controller = new TrajetController($db);
    $controller->create();
});

$router->post('/trajets/create', function() use ($db) {
    require 'controllers/TrajetController.php';
    $controller = new TrajetController($db);
    $controller->store();
});

$router->get('/trajets/edit/(\d+)', function($id) use ($db) {
    require 'controllers/TrajetController.php';
    $controller = new TrajetController($db);
    $controller->edit($id);
});

$router->post('/trajets/edit/(\d+)', function($id) use ($db) {
    require 'controllers/TrajetController.php';
    $controller = new TrajetController($db);
    $controller->update($id);
});

$router->get('/trajets/delete/(\d+)', function($id) use ($db) {
    require 'controllers/TrajetController.php';
    $controller = new TrajetController($db);
    $controller->delete($id);
});

$router->get('/users', function() use ($db) {
    require 'controllers/UserController.php';
    $controller = new UserController($db);
    $controller->index();
});

$router->get('/agences', function() use ($db) {
    require 'controllers/AgenceController.php';
    $controller = new AgenceController($db);
    $controller->index();
});

$router->get('/agences/create', function() use ($db) {
    require 'controllers/AgenceController.php';
    (new AgenceController($db))->create();
});

$router->post('/agences/create', function() use ($db) {
    require 'controllers/AgenceController.php';
    (new AgenceController($db))->store();
});

$router->post('/agences/delete/(\d+)', function($id) use ($db) {
    require 'controllers/AgenceController.php';
    $controller = new AgenceController($db);
    $controller->delete($id);
});

$router->run();