<?php
// src/entity/ProductosEntity.php

namespace App\Entity;
use App\Repository\ProductosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductosRepository::class)
 * @ORM\Table(name="productos")
*/

class ProductosEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="codigo", type="integer")
    */
    private int $codigo_producto;

    /**
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private string $descripcion_producto;

    /**
     * @ORM\Column(name="almace", type="string", length=5)
     */
    private string $almacen;

    /**
     * @ORM\Column(name="unidad", type="string", length=4)
     */
    private string $unidad;
    
    /**
     * @ORM\Column(name="clasificacion", type="string", length=1, nullable="true")
     */
    private ?string $clasificacion_producto;

    /**
     * @ORM\Column(name="preciounidad", type="decimal", precision=6, scale=2)
     */
    private float $precioUnidad_producto;
}