<?php
// src/entity/PedidosEntity.php

namespace App\Entity;
use DateTime;
use App\Repository\PedidosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PedidosRepository::class)
 * @ORM\Table(name="pedidos")
*/

class PedidosEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id", type="integer")
    */
    private int $id_pedido;

    /**
     * @ORM\Column(name="tipo", type="string", length=1)
     */
    private string $tipo_pedido;

    /**
    * @ORM\Column(name="fecha", type="date")
    */
    private DateTime $fecha_pedido;

    /**
    * @ORM\Column(name="observacion", type="string", length=255, nullable="true")
    */
    private ?string $observacion_pedido;

    /**
     * @ORM\Column(name="id_empresa", type="int")
     */
    private int $id_empresa;

    
    // GETTERS Y SETTERS
        

}