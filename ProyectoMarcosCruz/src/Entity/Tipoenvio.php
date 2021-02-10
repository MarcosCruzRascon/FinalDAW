<?php

namespace App\Entity;

use App\Repository\TipoenvioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoenvioRepository::class)
 */
class Tipoenvio
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
    private $precioEnvio;

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

    public function getPrecioEnvio(): ?float
    {
        return $this->precioEnvio;
    }

    public function setPrecioEnvio(float $precioEnvio): self
    {
        $this->precioEnvio = $precioEnvio;

        return $this;
    }
}
