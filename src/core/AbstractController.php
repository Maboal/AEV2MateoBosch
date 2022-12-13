<?php

namespace App\Core;

abstract class AbstractController{

    private $twig;
    
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__."/../templates");
        $this->twig = new \Twig\Environment($loader, [
            'debug' => true   
        ]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        $this->twig->addGlobal('server_name', $_SERVER['SERVER_NAME']);
        if (isset($_SESSION['id_empresa'])){
            $this->twig->addGlobal('session_id_empresa', $_SESSION['id_empresa']);
        }
        
    }

    public function render($template, $params){
        $plantilla = $this->twig->load($template);
        echo $plantilla->render($params);
    }

}