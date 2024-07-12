<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "core/functions.php";

// autoload classes
spl_autoload_register(function ($class) {

  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  require base_path("{$class}.php");
});


require base_path('bootstrap.php');


$router = new \core\Router();

// loads every routes
require_once base_path('routes.php');

// route to proper view
$router->route(
  url: parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 
  method: $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']
);
