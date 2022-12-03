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
}