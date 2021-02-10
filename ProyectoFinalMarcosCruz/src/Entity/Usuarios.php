<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsuariosRepository::class)
 */
class Usuarios implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $correo;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity=Agenda::class, mappedBy="usuario", cascade={"persist", "remove"})
     */
    private $agenda;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DNI_NIF;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombreEmpresa;

    /**
     * @ORM\OneToMany(targetEntity=Servicioscontratados::class, mappedBy="usuario")
     */
    private $servicioscontratados;

    public function __construct()
    {
        $this->servicioscontratados = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->correo;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAgenda(): ?Agenda
    {
        return $this->agenda;
    }

    public function setAgenda(Agenda $agenda): self
    {
        // set the owning side of the relation if necessary
        if ($agenda->getUsuario() !== $this) {
            $agenda->setUsuario($this);
        }

        $this->agenda = $agenda;

        return $this;
    }

    public function getDNINIF(): ?string
    {
        return $this->DNI_NIF;
    }

    public function setDNINIF(string $DNI_NIF): self
    {
        $this->DNI_NIF = $DNI_NIF;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido1(): ?string
    {
        return $this->apellido1;
    }

    public function setApellido1(string $apellido1): self
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    public function getApellido2(): ?string
    {
        return $this->apellido2;
    }

    public function setApellido2(string $apellido2): self
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    public function getNombreEmpresa(): ?string
    {
        return $this->nombreEmpresa;
    }

    public function setNombreEmpresa(?string $nombreEmpresa): self
    {
        $this->nombreEmpresa = $nombreEmpresa;

        return $this;
    }

    /**
     * @return Collection|Servicioscontratados[]
     */
    public function getServicioscontratados(): Collection
    {
        return $this->servicioscontratados;
    }

    public function addServicioscontratado(Servicioscontratados $servicioscontratado): self
    {
        if (!$this->servicioscontratados->contains($servicioscontratado)) {
            $this->servicioscontratados[] = $servicioscontratado;
            $servicioscontratado->setUsuario($this);
        }

        return $this;
    }

    public function removeServicioscontratado(Servicioscontratados $servicioscontratado): self
    {
        if ($this->servicioscontratados->removeElement($servicioscontratado)) {
            // set the owning side to null (unless already changed)
            if ($servicioscontratado->getUsuario() === $this) {
                $servicioscontratado->setUsuario(null);
            }
        }

        return $this;
    }
}
