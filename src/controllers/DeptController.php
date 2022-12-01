<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Dept;

class DeptController extends AbstractController
{
    public function getDept()
    {
        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $departamentos = $entityManager->getRepository(Dept::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $departamentos->findAll();
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
        $this->render("listaDepartamentos.html.twig", [
            "title" => "Departamentos",
            "banner_description" => "Listado de Departamentos",
            "results" => $data
        ]);
    }
}