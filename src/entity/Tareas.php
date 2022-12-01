<?php
// src/entity/Tareas.php

namespace App\Entity;
use App\Repository\TareasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TareasRepository::class)
 * @ORM\Table(name="tareas")
*/

class Tareas
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id", type="integer")
    */
    private $id;

    /**
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
    * @ORM\Column(name="descripcion", type="text", length=65535)
    */
    private $descripcion;

    /**
     * @ORM\Column(name="fecha_creacion", type="date")
     */
    private $fecha_creacion;

    /**
     * @ORM\Column(name="fecha_vencimiento", type="date")
     */
    private $fecha_vencimiento;

    // getters y setters
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getFecha_creacion()
    {
        return $this->fecha_creacion;
    }

    public function setFecha_creacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getFecha_vencimiento()
    {
        return $this->fecha_vencimiento;
    }

    public function setFecha_vencimiento($fecha_vencimiento)
    {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }
}