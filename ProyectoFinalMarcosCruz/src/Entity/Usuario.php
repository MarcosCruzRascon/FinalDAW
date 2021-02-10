<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefono;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $imagen;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $direcciones = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $metodosdepago = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getDirecciones(): ?array
    {
        return $this->direcciones;
    }

    public function setDirecciones(?array $direcciones): self
    {
        $this->direcciones = $direcciones;

        return $this;
    }

    public function getMetodosdepago(): ?array
    {
        return $this->metodosdepago;
    }

    public function setMetodosdepago(?array $metodosdepago): self
    {
        $this->metodosdepago = $metodosdepago;

        return $this;
    }
}
