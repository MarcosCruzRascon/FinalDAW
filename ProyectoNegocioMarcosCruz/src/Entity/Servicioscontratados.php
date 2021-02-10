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
     * @ORM\ManyToOne(targetEntity=Servicios::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idservicio;

    /**
     * @ORM\ManyToOne(targetEntity=Usuarios::class, inversedBy="servicioscontratados")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdservicio(): ?Servicios
    {
        return $this->idservicio;
    }

    public function setIdservicio(?Servicios $idservicio): self
    {
        $this->idservicio = $idservicio;

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
