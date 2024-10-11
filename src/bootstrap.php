<?php

require_once 'helpers/utils.php';

$routes = [
  '/' => 'controllers/home.php',
  '/listings' => 'controllers/listings/index.php',
  '/listings/create' => 'controllers/listings/create.php',
  '404' => 'controllers/errors/404.php'
];

$uri = $_SERVER['REQUEST_URI'];

if (array_key_exists($uri, $routes)) {
    require_once basePath('App/'.$routes[$uri]);
} else {
    require_once basePath('App/'.$routes['404']);
}
