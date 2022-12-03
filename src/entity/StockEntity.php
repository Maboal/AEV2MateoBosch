<?php
// src/entity/StockEntity.php

namespace App\Entity;
use DateTime;
use App\Entity\ProductosEntity;
use App\Repository\StockRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockRepository::class)
 * @ORM\Table(name="stock")
*/

class StockEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id_mov", type="integer")
    */
    private int $id_mov;

    /**
     * @ORM\Column(name="fecha", type="date")
     */
    private DateTime $fecha;

    /**
    * @ORM\Column(name="producto", type="integer")
    */
    private int $producto;

    /**
     * @ORM\Column(name="cantidad", type="decimal", precision=6, scale=2)
     */
    private float $cantidad;

    /**
     * @ORM\Column(name="stock", type="decimal", precision=6, scale=2)
     */
    private float $stock;

    /**
     * @ORM\Column(name="precio", type="decimal", precision=6, scale=2)
     */
    private float $precio;

    /**
     * @ORM\Column(name="unidad", type="string", length=3)
     */
    private string $unidad;

    /**
     * @ORM\Column(name="almacen", type="string", length=5)
     */
    private string $almacen;

    /**
     * Many stock have one producto
     * @ORM\ManyToOne(targetEntity="ProductosEntity", inversedBy="producto")
     * @JoinColumn(name="producto", referencedColumnName="codigo")
     */
    private ProductosEntity $StockProducto;

    /**
     * Many Stock has One Almacen
     * @ORM\ManyToOne(targetEntity="AlmacenesEntity", inversedBy="stock")
     * @JoinColumn(name="almacen", referencedColumnName="nombre")
     */
    private AlmacenesEntity $nombreAlmacen;
}