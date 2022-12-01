<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Cliente;

class ClienteController extends AbstractController
{
    public function getClientes(){

        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $clientes = $entityManager->getRepository(Cliente::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $clientes->findAll();
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
        $this->render("listaClientes.html.twig", [
            "title" => "Clientes",
            "banner_description" => "Listado de Clientes",
            "results" => $data
        ]);
    }

    public function getClienteByCod($cliente_cod){
        
        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $clientes = $entityManager->getRepository(Cliente::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $clientes->find($cliente_cod);
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
        $this->render("detalleCliente.html.twig", [
            "title" => "Cliente",
            "banner_description" => "Detalle Cliente",
            "results" => $data
        ]);
    }
}