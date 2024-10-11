<?php

require_once 'helpers/utils.php';

require basePath('/config/Router.php');

$router = new Router();

$routes = require basePath('/config/routes.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
