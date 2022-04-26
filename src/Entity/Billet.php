<?php

namespace App\Entity;

use App\Repository\BilletRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BilletRepository::class)
 */
class Billet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $chair_billet;

    /**
     * @ORM\Column(type="integer")
     */
    private $voyage_num;


    /**
     * @ORM\Column(type="integer")
     */
    private $terminal;

    /**
     * @ORM\Column(type="integer")
     */
    private $portail;

    /**
     * @ORM\Column(type="date")
     */
    private $embarquement;

    /**
     * @ORM\ManyToOne(targetEntity=Reservation::class, inversedBy="billet")
     */
    private $reservation;

    /**
     * @ORM\ManyToOne(targetEntity=Localisation::class, inversedBy="billet")
     */
    private $localisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChairBillet(): ?int
    {
        return $this->chair_billet;
    }

    public function setChairBillet(int $chair_billet): self
    {
        $this->chair_billet = $chair_billet;

        return $this;
    }

    public function getVoyageNum(): ?int
    {
        return $this->voyage_num;
    }

    public function setVoyageNum(int $voyage_num): self
    {
        $this->voyage_num = $voyage_num;

        return $this;
    }


    public function getTerminal(): ?int
    {
        return $this->terminal;
    }

    public function setTerminal(int $terminal): self
    {
        $this->terminal = $terminal;

        return $this;
    }

    public function getPortail(): ?int
    {
        return $this->portail;
    }

    public function setPortail(int $portail): self
    {
        $this->portail = $portail;

        return $this;
    }

    public function getEmbarquement(): ?\DateTimeInterface
    {
        return $this->embarquement;
    }

    public function setEmbarquement(\DateTimeInterface $embarquement): self
    {
        $this->embarquement = $embarquement;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getLocalisation(): ?Localisation
    {
        return $this->localisation;
    }

    public function setLocalisation(?Localisation $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }


}
