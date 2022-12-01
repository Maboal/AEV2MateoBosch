<?php
// src/entity/AlmacenesEntity.php

namespace App\Entity;
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
    * @ORM\Column(name="nombre_almacen", type="string", length=5)
    */
    private string $nombre_almacen;

    /**
     * @ORM\Column(name="localizacion", type="string", length=255, nullable="true")
     */
    private ?string $localizacion_almacen;

    /**
    * @ORM\Column(name="descripcion", type="string", length=255, nullable="true")
    */
    private ?string $descripcion_almacen;
    
}