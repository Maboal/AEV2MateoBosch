<?php
// src/entity/EmpresasEntity.php

namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\EmpresasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpresasRepository::class)
 * @ORM\Table(name="empresas")
*/

class EmpresasEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id", type="integer")
    */
    private int $id;

    /**
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private string $nombre;

    /**
    * @ORM\Column(name="CIF", type="string", length=9)
    */
    private string $cif;

    /**
     * @ORM\Column(name="tipo", type="string", length=1)
     */
    private string $tipo;

    /**
     * @ORM\OneToMany(targetEntity="PedidosEntity", mappedBy="empresa")
     */
    private Collection $pedidos;

    public function __construct()
    {
        $this->pedidos = new ArrayCollection();
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
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
     * Get the value of cif
     */
    public function getCif(): string
    {
        return $this->cif;
    }

    /**
     * Set the value of cif
     */
    public function setCif(string $cif): self
    {
        $this->cif = $cif;

        return $this;
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
     * Get the value of pedidos
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }

    /**
     * Set the value of pedidos
     */
    public function setPedidos(Collection $pedidos): self
    {
        $this->pedidos = $pedidos;

        return $this;
    }
}