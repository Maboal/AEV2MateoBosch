<?php

namespace App\Controllers;

use App\Core\AbstractController;

class RutaNoDefinidaController extends AbstractController
{

    public function rutaNoDefinida(){
        $this->render('rutaNoDef.html.twig',
        [
            "message" => "Ruta no definida"
        ]);
    }
}