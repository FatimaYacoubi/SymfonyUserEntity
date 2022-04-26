<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 * @UniqueEntity(fields={"mail_utilisateur"}, message="There is already an account with this mail_utilisateur")

 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("post:read")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     //* @Assert\NotBlank(message="nom is required")
     * @Groups("post:read") 
     */
    private $nom_utilisateur;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @Assert\NotBlank(message="prenom is required") 
     * @Groups("post:read")
     */
    private $prenom_utilisateur;

    /**     * @Assert\NotBlank(message="adresse is required") 
     * @ORM\Column(type="string", length=255,nullable=true)
     * @Groups("post:read")
     */
    private $adresse_utilisateur;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *  @Assert\NotBlank(message="Email is required") 
     * @Assert\Email(message = "The email '{{ value }}' is not a valid  email.") 
     * @Groups("post:read")
     */
    public $mail_utilisateur;

    /**   
     *  @Assert\NotBlank(message=" A sudoname is required") 
     * @Groups("post:read")
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $sudo_utilisateur;
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
     * @ORM\Column(type="boolean")
     */
    public $isVerified = false;
    /**
     * @ORM\Column(type="boolean")
     */
    public $isExpired = false;
    /**
     * @Groups("post:read")
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $Etat_Compte;

    /**
     * @Groups("post:read")
     * @ORM\Column(type="string", length=255,nullable=true)
     * @Assert\NotBlank(message="A Phone Number is required")
     */
    private $Numero_utilisateur;
     //@Assert\LessThan("-18 years")

    /**
     * @Groups("post:read")
     * @ORM\Column(type="date",nullable=true)
     * @Assert\NotBlank(message="BirthDate is required")
     */
    private $DateN_utilisateur;

    /** 
     * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="User")
     */
     
    private $post;

    /**
     * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="user")
     */
    private $Reclamation;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="user")
     */
    private $reservations;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="user")
     */
    private $nom_role;
   
    public function __construct()
    {
        $this->Reclamation = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNomUtilisateur(): ?string
    {
        return $this->nom_utilisateur;
    }

    public function setNomUtilisateur(string $nom_utilisateur): self
    {
        $this->nom_utilisateur = $nom_utilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenom_utilisateur;
    }

    public function setPrenomUtilisateur(string $prenom_utilisateur): self
    {
        $this->prenom_utilisateur = $prenom_utilisateur;

        return $this;
    }

    public function getAdresseUtilisateur(): ?string
    {
        return $this->adresse_utilisateur;
    }

    public function setAdresseUtilisateur(string $adresse_utilisateur): self
    {
        $this->adresse_utilisateur = $adresse_utilisateur;

        return $this;
    }

    public function getMailUtilisateur(): ?string
    {
        return $this->mail_utilisateur;
    }

    public function setMailUtilisateur(string $mail_utilisateur): self
    {
        $this->mail_utilisateur = $mail_utilisateur;

        return $this;
    }

    public function getSudoUtilisateur(): ?string
    {
        return $this->sudo_utilisateur;
    }

    public function setSudoUtilisateur(string $sudo_utilisateur): self
    {
        $this->sudo_utilisateur = $sudo_utilisateur;

        return $this;
    }


    public function getEtatCompte(): ?string
    {
        return $this->Etat_Compte;
    }

    public function setEtatCompte(string $Etat_Compte): self
    {
        $this->Etat_Compte = $Etat_Compte;

        return $this;
    }

    public function getNumeroUtilisateur(): ?string
    {
        return $this->Numero_utilisateur;
    }

    public function setNumeroUtilisateur(string $Numero_utilisateur): self
    {
        $this->Numero_utilisateur = $Numero_utilisateur;

        return $this;
    }

    public function getDateNUtilisateur(): ?\DateTimeInterface
    {
        return $this->DateN_utilisateur;
    }

    public function setDateNUtilisateur(\DateTimeInterface $DateN_utilisateur): self
    {
        $this->DateN_utilisateur = $DateN_utilisateur;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }

    /**
     * @return Collection|Reclamation[]
     */
    public function getReclamation(): Collection
    {
        return $this->Reclamation;
    }

    public function addReclamation(Reclamation $reclamation): self
    {
        if (!$this->Reclamation->contains($reclamation)) {
            $this->Reclamation[] = $reclamation;
            $reclamation->setUser($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): self
    {
        if ($this->Reclamation->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getUser() === $this) {
                $reclamation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setUser($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getUser() === $this) {
                $reservation->setUser(null);
            }
        }

        return $this;
    }

    public function getNomRole(): ?Role
    {
        return $this->nom_role;
    }

    public function setNomRole(?Role $nom_role): self
    {
        $this->nom_role = $nom_role;

        return $this;
    }
    public function __toString() 
{
    return (string) $this->nom_role; 
}
/**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->mail_utilisateur;
    }
    public function setUsername(string $mail_utilisateur): string
    {
        return (string) $this->mail_utilisateur;
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
    public function getPassword(): ?string
    {
        return $this->password;
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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
