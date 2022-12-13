<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\FacturasEntity;
use App\Entity\PedidosEntity;

class FacturasController extends AbstractController
{
    public function getAll()
    {
        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $facturasRepository = $entityManager->getRepository(FacturasEntity::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $facturasRepository->findAll();
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
        $this->render("list2.html.twig", [
            "table_for" => "facturas",
            "list_tittle" => "Lista de Facturas",
            "results" => $data
        ]);
    }

    public function getFacturaPedido($id_factura)
    {
        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $facturasRepository = $entityManager->getRepository(FacturasEntity::class);
        // Aplicamos el metodo predefinido de doctrine
        $factura = $facturasRepository->findOneBy(["id_factura"=>$id_factura]);
        // agregamos a la variable de sesion el id del pedido
        $_SESSION['id_pedido'] = $factura->getPedido()->getId();
        // obtenemos resultados de la consulta al pedido que tenemos guardado en la variable de sesion
        $pedidosRepository = $entityManager->getRepository(PedidosEntity::class);
        $pedido = $pedidosRepository->findOneBy(['id'=>$_SESSION['id_pedido']]);
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findOneBy() tanto de la factura como del pedido
        $this->render("list2.html.twig", [
            "table_for" => "PedidoFactura",
            "factura_tittle" => "Factura $id_factura",
            "factura" => $factura,
            "pedido_tittle" => "Pedido",
            "pedido" => $pedido
        ]);
    }
}