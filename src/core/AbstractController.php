<?php

namespace App\Core;

abstract class AbstractController{

    private $twig;
    
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__."/../templates");
        $this->twig = new \Twig\Environment($loader);
        $this->twig->addGlobal('server_name', $_SERVER['SERVER_NAME']);
    }

    public function render($template, $params){
        $plantilla = $this->twig->load($template);
        echo $plantilla->render($params);
    }

}