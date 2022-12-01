<?php
// src/entity/FacturasEntity.php

namespace App\Entity;
use DateTime;
use App\Repository\FacturasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FacturasRepository::class)
 * @ORM\Table(name="facturas")
*/

class FacturasEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id_factura", type="integer")
    */
    private int $id_factura;

    /**
     * @ORM\Column(name="fecha", type="date")
     */
    private DateTime $fecha_factura;

    /**
    * @ORM\Column(name="id_pedido", type="int")
    */
    private $id_pedido;

    /**
     * @ORM\Column(name="tipo", type="string", length=2, nullable="true")
     */
    private ?string $tipo_factura;

    /**
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2)
     */
    private float $valor;

}