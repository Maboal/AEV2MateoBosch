<?php

namespace App\Core;

use App\Core\Interfaces\IRequest;

class Request implements IRequest{

    private $routes;
    private $params;

    public function __construct()
    {
        $rawRoute = $_SERVER["REQUEST_URI"];
        $rawRouteElements = explode("/",$rawRoute);
        $this->routes = "/".$rawRouteElements[1];
        $this->params = array_slice($rawRouteElements, 2);
    }

    /**
     * Get the value of routes
     */ 
    public function getRoute()
    {
        return $this->routes;
    }

    /**
     * Get the value of params
     */ 
    public function getParams()
    {
        return $this->params;
    }
}