<?php

namespace App\Routers;

class Router
{
    private $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function response($request)
    {
        try {
            $controllerName = "App\\Controllers\\" . $this->routes[$request]['controller'];
            $controller = new $controllerName();
            $controllerAction = $this->routes[$request]['action'];
            if ($this->routes[$request]['method'] === 'GET') {
                $controller->$controllerAction();
            } else if ($this->routes[$request]['method'] === 'POST') {
                $controller->$controllerAction($_POST);
            } else {
                throw new \Exception('error!');
            }
        } catch (\Exception $e) {
            error_log($e->getFile() . $e->getLine() . $e->getMessage());
        }
    }
}