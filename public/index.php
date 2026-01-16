<?php
require_once __DIR__ . '/../Core/Session.php';
require_once __DIR__ . '/../vendor/autoload.php';
use Core\Router;
session_start();
// Initialisation router
$router = new Router();
// Import routes
require_once __DIR__ . '/../routes/web.php';
// Dispatch la route actuelle
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
