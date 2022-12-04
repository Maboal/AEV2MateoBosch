<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\ProductosEntity;

class ProductosController extends AbstractController
{
    public function getAll()
    {
        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $productosRepository = $entityManager->getRepository(ProductosEntity::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $productosRepository->findAll();
        // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
        $this->render("list.html.twig", [
            "table_for" => "productos",
            "list_tittle" => "Lista de Productos",
            "results" => $data
        ]);
    }

    // public function insertProducto()
    // {
    //     $entityManager = (new EntityManager())->getEntityManager();
    //     $newProducto = new Producto;
    //     $newProducto->setProdNum($_POST['prod_num']);
    //     $newProducto->setDescripcion($_POST['descripcion']);
    //     $entityManager->persist($newProducto);
    //     $entityManager->flush();

    //     $this->getProductos();
    // }

    // public function removeProducto($ProdNum)
    // {   
    //     // Instanciamos entity manager
    //     $entityManager = (new EntityManager())->getEntityManager();
    //     // Instanciamos el producto que vamos a eliminar y lo eliminamos
    //     $producto = $entityManager->getRepository(Producto::class);
    //     $entityManager->remove($producto->find($ProdNum));
    //     $entityManager->flush();

    //     $this->getProductos();
    // }

    // public function updateProducto(){
    //     // Instanciamos entity manager
    //     $entityManager = (new EntityManager())->getEntityManager();
    //     // Instanciamos el producto que vamos a modificar y le damos su repositorio
    //     $productoRepository = $entityManager->getRepository(Producto::class);
    //     $producto = $productoRepository->find($_POST['prod_num']);
    //     // Modificamos
    //     $producto->setDescripcion($_POST['descripcion']);
    
    //     $entityManager->persist($producto);
    //     $entityManager->flush();

    //     $this->getProductos();
    // }
}