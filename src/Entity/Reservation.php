<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_reservation;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrebillet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat_reservation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Billet::class, mappedBy="reservation")
     */
    private $billet;

    public function __construct()
    {
        $this->billet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeInterface $date_reservation): self
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    public function getNbrebillet(): ?int
    {
        return $this->nbrebillet;
    }

    public function setNbrebillet(int $nbrebillet): self
    {
        $this->nbrebillet = $nbrebillet;

        return $this;
    }

    public function getEtatReservation(): ?string
    {
        return $this->etat_reservation;
    }

    public function setEtatReservation(string $etat_reservation): self
    {
        $this->etat_reservation = $etat_reservation;

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

    /**
     * @return Collection|Billet[]
     */
    public function getBillet(): Collection
    {
        return $this->billet;
    }

    public function addBillet(Billet $billet): self
    {
        if (!$this->billet->contains($billet)) {
            $this->billet[] = $billet;
            $billet->setReservation($this);
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->billet->removeElement($billet)) {
            // set the owning side to null (unless already changed)
            if ($billet->getReservation() === $this) {
                $billet->setReservation(null);
            }
        }

        return $this;
    }
}
