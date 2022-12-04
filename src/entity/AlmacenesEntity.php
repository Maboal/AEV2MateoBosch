<?php
// src/entity/AlmacenesEntity.php

namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\AlmacenesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlmacenesRepository::class)
 * @ORM\Table(name="almacenes")
*/

class AlmacenesEntity
{
    /**
    * @ORM\Id
    * @ORM\Column(name="nombre", type="string", length=5)
    */
    private string $nombre;

    /**
     * @ORM\Column(name="localizacion", type="string", length=255, nullable="true")
     */
    private ?string $localizacion_almacen;

    /**
    * @ORM\Column(name="descripcion", type="string", length=255, nullable="true")
    */
    private ?string $descripcion_almacen;
    
    /**
     * One almacen has Many productos
     * @ORM\OneToMany(targetEntity="ProductosEntity", mappedBy="nombreAlmacen")
     */  
    private Collection $producto;

    /**
     * One almacen has Many stock
     * @ORM\OneToMany(targetEntity="StockEntity", mappedBy="nombreAlmacen")
     */  
    private Collection $stock;

    public function __construct() {
        $this->almacen = new ArrayCollection();
        $this->producto = new ArrayCollection();
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of localizacion_almacen
     */
    public function getLocalizacionAlmacen(): ?string
    {
        return $this->localizacion_almacen;
    }

    /**
     * Set the value of localizacion_almacen
     */
    public function setLocalizacionAlmacen(?string $localizacion_almacen): self
    {
        $this->localizacion_almacen = $localizacion_almacen;

        return $this;
    }

    /**
     * Get the value of descripcion_almacen
     */
    public function getDescripcionAlmacen(): ?string
    {
        return $this->descripcion_almacen;
    }

    /**
     * Set the value of descripcion_almacen
     */
    public function setDescripcionAlmacen(?string $descripcion_almacen): self
    {
        $this->descripcion_almacen = $descripcion_almacen;

        return $this;
    }

    /**
     * Get the value of producto
     */
    public function getProducto(): Collection
    {
        return $this->producto;
    }

    /**
     * Set the value of producto
     */
    public function setProducto(Collection $producto): self
    {
        $this->producto = $producto;

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
}   