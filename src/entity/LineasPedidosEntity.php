<?php
// src/entity/LineasPedidosEntity.php

namespace App\Entity;
use App\Repository\LineasPedidosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LineasPedidosRepository::class)
 * @ORM\Table(name="lineaspedidos")
*/

class LineasPedidosEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id_linea", type="integer")
    */
    private int $id_linea;
    
    /**
    * @ORM\Column(name="id_pedido", type="integer")
    */
    private int $id_pedido;

    /** 
    * @ORM\Column(name="codigo_producto", type="integer")
    **/
    private int $codigo_producto;

    /**
     * @ORM\Column(name="cantidad", type="decimal", precision=6, scale=2)
     */
    private float $cantidad;

    /**
     * @ORM\Column(name="precio", type="decimal", precision=6, scale=2)
     */
    private float $precio;

}
