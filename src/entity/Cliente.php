<?php
// src/entity/Cliente.php

namespace App\Entity;
use App\Entity\Emp;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 * @ORM\Table(name="cliente")
*/

class Cliente
{
    /**
    * @ORM\Id
    * @ORM\Column(name="CLIENTE_COD ", type="integer", length=6)
    */
    private int $cliente_cod;

    /**
     * @ORM\Column(name="NOMBRE", type="string", length=45)
     */
    private string $nombre;

    /**
    * @ORM\Column(name="DIREC", type="string", length=40)
    */
    private string $direc;

    /**
     * @ORM\Column(name="CIUDAD", type="string", length=30)
     */
    private string $ciudad;

    /**
     * @ORM\Column(name="ESTADO", type="string", length=2, nullable="true")
     */
    private string|null $estado;

    /**
     * @ORM\Column(name="COD_POSTAL", type="string", length=9)
     */
    private string $cod_postal;

    /**
     * @ORM\Column(name="AREA", type="integer", length=3, nullable="true")
     */
    private int|null $area;

    /**
     * @ORM\Column(name="TELEFONO", type="string", length=9, nullable="true")
     */
    private string|null $telefono;

    /**
     * @ORM\Column(name="REPR_COD", type="integer", length=4, nullable="true")
     * @ORM\ManyToOne(targetEntity="Emp", inversedBy="clientes_repr")
     * @ORM\JoinColumn(name="REPR_COD", referencedColumnName="EMP_NO")
     */
    private Emp|int|null $repr_cod;

    /**
     * @ORM\Column(name="LIMITE_CREDITO", type="decimal", precision=9, scale=2, nullable="true")
     */
    private float|null $limite_credito;

    /**
     * @ORM\Column(name="OBSERVACIONES", type="text", length=65535, nullable="true")
     */
    private string|null $observaciones;
    
    /**
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="cliente_cod")
    **/
    private Collection $pedidos;

    public function __construct()
    {
        $this->pedidos = new ArrayCollection();
    }
    // getters y setters
    

 

    

    /**
     * Get the value of cliente_cod
     */
    public function getClienteCod(): int
    {
        return $this->cliente_cod;
    }

    /**
     * Set the value of cliente_cod
     */
    public function setClienteCod(int $cliente_cod): self
    {
        $this->cliente_cod = $cliente_cod;

        return $this;
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
     * Get the value of direc
     */
    public function getDirec(): string
    {
        return $this->direc;
    }

    /**
     * Set the value of direc
     */
    public function setDirec(string $direc): self
    {
        $this->direc = $direc;

        return $this;
    }

    /**
     * Get the value of ciudad
     */
    public function getCiudad(): string
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     */
    public function setCiudad(string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado(): ?string
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of cod_postal
     */
    public function getCodPostal(): string
    {
        return $this->cod_postal;
    }

    /**
     * Set the value of cod_postal
     */
    public function setCodPostal(string $cod_postal): self
    {
        $this->cod_postal = $cod_postal;

        return $this;
    }

    /**
     * Get the value of area
     */
    public function getArea(): ?int
    {
        return $this->area;
    }

    /**
     * Set the value of area
     */
    public function setArea(?int $area): self
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     */
    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of repr_cod
     */
    public function getReprCod(): int|Emp
    {
        return $this->repr_cod;
    }

    /**
     * Set the value of repr_cod
     */
    public function setReprCod($repr_cod): self
    {
        $this->repr_cod = $repr_cod;

        return $this;
    }

    /**
     * Get the value of limite_credito
     */
    public function getLimiteCredito(): ?float
    {
        return $this->limite_credito;
    }

    /**
     * Set the value of limite_credito
     */
    public function setLimiteCredito(?float $limite_credito): self
    {
        $this->limite_credito = $limite_credito;

        return $this;
    }

    /**
     * Get the value of observaciones
     */
    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     */
    public function setObservaciones(?string $observaciones): self
    {
        $this->observaciones = $observaciones;

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