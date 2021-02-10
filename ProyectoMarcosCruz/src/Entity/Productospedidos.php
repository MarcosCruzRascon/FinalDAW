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
     * @ORM\ManyToOne(targetEntity=pedidos::class, inversedBy="productospedidos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pedido;

    /**
     * @ORM\ManyToOne(targetEntity=productos::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $producto;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPedido(): ?pedidos
    {
        return $this->pedido;
    }

    public function setPedido(?pedidos $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

    public function getProducto(): ?productos
    {
        return $this->producto;
    }

    public function setProducto(?productos $producto): self
    {
        $this->producto = $producto;

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
