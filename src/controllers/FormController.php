<?php

namespace App\Controllers;

use App\Core\AbstractController;    
use App\Core\EntityManager;
use App\Entity\Producto;

class FormController extends AbstractController
{
    public function formInsertDetalle()
    {
        $this->render(
            'formInsertDetalle.html.twig',
            [
                "title" => "Insertar Detalle",
                "banner_description" => "Insertar Detalle"
            ]
        );
    }

    public function formInsertProducto()
    {
        $this->render(
            'formInsertProducto.html.twig',
            [
                "title" => "Insertar Producto",
                "banner_description" => "Insertar Producto"
            ]
        );
    }

    public function formUpdateProducto($prodNum)
    {
        // Instanciamos entity manager
        $entityManager = (new EntityManager())->getEntityManager();
        // Instanciamos el producto que vamos a eliminar y lo eliminamos
        $producto = $entityManager->getRepository(Producto::class);
        $data = $producto->find($prodNum);

        $this->render(
            'formUpdateProducto.html.twig',
            [
                "title" => "Actualizar Producto",
                "banner_description" => "Actualizar Producto $prodNum",
                "result" => $data
            ]
        );
    }
}