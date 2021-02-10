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
     * @ORM\ManyToOne(targetEntity=usuarios::class, inversedBy="servicioscontratados")
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

    public function getUsuario(): ?usuarios
    {
        return $this->usuario;
    }

    public function setUsuario(?usuarios $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}
