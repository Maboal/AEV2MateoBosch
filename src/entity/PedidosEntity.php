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
        

}