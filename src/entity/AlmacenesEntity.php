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
     * @OneToMany(targetEntity="ProductosEntity", mappedBy="nombreAlmacen")
     */  
    private Collection $producto;

    /**
     * One almacen has Many stock
     * @OneToMany(targetEntity="StockEntity", mappedBy="nombreAlmacen")
     */  
    private Collection $stock;

    public function __construct() {
        $this->almacen = new ArrayCollection();
        $this->producto = new ArrayCollection();
    }
}   