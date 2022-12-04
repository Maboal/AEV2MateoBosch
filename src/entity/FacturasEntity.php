<?php
// src/entity/FacturasEntity.php

namespace App\Entity;
use DateTime;
use App\Entity\PedidosEntity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
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
    private DateTime $fecha;

    /**
    * Many Factura has One Pedido
    * @ORM\ManyToOne(targetEntity="PedidosEntity")
    * @ORM\JoinColumn(name="id_pedido", referencedColumnName="id")
    */
    private PedidosEntity $pedido;

    /**
     * @ORM\Column(name="tipo", type="string", length=2, nullable="true")
     */
    private ?string $tipo;

    /**
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2)
     */
    private float $valor;

}