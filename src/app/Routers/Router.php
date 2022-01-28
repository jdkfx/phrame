<?php

namespace App\Routers;

use App\Templates\View;

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
            if (isset($this->routes[$request])) {
                $controller = new $this->routes[$request]['controller'];
                $controllerAction = $this->routes[$request]['action'];

                if ($this->routes[$request]['method'] === 'GET') {
                    $controller->$controllerAction();
                } else if ($this->routes[$request]['method'] === 'POST') {
                    $controller->$controllerAction($_POST);
                } else {
                    throw new \Exception('error!');
                }

            } else {
                $view = new View();
                header("HTTP/1.1 404 Not Found");
                $view->pages('error');
                exit;
            }
        } catch (\Exception $e) {
            error_log($e->getFile() . $e->getLine() . $e->getMessage());
        }
    }
}