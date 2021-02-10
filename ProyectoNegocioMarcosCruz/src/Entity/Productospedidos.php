<?php

namespace App\Entity;

use App\Repository\ProductospedidosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductospedidosRepository::class)
 */
class Productospedidos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Pedidos::class, inversedBy="productospedidos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idpedido;

    /**
     * @ORM\ManyToOne(targetEntity=Productos::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idproducto;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdpedido(): ?Pedidos
    {
        return $this->idpedido;
    }

    public function setIdpedido(?Pedidos $idpedido): self
    {
        $this->idpedido = $idpedido;

        return $this;
    }

    public function getIdproducto(): ?Productos
    {
        return $this->idproducto;
    }

    public function setIdproducto(?Productos $idproducto): self
    {
        $this->idproducto = $idproducto;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}
