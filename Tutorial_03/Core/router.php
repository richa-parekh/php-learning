<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function route($uri, $method)
    { 
        foreach ($this->routes as $route) {
            echo "<pre>";
                print_r($route['uri']."=>" .$route['method'] ."=>" .$uri."=>" .$method);echo "</pre>";
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                
                return require base_path($route['controller']);
            }
        }
        abort();
    }
    public function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }
    public function get($uri, $controller)
    {
        $this->add('GET',$uri, $controller);
    }
    public function post($uri, $controller)
    {
        $this->add('POST',$uri, $controller);
    }
    public function delete($uri, $controller)
    {
        $this->add('DELETE',$uri, $controller);
    }
    public function put($uri, $controller)
    {
        $this->add('PUT',$uri, $controller);
    }

    public function patch($uri, $controller)
    {
        $this->add('PATCH',$uri, $controller);
    }
}
