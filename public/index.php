<?php

require_once("../vendor/autoload.php");

use App\Core\Request;
use App\Core\{RouteCollection, Dispatcher};

$request = new Request();
$routes = new RouteCollection();
$dispatcher = new Dispatcher($routes, $request);