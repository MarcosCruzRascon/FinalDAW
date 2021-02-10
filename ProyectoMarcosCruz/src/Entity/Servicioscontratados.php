<?php

namespace App\Entity;

use App\Repository\ServicioscontratadosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServicioscontratadosRepository::class)
 */
class Servicioscontratados
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=servicios::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $servicio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechafincontrato;

    /**
     * @ORM\ManyToOne(targetEntity=Usuarios::class, inversedBy="servicioscontratados")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServicio(): ?servicios
    {
        return $this->servicio;
    }

    public function setServicio(?servicios $servicio): self
    {
        $this->servicio = $servicio;

        return $this;
    }

    public function getFechafincontrato(): ?\DateTimeInterface
    {
        return $this->fechafincontrato;
    }

    public function setFechafincontrato(\DateTimeInterface $fechafincontrato): self
    {
        $this->fechafincontrato = $fechafincontrato;

        return $this;
    }

    public function getUsuario(): ?Usuarios
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuarios $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}
