<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\EtatInterventionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatInterventionRepository::class)]
class EtatIntervention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::INTEGER)]
    public ?int $solde_comptable = null;

    #[ORM\Column(type: Types::INTEGER)]
    public ?int $solde_physique = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $difference = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $justification = null;

    #[ORM\ManyToOne(inversedBy: 'etatInterventions')]
    private ?Article $article_etat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    // public function getSoldeComptable(): ?int
    // {
    //     return $this->solde_comptable;
    // }

    // public function setSoldeComptable(int $solde_comptable): void
    // {
    //     $this->solde_comptable = $solde_comptable;
    // }

    // public function getSoldePhysique(): ?int
    // {
    //     return $this->solde_physique;
    // }

    // public function setSoldePhysique(int $solde_physique): void
    // {
    //     $this->solde_physique = $solde_physique;
    // }

    public function getDifference(): ?string
    {
        return $this->difference;
    }

    public function setDifference(string $difference): void
    {
        $this->difference = $difference;
    }

    public function getJustification(): ?string
    {
        return $this->justification;
    }

    public function setJustification(?string $justification): void
    {
        $this->justification = $justification;
    }

    public function getArticleEtat(): ?Article
    {
        return $this->article_etat;
    }

    public function setArticleEtat(?Article $article_etat): void
    {
        $this->article_etat = $article_etat;
    }
}
