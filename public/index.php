<?php
require_once __DIR__ . '/../Core/Session.php';
require_once __DIR__ . '/../vendor/autoload.php';
use Core\Router;
session_start();
// initialisation router
$router = new Router();
// l'import
require_once __DIR__ . '/../routes/web.php';
// disptch du route actuelle
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
