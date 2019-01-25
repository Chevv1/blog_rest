<?php

namespace App\Core;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => [],
        'PATCH' => [],
    ];

    public function addRoute($method, $path, $handler)
    {
        $path = str_replace(':num', '(\w+)', $path);
        $path = str_replace(':str', '([a-zA-Z]+)', $path);
        $path = str_replace(':any', '(\w+)', $path);
        $path = str_replace('/', '\/', $path);

        $pattern = '/^' . $path . '$/';

        $this->routes[$method][$pattern] = $handler;
    }

    public function get($path, $handler)
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post($path, $handler)
    {
        $this->addRoute('POST', $path, $handler);
    }

    public function put($path, $handler)
    {
        $this->addRoute('PUT', $path, $handler);
    }

    public function patch($path, $handler)
    {
        $this->addRoute('PATCH', $path, $handler);
    }

    public function delete($path, $handler)
    {
        $this->addRoute('DELETE', $path, $handler);
    }

    public function getRoutes($httpMethod) {
        return $this->routes[$httpMethod];
    }

    public function run()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestUri = strtok($requestUri, '?');
        $requestUri = rtrim($requestUri, '/');

        $httpMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->getRoutes($httpMethod) as $pattern => $handler) {
            if (preg_match($pattern, $requestUri, $matches) === 1) {
                array_shift($matches);

                $data = call_user_func_array($handler, $matches);

                echo json_encode(['result' => $data]);

                return header("HTTP/1.0 200 OK");
            }
        }

        echo json_encode(['error' => 'page not found']);

        return header("HTTP/1.0 404 Not Found");
    }
}