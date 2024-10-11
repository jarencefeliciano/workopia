<?php

$routes = require_once basePath('/config/routes.php');

if (array_key_exists($uri, $routes)) {
  require_once basePath('App/'.$routes[$uri]);
} else {
  http_response_code(404);
  require_once basePath('App/'.$routes['404']);
}
