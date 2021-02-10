<?php

namespace App\Entity;

use App\Repository\AgendaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgendaRepository::class)
 */
class Agenda
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Visitas::class, mappedBy="agenda")
     */
    private $visitas;

    public function __construct()
    {
        $this->visitas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Visitas[]
     */
    public function getVisitas(): Collection
    {
        return $this->visitas;
    }

    public function addVisita(Visitas $visita): self
    {
        if (!$this->visitas->contains($visita)) {
            $this->visitas[] = $visita;
            $visita->setAgenda($this);
        }

        return $this;
    }

    public function removeVisita(Visitas $visita): self
    {
        if ($this->visitas->removeElement($visita)) {
            // set the owning side to null (unless already changed)
            if ($visita->getAgenda() === $this) {
                $visita->setAgenda(null);
            }
        }

        return $this;
    }
    
}
