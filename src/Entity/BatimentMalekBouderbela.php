<?php

namespace App\Entity;

use App\Repository\BatimentMalekBouderbelaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BatimentMalekBouderbelaRepository::class)]
class BatimentMalekBouderbela
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name: "nbetage", type: "integer")]
    private ?int $nbEtages = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $dateConstruction = null;

    #[ORM\Column(length: 255)]
    private ?string $disponibilite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getNbEtages(): ?int
    {
        return $this->nbEtages;
    }

    public function setNbEtages(int $nbEtages): self
    {
        $this->nbEtages = $nbEtages;
        return $this;
    }

    public function getDateConstruction(): ?\DateTimeInterface
    {
        return $this->dateConstruction;
    }

    public function setDateConstruction(\DateTimeInterface $dateConstruction): self
    {
        $this->dateConstruction = $dateConstruction;
        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): self
    {
        $this->disponibilite = $disponibilite;
        return $this;
    }
}
