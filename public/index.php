<?php

require_once("../vendor/autoload.php");

use App\Core\Request;
use App\Core\{RouteCollection, Dispatcher};

session_start();

$request = new Request();
$routes = new RouteCollection();
$dispatcher = new Dispatcher($routes, $request);