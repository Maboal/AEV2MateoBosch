<?php
// src/entity/Dept.php

namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\DeptRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeptRepository::class)
 * @ORM\Table(name="dept")
*/

class Dept
{
    /**
    * @ORM\Id
    * @ORM\Column(name="DEPT_NO", type="integer", length=2)
    * @ORM\OneToMany(targetEntity="Emp", mappedBy="dept_no")
    */
    private Collection $dept_no;

    /**
     * @ORM\Column(name="DNOMBRE", type="string", length=14)
     */
    private string $dnombre;

    /**
    * @ORM\Column(name="LOC", type="string", length=14, nullable=true)
    */
    private string|null $loc;

    /**
     * @ORM\Column(name="color", type="string", length=20, nullable=true)
     */
    private string|null $color;

    

    public function __construct(){
        $this->dept_no = new ArrayCollection();
    }

    /**
     * Get the value of dept_no
     */
    public function getDeptNo(): Collection|int
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
     * Get the value of dnombre
     */ 
    public function getDnombre()
    {
        return $this->dnombre;
    }

    /**
     * Set the value of dnombre
     *
     * @return  self
     */ 
    public function setDnombre(string $dnombre)
    {
        $this->dnombre = $dnombre;

        return $this;
    }

    /**
     * Get the value of loc
     */ 
    public function getLoc()
    {
        return $this->loc;
    }

    /**
     * Set the value of loc
     *
     * @return  self
     */ 
    public function setLoc(string|null $loc)
    {
        $this->loc = $loc;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor(string|null $color)
    {
        $this->color = $color;

        return $this;
    }

    

    
}