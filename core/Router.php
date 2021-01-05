<?php

namespace App\Core;

use Exception;

class Router 
{

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public $middleware = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file) {
        $router = new static;
        require $file;
        return $router;
    }
    
    public function get() {
        $argsNum = func_num_args();
        $args = func_get_args();
        $uri = $args[0];

        $search = "#\{.*?\}#s";
        $replace = "*";
        $uri = preg_replace($search,$replace,$uri);

        if($argsNum != 3 && $argsNum != 2) {
            throw new Exception("Parameters invalid for GET route");
        } elseif ($argsNum === 3) {
            $controller = $args[2];
            $this->routes['GET'][$uri] = $controller;
            $this->middleware['GET'][$uri] = $args[1];
        } else {
            $controller = $args[1];
        }
        $this->routes['GET'][$uri] = $controller;
    }

    public function post() {
        $argsNum = func_num_args();
        $args = func_get_args();
        $uri = $args[0];

        $search = "#\{.*?\}#s";
        $replace = "*";
        $uri = preg_replace($search,$replace,$uri);

        if($argsNum != 3 && $argsNum != 2) {
            throw new Exception("Parameters invalid for POST route");
        } elseif ($argsNum === 3) {
            $controller = $args[2];
            $this->routes['POST'][$uri] = $controller;
            $this->middleware['POST'][$uri] = $args[1];
        } else {
            $controller = $args[1];
        }
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType) {
        $checkURI = array_key_exists($uri, $this->routes[$requestType]);
        $checkMiddleware = array_key_exists($uri, $this->middleware[$requestType]);

        if($checkURI) {
            if($checkMiddleware) {
                foreach($this->middleware[$requestType][$uri] as $middleware) {
                    $this->callMiddleware(...explode('@', $middleware));
                }
            }
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        } elseif (!$checkURI) {
            foreach($this->routes[$requestType] as $route => $controller) {
                // Check if URI fits an wildcard route
                if(fnmatch($route, $uri)) {
                    // Run middleware first
                    if($checkMiddleware) {
                        foreach($this->middleware[$requestType][$route] as $middleware) {
                            $this->callMiddleware(...explode('@', $middleware));
                        }
                    }
                    // Fire controller and call action
                    return $this->callAction(
                        ...explode('@', $controller)
                    );
                } else {
                    throw new Exception('No route defined for this URI.');
                }
            }
        } else {
            throw new Exception('No route defined for this URI.');
        }
    }

    protected function callMiddleware($middleware, $action) {
        $middleware = "App\\Middleware\\{$middleware}";
        $middleware = new $middleware;

        if(! method_exists($middleware, $action)) {
            throw new Exception("{$middleware} does not respond to the {$action}.");
        }

        $middleware->$action();
    }

    protected function callAction($controller, $action) {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if(! method_exists($controller, $action)) {
            throw new Exception("{$controller} does not respond to the {$action}.");
        }

        return $controller->$action();
    }
}