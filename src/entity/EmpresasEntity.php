<?php
// src/entity/EmpresasEntity.php

namespace App\Entity;
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
    private int $id_empresa;

    /**
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private string $nombre_empresa;

    /**
    * @ORM\Column(name="CIF", type="string", length=9)
    */
    private string $cif_empresa;

    /**
     * @ORM\Column(name="tipo", type="string", length=1)
     */
    private string $tipo_empresa;
}