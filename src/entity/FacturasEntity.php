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


    /**
     * Get the value of id_factura
     */
    public function getIdFactura(): int
    {
        return $this->id_factura;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha(DateTime $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of pedido
     */
    public function getPedido(): PedidosEntity
    {
        return $this->pedido;
    }

    /**
     * Set the value of pedido
     */
    public function setPedido(PedidosEntity $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo(?string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of valor
     */
    public function getValor(): float
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     */
    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }
}