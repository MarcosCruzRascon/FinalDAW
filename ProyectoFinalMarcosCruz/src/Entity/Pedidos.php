<?php

namespace App\Entity;

use App\Repository\PedidosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PedidosRepository::class)
 */
class Pedidos
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
    private $idpedido;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anotaciones;

    /**
     * @ORM\OneToMany(targetEntity=Productospedidos::class, mappedBy="idpedido")
     */
    private $productospedidos;

    /**
     * @ORM\ManyToOne(targetEntity=Tipoenvios::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipoenvio;

    public function __construct()
    {
        $this->productospedidos = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdpedido(): ?string
    {
        return $this->idpedido;
    }

    public function setIdpedido(string $idpedido): self
    {
        $this->idpedido = $idpedido;

        return $this;
    }

    public function getAnotaciones(): ?string
    {
        return $this->anotaciones;
    }

    public function setAnotaciones(?string $anotaciones): self
    {
        $this->anotaciones = $anotaciones;

        return $this;
    }

    /**
     * @return Collection|Productospedidos[]
     */
    public function getProductospedidos(): Collection
    {
        return $this->productospedidos;
    }

    public function addProductospedido(Productospedidos $productospedido): self
    {
        if (!$this->productospedidos->contains($productospedido)) {
            $this->productospedidos[] = $productospedido;
            $productospedido->setIdpedido($this);
        }

        return $this;
    }

    public function removeProductospedido(Productospedidos $productospedido): self
    {
        if ($this->productospedidos->removeElement($productospedido)) {
            // set the owning side to null (unless already changed)
            if ($productospedido->getIdpedido() === $this) {
                $productospedido->setIdpedido(null);
            }
        }

        return $this;
    }

    public function getTipoenvio(): ?Tipoenvios
    {
        return $this->tipoenvio;
    }

    public function setTipoenvio(?Tipoenvios $tipoenvio): self
    {
        $this->tipoenvio = $tipoenvio;

        return $this;
    }
}
