<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 */
class Offre
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
    private $nom_offre;

    /**
     * @ORM\Column(type="text")
     */
    private $description_offre;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_offre;

    /**
     * @ORM\Column(type="float")
     */
    private $duree_offre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOffre(): ?string
    {
        return $this->nom_offre;
    }

    public function setNomOffre(string $nom_offre): self
    {
        $this->nom_offre = $nom_offre;

        return $this;
    }

    public function getDescriptionOffre(): ?string
    {
        return $this->description_offre;
    }

    public function setDescriptionOffre(string $description_offre): self
    {
        $this->description_offre = $description_offre;

        return $this;
    }

    public function getPrixOffre(): ?float
    {
        return $this->prix_offre;
    }

    public function setPrixOffre(float $prix_offre): self
    {
        $this->prix_offre = $prix_offre;

        return $this;
    }

    public function getDureeOffre(): ?float
    {
        return $this->duree_offre;
    }

    public function setDureeOffre(float $duree_offre): self
    {
        $this->duree_offre = $duree_offre;

        return $this;
    }
}
