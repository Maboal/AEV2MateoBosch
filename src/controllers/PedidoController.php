<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Pedido;
use App\Entity\Cliente;

class PedidoController extends AbstractController
{
    public function getPedidosPorCliente(){
    
        // Instanciamos EntityManager
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos los clientes 
        $clientes = $entityManager->getRepository(Cliente::class);
        $dataClientes = $clientes->findAll();
        
        //Obtenemos los pedidos
        $pedidos = $entityManager->getRepository(Pedido::class);
        $dataPedidos = $pedidos->findAll();

        // Comprobamos que la seleccion del formulario POST se ha realizado
        if (!isset ($_POST['clientes'])) $_POST['clientes'] = "";

        // Renderizacion de la vista
        $this->render('listaPedidosYClientes.html.twig',
        [
            "title" => "Lista Pedidos",
            "banner_description" => "Lista Pedidos",
            "resultClientes" => $dataClientes,
            "resultPedidos" => $dataPedidos,
            "clienteSelec" => $_POST['clientes'] 
        ]);
    }

    public function getPedidoById($id) {
        
        // Instanciamos EntityManager
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos pedido por id
        $pedido = $entityManager->getRepository(Pedido::class);
        $dataPedido = $pedido->find($id);

        // Renderizacion de la vista
        $this->render('detallePedido.html.twig',
        [
            "title" => "Detalle Pedido $id",
            "banner_description" => "Detalle Pedido $id",
            "results" => $dataPedido
        ]
        );
    }

}