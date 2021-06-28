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
            if ($this->routes[$request]['method'] === 'GET') {
                $controllerName = "App\\Controllers\\" . $this->routes[$request]['controller'];
                $controller = new $controllerName();
    
                $controllerAction = $this->routes[$request]['action'];
                $controller->$controllerAction();
            } else if ($this->routes[$request]['method'] === 'POST') {
                // POST
            } else {
                throw new \Exception('error!');
            }
        } catch (\Exception $e) {
            error_log($e->getFile() . $e->getLine() . $e->getMessage());
        }
    }
}