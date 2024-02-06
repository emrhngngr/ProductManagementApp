<?php
use App\Models\Database;
use App\Routes\web;
use Bramus\Router\Router;

// Autoload Composer dependencies
require __DIR__ . '/vendor/autoload.php';

// Create Router instance
$router = new Router();

$database = new Database();
// Instantiate the web class and pass the router instance
$web = new web($router);
$web->defineRoutes();
