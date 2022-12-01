<?php

namespace App\Controllers;

use App\Core\AbstractController;

class MainController extends AbstractController
{
    public function main()
    {
        $this->render("base.html.twig", [
            
        ]);
    }
}