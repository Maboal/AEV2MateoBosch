<?php
// src/entity/LineasPedidosEntity.php

namespace App\Entity;
use App\Entity\PedidosEntity;
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

    /**
     * Many Lineaspedidos tienen One Pedido
     * @ORM\ManyToOne(targetEntity="PedidosEntity", inversedBy="lineapedido")
     * @ORM\JoinColumn(name="id_pedido", referencedColumnName="id")
     */
    private PedidosEntity $pedido;

    /**
     * Many Lineaspedidos tienen One Producto
     * @ORM\ManyToOne(targetEntity="ProductosEntity", inversedBy="lineapedido")
     * @ORM\JoinColumn(name="codigo_producto", referencedColumnName="codigo")
     */
    private ProductosEntity $producto;


    /**
     * Get the value of id_linea
     */
    public function getIdLinea(): int
    {
        return $this->id_linea;
    }

    /**
     * Get the value of id_pedido
     */
    public function getIdPedido(): int
    {
        return $this->id_pedido;
    }

    /**
     * Set the value of id_pedido
     */
    public function setIdPedido(int $id_pedido): self
    {
        $this->id_pedido = $id_pedido;

        return $this;
    }

    /**
     * Get the value of codigo_producto
     */
    public function getCodigoProducto(): int
    {
        return $this->codigo_producto;
    }

    /**
     * Set the value of codigo_producto
     */
    public function setCodigoProducto(int $codigo_producto): self
    {
        $this->codigo_producto = $codigo_producto;

        return $this;
    }

    /**
     * Get the value of cantidad
     */
    public function getCantidad(): float
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     */
    public function setCantidad(float $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

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
     * Get the value of producto
     */
    public function getProducto(): ProductosEntity
    {
        return $this->producto;
    }

    /**
     * Set the value of producto
     */
    public function setProducto(ProductosEntity $producto): self
    {
        $this->producto = $producto;

        return $this;
    }
}
