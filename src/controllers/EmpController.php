<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Emp;

class EmpController extends AbstractController
{
    public function getEmp(){

        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $empleados = $entityManager->getRepository(Emp::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $empleados->findAll();
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
        $this->render("listaEmp.html.twig", [
            "title" => "Empleados",
            "banner_description" => "Listado de Empleados",
            "results" => $data
        ]);
    }

    public function getEmpByDept($dept){
        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $empleados = $entityManager->getRepository(Emp::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $empleados->findBy(
            [
                "dept_no" => $dept
            ]
        );
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
        $this->render("listaEmp.html.twig", [
            "title" => "Empleados",
            "banner_description" => "Listado de Empleados por Departamento",
            "results" => $data
        ]);
    }

}