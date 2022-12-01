<?php

namespace App\Core;

use App\Core\Interfaces\{IRoutes, IRequest};
use App\Core\AbstractController;
use App\Controllers\RutaNoDefinidaController;

class Dispatcher extends AbstractController{

    private $routeList;
    private IRequest $currentRequest;
    

    public function __construct(IRoutes $routes, IRequest $request)
    {
        $this->currentRequest = $request;
        $this->routeList = $routes->getRoutes();
        $this->dispatch();
    }

    public function dispatch(){

        if(isset($this->routeList[$this->currentRequest->getRoute()])){
            $controllerClass = "App\\Controllers\\".$this->routeList[$this->currentRequest->getRoute()]["controller"];
            $controller = new $controllerClass;
            $action = $this->routeList[$this->currentRequest->getRoute()]["action"];
            $controller->$action(...$this->currentRequest->getParams());
        }else{
            // echo "La ruta no esta definida";
            $controller = new RutaNoDefinidaController();
            $controller->rutaNoDefinida();
        }
    }
}