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
     * @ORM\OneToMany(targetEntity="LineasPedidosEntity", mappedBy="producto")
     */
    private Collection $lineapedido;

    /**
     * One producto has Many Stock
     * @ORM\OneToMany(targetEntity="StockEntity", mappedBy="StockProducto")
     */
    private Collection $stock;

    /**
     * Many Producto has One Almacen
     * @ORM\ManyToOne(targetEntity="AlmacenesEntity", inversedBy="producto")
     * @ORM\JoinColumn(name="almacen", referencedColumnName="nombre")
     */
    private AlmacenesEntity $nombreAlmacen;

    public function __construct()
    {
        $this->lineapedido = new ArrayCollection();
        $this->stock = new ArrayCollection();
    }

    /**
     * Get the value of codigo
     */
    public function getCodigo(): int
    {
        return $this->codigo;
    }


    /**
     * Get the value of descripcion
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of almacen
     */
    public function getAlmacen(): string
    {
        return $this->almacen;
    }

    /**
     * Set the value of almacen
     */
    public function setAlmacen(string $almacen): self
    {
        $this->almacen = $almacen;

        return $this;
    }

    /**
     * Get the value of unidad
     */
    public function getUnidad(): string
    {
        return $this->unidad;
    }

    /**
     * Set the value of unidad
     */
    public function setUnidad(string $unidad): self
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get the value of clasificacion
     */
    public function getClasificacion(): ?string
    {
        return $this->clasificacion;
    }

    /**
     * Set the value of clasificacion
     */
    public function setClasificacion(?string $clasificacion): self
    {
        $this->clasificacion = $clasificacion;

        return $this;
    }

    /**
     * Get the value of precioUnidad
     */
    public function getPrecioUnidad(): float
    {
        return $this->precioUnidad;
    }

    /**
     * Set the value of precioUnidad
     */
    public function setPrecioUnidad(float $precioUnidad): self
    {
        $this->precioUnidad = $precioUnidad;

        return $this;
    }

    /**
     * Get the value of lineapedido
     */
    public function getLineapedido(): Collection
    {
        return $this->lineapedido;
    }

    /**
     * Set the value of lineapedido
     */
    public function setLineapedido(Collection $lineapedido): self
    {
        $this->lineapedido = $lineapedido;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock(): Collection
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     */
    public function setStock(Collection $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of nombreAlmacen
     */
    public function getNombreAlmacen(): AlmacenesEntity
    {
        return $this->nombreAlmacen;
    }

    /**
     * Set the value of nombreAlmacen
     */
    public function setNombreAlmacen(AlmacenesEntity $nombreAlmacen): self
    {
        $this->nombreAlmacen = $nombreAlmacen;

        return $this;
    }
}