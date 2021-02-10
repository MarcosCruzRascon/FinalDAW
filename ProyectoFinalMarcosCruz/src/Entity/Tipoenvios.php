<?php

namespace App\Entity;

use App\Repository\TipoenviosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoenviosRepository::class)
 */
class Tipoenvios
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
    private $empresaTransportista;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpresaTransportista(): ?string
    {
        return $this->empresaTransportista;
    }

    public function setEmpresaTransportista(string $empresaTransportista): self
    {
        $this->empresaTransportista = $empresaTransportista;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }
}
