<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Detalle;

class DetalleController extends AbstractController
{
    public function getAll(){

        // Instanciamos EntityManager
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos los clientes 
        $detalles = $entityManager->getRepository(Detalle::class);
        $dataDetalles = $detalles->findAll();

        // Renderizacion de la vista
        $this->render('listaDetalle.html.twig',
        [
            "title" => "Lista Detalles",
            "banner_description" => "Lista Detalles",
            "results" => $dataDetalles
        ]);
    }

    public function insertDetalle(){
        // Instanciamos EntityManager
        $entityManager = (new EntityManager())->getEntityManager();
        
        // Creamos newDetalle con los datos POST del formInsertDetalle
        $newDetalle = new Detalle($_POST['detalle_num'], $_POST['pedido_num']);
        // $newDetalle->setPedido_num($_POST['pedido_num']);
        // $newDetalle->setDetalle_num($_POST['detalle_num']);
        $newDetalle->setProdNum($_POST['prod_num']);
        $newDetalle->setPrecioVenta($_POST['precio_venta']);
        $newDetalle->setCantidad($_POST['cantidad']);
        $newDetalle->setImporte($_POST['importe']);

        // Guardamos el newDetalle
        $entityManager->persist($newDetalle);
        $entityManager->flush();
    }


}