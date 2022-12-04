<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\AlmacenesEntity;

class AlmacenesController extends AbstractController
{
    public function getAll()
    {
        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $almacenesRepository = $entityManager->getRepository(AlmacenesEntity::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $almacenesRepository->findAll();
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
        $this->render("list.html.twig", [
            "table_for" => "almacenes",
            "list_tittle" => "Lista de Almacenes",
            "results" => $data
        ]);
    }


}