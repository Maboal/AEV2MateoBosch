<?php
// src/entity/Pedido.php

namespace App\Entity;
use App\Entity\Cliente;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\PedidoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PedidoRepository::class)
 * @ORM\Table(name="pedido")
*/

class Pedido
{
    /**
    * @ORM\Id
    * @ORM\Column(name="PEDIDO_NUM", type="integer", length=4)
    */
    private int $pedido_num;

    /**
     * @ORM\Column(name="PEDIDO_FECHA", type="date", nullable = "true")
     */
    private $pedido_fecha;

    /**
    * @ORM\Column(name="PEDIDO_TIPO", type="string", length=1, nullable = "true")
    */
    private string|null $pedido_tipo;

    /**
    * @ORM\Column(name="CLIENTE_COD", type="integer", length=6)
    * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="pedidos")
    * @ORM\JoinColumn(name="CLIENTE_COD", referencedColumnName="CLIENTE_COD")
    */
    private int|Cliente $cliente_cod;

    /**
     * @ORM\Column(name="FECHA_ENVIO", type="date", nullable="true")
     */
    private $fecha_envio;

    /**
     * @ORM\Column(name="TOTAL", type="decimal", precision=8, scale=2, nullable = "true")
     */
    private float|null $total;

    /**
     * @ORM\OneToMany(targetEntity="Detalle", mappedBy="pedido_num")
     * 
     */
    private Collection $detalle_pedido;

    public function __construct(){
        $this->detalle_pedido = new ArrayCollection();
    }

    // GETTERS Y SETTERS
        
    

    

    /**
     * Get the value of pedido_num
     */
    public function getPedidoNum(): int
    {
        return $this->pedido_num;
    }

    /**
     * Set the value of pedido_num
     */
    public function setPedidoNum(int $pedido_num): self
    {
        $this->pedido_num = $pedido_num;

        return $this;
    }

    /**
     * Get the value of pedido_fecha
     */
    public function getPedidoFecha()
    {
        return $this->pedido_fecha;
    }

    /**
     * Set the value of pedido_fecha
     */
    public function setPedidoFecha($pedido_fecha): self
    {
        $this->pedido_fecha = $pedido_fecha;

        return $this;
    }

    /**
     * Get the value of pedido_tipo
     */
    public function getPedidoTipo(): ?string
    {
        return $this->pedido_tipo;
    }

    /**
     * Set the value of pedido_tipo
     */
    public function setPedidoTipo(?string $pedido_tipo): self
    {
        $this->pedido_tipo = $pedido_tipo;

        return $this;
    }

    /**
     * Get the value of cliente_cod
     */
    public function getClienteCod(): int|Cliente
    {
        return $this->cliente_cod;
    }

    /**
     * Set the value of cliente_cod
     */
    public function setClienteCod($cliente_cod): self
    {
        $this->cliente_cod = $cliente_cod;

        return $this;
    }

   

    /**
     * Get the value of total
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * Set the value of total
     */
    public function setTotal(?float $total): self
    {
        $this->total = $total;

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

    /**
     * Get the value of fecha_envio
     */
    public function getFechaEnvio()
    {
        return $this->fecha_envio;
    }

    /**
     * Set the value of fecha_envio
     */
    public function setFechaEnvio($fecha_envio): self
    {
        $this->fecha_envio = $fecha_envio;

        return $this;
    }
}