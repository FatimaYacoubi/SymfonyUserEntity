<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReclamationRepository::class)
 */
class Reclamation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="text")
     */
    private $description_reclamation;

    /**
     * @ORM\Column(type="date")
     */
    private $date_reclamation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat_reclamation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Reclamation")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDescriptionReclamation(): ?string
    {
        return $this->description_reclamation;
    }

    public function setDescriptionReclamation(string $description_reclamation): self
    {
        $this->description_reclamation = $description_reclamation;

        return $this;
    }

    public function getDateReclamation(): ?\DateTimeInterface
    {
        return $this->date_reclamation;
    }

    public function setDateReclamation(\DateTimeInterface $date_reclamation): self
    {
        $this->date_reclamation = $date_reclamation;

        return $this;
    }

    public function getEtatReclamation(): ?string
    {
        return $this->etat_reclamation;
    }

    public function setEtatReclamation(string $etat_reclamation): self
    {
        $this->etat_reclamation = $etat_reclamation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
