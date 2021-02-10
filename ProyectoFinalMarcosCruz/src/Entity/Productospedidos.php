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
    private $producto;

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

    public function getProducto(): ?Productos
    {
        return $this->producto;
    }

    public function setProducto(?Productos $producto): self
    {
        $this->producto = $producto;

        return $this;
    }
}
