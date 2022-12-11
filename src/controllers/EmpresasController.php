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

    public function insert()
    {   
        if (!isset($_POST['nombre']) && !isset($_POST['cif']) && !isset($_POST['tipo'])){
        $this->render("layout.html.twig", [
            "action" => "/insert",
            "form_name" => "Insertar Empresa",
            "value_submit" => "Insertar"
        ]);
        };

        if (isset($_POST['nombre']) && isset($_POST['cif']) && isset($_POST['tipo'])){
            // Obtenemos el objeto EntityManager para poder realizar la insercion
            $entityManager = (new EntityManager())->getEntityManager();
            // Creamos nuevo objeto entidad
            $newEmpresa = new EmpresasEntity();
            // Settear valores
            $newEmpresa->setNombre($_POST['nombre']);
            $newEmpresa->setCif($_POST['cif']);
            $newEmpresa->setTipo($_POST['tipo']);
            // Persistir en doctrine y flush en BBDD
            $entityManager->persist($newEmpresa);
            $entityManager->flush();
            // Regresamos a la vista /business
            $this->getAll();
        }

        
        

    }
}