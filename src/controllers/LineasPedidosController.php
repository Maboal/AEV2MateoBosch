<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\PedidosEntity;

class PedidosController extends AbstractController
{
    
    public function getDetails($id)
    {
        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $pedidosRepository = $entityManager->getRepository(PedidosEntity::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $pedidosRepository->find($id);
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
        $this->render("list2.html.twig", [
            "table_for" => "pedidoDetalle",
            "list_tittle" => "Detalle pedido $id",
            "result" => $data
        ]);
    }
}