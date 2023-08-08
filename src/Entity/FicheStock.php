<?php

namespace App\Entity;

use App\Repository\FicheStockRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheStockRepository::class)]
class FicheStock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    public ?int $quantite_entree = null;

    #[ORM\Column]
    public ?int $num_bon_entree = null;

    #[ORM\Column]
    public ?int $quantite_sortie = null;

    #[ORM\Column(length: 255)]
    public ?string $machine_sortie = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $solde = null;

    #[ORM\ManyToOne(inversedBy: 'ficheStocks')]
    private ?Article $article_stock = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    public function getArticleStock(): ?Article
    {
        return $this->article_stock;
    }

    public function setArticleStock(?Article $article_stock): static
    {
        $this->article_stock = $article_stock;

        return $this;
    }

    public function calculateSolde(): ?int
    {
        return $this->quantite_entree - $this->quantite_sortie;
    }
}
