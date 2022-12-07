<?php
// src/entity/PedidosEntity.php

namespace App\Entity;
use DateTime;
use App\Entity\EmpresasEntity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
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
    private int $id;

    /**
     * @ORM\Column(name="tipo", type="string", length=1)
     */
    private string $tipo;

    /**
    * @ORM\Column(name="fecha", type="date")
    */
    private DateTime $fecha;

    /**
    * @ORM\Column(name="observacion", type="string", length=255, nullable="true")
    */
    private ?string $observacion;

    /**
     * Many Pedidos has One Empresa
     * @ORM\ManyToOne(targetEntity="EmpresasEntity", inversedBy="id")
     * @ORM\JoinColumn(name="id_empresa", referencedColumnName="id")
     */
    private EmpresasEntity $empresa;

    /**
     * One Pedido has Many lineapedido
     * @ORM\OneToMany(targetEntity="LineasPedidosEntity", mappedBy="pedido")
     */
    private Collection $lineapedido;

    public function __construct()
    {
        $this->lineapedido = new ArrayCollection();
    }
    
    // GETTERS Y SETTERS
        


    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
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
     * Get the value of observacion
     */
    public function getObservacion(): ?string
    {
        return $this->observacion;
    }

    /**
     * Set the value of observacion
     */
    public function setObservacion(?string $observacion): self
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get the value of empresa
     */
    public function getEmpresa(): EmpresasEntity
    {
        return $this->empresa;
    }

    /**
     * Set the value of empresa
     */
    public function setEmpresa(EmpresasEntity $empresa): self
    {
        $this->empresa = $empresa;

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
}