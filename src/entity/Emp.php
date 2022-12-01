<?php
// src/entity/Emp.php

namespace App\Entity;
use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Dept;
use App\Repository\EmpRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpRepository::class)
 * @ORM\Table(name="emp")
*/

class Emp
{
    /**
    * @ORM\Id
    * @ORM\Column(name="EMP_NO", type="integer", length=4)
    */
    private Collection|int $emp_no;

    /**
     * @ORM\Column(name="APELLIDOS", type="string", length=10)
     */
    private string $apellidos;

    /**
    * @ORM\Column(name="OFICIO", type="string", length=10, nullable=true)
    */
    private string|null $oficio;

    /**
     * @ORM\Column(name="JEFE", type="integer", length=4, nullable=true)
     * @ORM\ManyToOne(targetEntity="Emp", inversedBy="empleados_jefe")
     * @ORM\JoinColumn(name="JEFE", referencedColumnName="EMP_NO")
     */
    private Emp|int|null $jefe;
    /**
     * @ORM\OneToMany(targetEntity="Emp", mappedBy="jefe")
     */
    private Collection $empleados_jefe;

    /**
     * @ORM\Column(name="FECHA_ALTA", type="date", nullable=true)
     */
    private DateTime|null $fecha_alta;

    /**
     * @ORM\Column(name="SALARIO", type="integer", length=10, nullable=true)
     */
    private int|null $salario;

    /**
     * @ORM\Column(name="COMISION", type="integer", length=10, nullable=true)
     */
    private int|null $comision;

    /**
     * @ORM\Column(name="DEPT_NO", type="integer", length=2)
     * @ORM\ManyToOne(targetEntity="Dept", inversedBy="dept_no")
     * @ORM\JoinColumn(name="DEPT_NO", referencedColumnName="DEPT_NO")
     */
    private Dept|int $dept_no;

    /**
     * @ORM\OneToMany(targetEntity="Cliente", mappedBy="repr_cod")
     */
    private Collection $clientes_repr;
    
    // Inicializacion de las variables de relaciones
    public function __construct()
    {
        $this->empleados_jefe = new ArrayCollection();
        $this->clientes_repr = new ArrayCollection();
    }

    // GETTERS Y SETTERS
        
    /**
     * Get the value of emp_no
     */
    public function getEmpNo(): int
    {
        return $this->emp_no;
    }

    /**
     * Set the value of emp_no
     */
    public function setEmpNo(int $emp_no): self
    {
        $this->emp_no = $emp_no;

        return $this;
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     */
    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of oficio
     */
    public function getOficio(): ?string
    {
        return $this->oficio;
    }

    /**
     * Set the value of oficio
     */
    public function setOficio(?string $oficio): self
    {
        $this->oficio = $oficio;

        return $this;
    }

    /**
     * Get the value of fecha_alta
     */
    public function getFechaAlta(): ?DateTime
    {
        return $this->fecha_alta;
    }

    /**
     * Set the value of fecha_alta
     */
    public function setFechaAlta(?DateTime $fecha_alta): self
    {
        $this->fecha_alta = $fecha_alta;

        return $this;
    }

    /**
     * Get the value of salario
     */
    public function getSalario(): ?int
    {
        return $this->salario;
    }

    /**
     * Set the value of salario
     */
    public function setSalario(?int $salario): self
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get the value of comision
     */
    public function getComision(): ?int
    {
        return $this->comision;
    }

    /**
     * Set the value of comision
     */
    public function setComision(?int $comision): self
    {
        $this->comision = $comision;

        return $this;
    }

    /**
     * Get the value of dept_no
     */
    public function getDeptNo(): Dept|int
    {
        return $this->dept_no;
    }

    /**
     * Set the value of dept_no
     */
    public function setDeptNo($dept_no): self
    {
        $this->dept_no = $dept_no;

        return $this;
    }

    /**
     * Get the value of jefe
     */
    public function getJefe(): int|null|Emp
    {
        return $this->jefe;
    }

    /**
     * Set the value of jefe
     */
    public function setJefe($jefe): self
    {
        $this->jefe = $jefe;

        return $this;
    }

    /**
     * Get the value of empleados_jefe
     */
    public function getEmpleadosJefe(): Collection
    {
        return $this->empleados_jefe;
    }

    /**
     * Set the value of empleados_jefe
     */
    public function setEmpleadosJefe(Collection $empleados_jefe): self
    {
        $this->empleados_jefe = $empleados_jefe;

        return $this;
    }

    /**
     * Get the value of clientes_repr
     */
    public function getClientesRepr(): Collection
    {
        return $this->clientes_repr;
    }

    /**
     * Set the value of clientes_repr
     */
    public function setClientesRepr(Collection $clientes_repr): self
    {
        $this->clientes_repr = $clientes_repr;

        return $this;
    }
}