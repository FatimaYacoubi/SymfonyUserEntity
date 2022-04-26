<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("post:read")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="nom is required")
     * @Groups("post:read")
     */
    private $nom_role;

    /**
     * @Groups("post:read")
     * @ORM\Column(type="text")
     */
    public $description_role;


    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="nom_role",cascade={"persist", "remove"})
     */
    private $userRoles;

    /**
     * @ORM\ManyToOne(targetEntity=Task::class, inversedBy="roles")
     */
    public $Description;

    

    public function __construct()
    {
        $this->userRoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getDescriptionRole(): ?string
    {
        return $this->description_role;
    }

    public function setDescriptionRole(string $description_role): self
    {
        $this->description_role= $description_role;

        return $this;
    }

    public function getNomRole(): ?string
    {
        return $this->nom_role;
    }

    public function setNomRole(string $nom_role): self
    {
        $this->nom_role = $nom_role;

        return $this;
    }

  
    public function getTacherole(): ?string
    {
        return $this->tacherole;
    }

    public function setTacherole(string $tacherole): self
    {
        $this->tacherole = $tacherole;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserRoles(): Collection
    {
        return $this->userRoles;
    }

    public function addUserRole(User $userRole): self
    {
        if (!$this->userRoles->contains($userRole)) {
            $this->userRoles[] = $userRole;
            $userRole->setNomRole($this);
        }

        return $this;
    }

    public function removeUserRole(User $userRole): self
    {
        if ($this->userRoles->removeElement($userRole)) {
            // set the owning side to null (unless already changed)
            if ($userRole->getNomRole() === $this) {
                $userRole->setNomRole(null);
            }
        }

        return $this;
    }
    public function __toString() 
{
    return (string) $this->nom_role; 
}

    public function getDescription(): ?Task
    {
        return $this->Description;
    }

    public function setDescription(?Task $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

   
}
