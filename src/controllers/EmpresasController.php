<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\EmpresasEntity;

class EmpresasController extends AbstractController
{
    public function getAll()
    {
        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $empresasRepository = $entityManager->getRepository(EmpresasEntity::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $empresasRepository->findAll();
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
        $this->render("list.html.twig", [
            "table_for" => "empresas",
            "list_tittle" => "Lista de Empresas",
            "results" => $data
        ]);
    }

}