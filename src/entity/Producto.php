<?php
// src/entity/Producto.php

namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\ProductoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 * @ORM\Table(name="producto")
*/

class Producto
{
    /**
    * @ORM\Id
    * @ORM\Column(name="PROD_NUM", type="integer", length=6)
    */
    private int $prod_num;

    /**
     * @ORM\Column(name="DESCRIPCION", type="string", length=30)
     */
    private string $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="detalle", mappedBy="prod_num")
     */
    private Collection $detalle_pedido;
    

    public function __construct()
    {
        $this->detalle_pedido = new ArrayCollection();
    }


    // GETTERS Y SETTERS
    
    /**
     * Get the value of prod_num
     */
    public function getProdNum(): int
    {
        return $this->prod_num;
    }

    /**
     * Set the value of prod_num
     */
    public function setProdNum(int $prod_num): self
    {
        $this->prod_num = $prod_num;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of detalle_pedido
     */
    public function getDetallePedido(): Collection
    {
        return $this->detalle_pedido;
    }

    /**
     * Set the value of detalle_pedido
     */
    public function setDetallePedido(Collection $detalle_pedido): self
    {
        $this->detalle_pedido = $detalle_pedido;

        return $this;
    }
}