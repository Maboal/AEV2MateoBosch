<?php
// src/entity/Detalle.php

namespace App\Entity;
use App\Entity\Pedido;
use App\Entity\Producto;
use App\Repository\DetalleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetalleRepository::class)
 * @ORM\Table(name="detalle")
*/

class Detalle
{
    /**
    * @ORM\Id
    * @ORM\Column(name="PEDIDO_NUM", type="integer", length=4)
    * @ORM\ManyToOne(targetEntity="Pedido", inversedBy="detalle_pedido")
    * @ORM\JoinColumn(name="PEDIDO_NUM", referencedColumnName="PEDIDO_NUM")
    */
    private int|Pedido $pedido_num;

    /**
    * @ORM\Id
    * @ORM\Column(name="DETALLE_NUM", type="integer", length=4)
    */
    private int $detalle_num;

    /** 
    * @ORM\Column(name="PROD_NUM", type="integer", length=6)
    * @ORM\ManyToOne(targetEntity="Producto", inversedBy="prod_num")
    * @ORM\JoinColumn(name="PROD_NUM", referencedColumnName="PROD_NUM")
    */
    private int|Producto $prod_num;

    /**
     * @ORM\Column(name="PRECIO_VENTA", type="decimal", precision=8, scale=2, nullable="true")
     */
    private float|null $precio_venta;

    /**
     * @ORM\Column(name="CANTIDAD", type="integer", length=8, nullable="true")
     */
    private int|null $cantidad;

    /**
     * @ORM\Column(name="IMPORTE", type="decimal", precision=8, scale=2, nullable="true")
     */
    private float|null $importe;

    // Inicializacion de las ID
    public function __construct(int $detalle_num, Pedido $pedido_num){
        $this->detalle_num = $detalle_num;
        $this->pedido_num = $pedido_num;
    }

    

   

    
    

    /**
     * Get the value of pedido_num
     */
    public function getPedidoNum(): int|Pedido
    {
        return $this->pedido_num;
    }

    /**
     * Set the value of pedido_num
     */
    public function setPedidoNum($pedido_num): self
    {
        $this->pedido_num = $pedido_num;

        return $this;
    }

    /**
     * Get the value of detalle_num
     */
    public function getDetalleNum(): int
    {
        return $this->detalle_num;
    }

    /**
     * Set the value of detalle_num
     */
    public function setDetalleNum(int $detalle_num): self
    {
        $this->detalle_num = $detalle_num;

        return $this;
    }

    /**
     * Get the value of prod_num
     */
    public function getProdNum(): int|Producto
    {
        return $this->prod_num;
    }

    /**
     * Set the value of prod_num
     */
    public function setProdNum($prod_num): self
    {
        $this->prod_num = $prod_num;

        return $this;
    }

    /**
     * Get the value of precio_venta
     */
    public function getPrecioVenta(): ?float
    {
        return $this->precio_venta;
    }

    /**
     * Set the value of precio_venta
     */
    public function setPrecioVenta(?float $precio_venta): self
    {
        $this->precio_venta = $precio_venta;

        return $this;
    }

    /**
     * Get the value of cantidad
     */
    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     */
    public function setCantidad(?int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get the value of importe
     */
    public function getImporte(): ?float
    {
        return $this->importe;
    }

    /**
     * Set the value of importe
     */
    public function setImporte(?float $importe): self
    {
        $this->importe = $importe;

        return $this;
    }
}