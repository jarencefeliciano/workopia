<?php

declare(strict_types=1);

class Router
{
    private array $routes = [];

    /**
     * Register the route
     *
     * @param string $method
     * @param string $uri
     * @param string $controller
     *
     * @return void
     */
    private function registerRoute(string $method, string $uri, string $controller): void
    {
        $this->routes[] = [
          'method' => $method,
          'uri' => $uri,
          'controller' => $controller
        ];
    }

    /**
     * Add a GET route
     *
     * @param string $uri
     * @param string $controller
     *
     * @return void
     */
    public function get(string $uri, string $controller): void
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    /**
     * Add a POST route
     *
     * @param string $uri
     * @param string $controller
     *
     * @return void
     */
    public function post(string $uri, string $controller): void
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    /**
     * Add a PUT route
     *
     * @param string $uri
     * @param string $controller
     *
     * @return void
     */
    public function put(string $uri, string $controller): void
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * Add a DELETE route
     *
     * @param string $uri
     * @param string $controller
     *
     * @return void
     */
    public function delete(string $uri, string $controller): void
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    /**
     * Load error page
     *
     * @param int $http_code
     * @return void
     */
    public function error(int $http_code = 404): void
    {
        http_response_code($http_code);
        loadView('error/' . $http_code);
        exit;
    }

    /**
     * Route the request
     *
     * @param string $uri
     * @param string $method
     *
     * @return void
     */
    public function route(string $uri, string $method): void
    {
        foreach ($this->routes as $route) {

            if ($route['uri'] === $uri && $route['method'] === $method) {

                require_once basePath('App/'.$route['controller']);
                return;

            }

        }

        $this->error(404);
    }
}
