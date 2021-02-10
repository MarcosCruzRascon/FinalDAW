<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsuariosRepository::class)
 * @UniqueEntity(fields={"correo"}, message="There is already an account with this correo")
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
     * @ORM\Column(type="blob", nullable=true)
     */
    private $imagen;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $direcciones = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefono;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $formasdepago = [];

    /**
     * @ORM\OneToOne(targetEntity=Agenda::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $agenda;

    /**
     * @ORM\OneToMany(targetEntity=Pedidos::class, mappedBy="usuario", orphanRemoval=true)
     */
    private $pedidos;

    /**
     * @ORM\OneToMany(targetEntity=Servicioscontratados::class, mappedBy="usuario", orphanRemoval=true)
     */
    private $servicioscontratados;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

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
    private $empresa;

    public function __construct()
    {
        $this->pedidos = new ArrayCollection();
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

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getFormasdepago(): ?array
    {
        return $this->formasdepago;
    }

    public function setFormasdepago(?array $formasdepago): self
    {
        $this->formasdepago = $formasdepago;

        return $this;
    }

    public function getAgenda(): ?Agenda
    {
        return $this->agenda;
    }

    public function setAgenda(Agenda $agenda): self
    {
        $this->agenda = $agenda;

        return $this;
    }

    /**
     * @return Collection|Pedidos[]
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }

    public function addPedido(Pedidos $pedido): self
    {
        if (!$this->pedidos->contains($pedido)) {
            $this->pedidos[] = $pedido;
            $pedido->setUsuario($this);
        }

        return $this;
    }

    public function removePedido(Pedidos $pedido): self
    {
        if ($this->pedidos->removeElement($pedido)) {
            // set the owning side to null (unless already changed)
            if ($pedido->getUsuario() === $this) {
                $pedido->setUsuario(null);
            }
        }

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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

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

    public function getEmpresa(): ?string
    {
        return $this->empresa;
    }

    public function setEmpresa(?string $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }
}
