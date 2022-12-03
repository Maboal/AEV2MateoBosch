<?php
// src/entity/ProductosEntity.php

namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
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
    private int $codigo;

    /**
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private string $descripcion;

    /**
     * @ORM\Column(name="almacen", type="string", length=5)
     */
    private string $almacen;

    /**
     * @ORM\Column(name="unidad", type="string", length=4)
     */
    private string $unidad;
    
    /**
     * @ORM\Column(name="clasificacion", type="string", length=1, nullable="true")
     */
    private ?string $clasificacion;

    /**
     * @ORM\Column(name="preciounidad", type="decimal", precision=6, scale=2)
     */
    private float $precioUnidad;

    /**
     * One producto has Many lineapedido
     * @OneToMany(targetEntity="LineasPedidosEntity", mappedBy="producto")
     */
    private Collection $lineapedido;

    /**
     * One producto has Many Stock
     * @OneToMany(targetEntity="StockEntity", mappedBy="StockProducto")
     */
    private Collection $stock;

    /**
     * Many Producto has One Almacen
     * @ORM\ManyToOne(targetEntity="AlmacenesEntity", inversedBy="producto")
     * @JoinColumn(name="almacen", referencedColumnName="nombre")
     */
    private AlmacenesEntity $nombreAlmacen;

    public function __construct()
    {
        $this->lineapedido = new ArrayCollection();
        $this->stock = new ArrayCollection();
    }
}