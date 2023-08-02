<?php
namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $quantite = null; // Change the field type to int

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Categorie $categories = null;

    #[ORM\OneToMany(mappedBy: 'article_etat', targetEntity: EtatIntervention::class)]
    private Collection $etatInterventions;

    #[ORM\OneToMany(mappedBy: 'article_stock', targetEntity: FicheStock::class)]
    private Collection $ficheStocks;

    public function __construct()
    {
        $this->etatInterventions = new ArrayCollection();
        $this->ficheStocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getQuantite(): ?int // Change the return type to int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static // Change the parameter type to int
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getCategories(): ?Categorie
    {
        return $this->categories;
    }

    public function setCategories(?Categorie $categories): static
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return Collection<int, EtatIntervention>
     */
    public function getEtatInterventions(): Collection
    {
        return $this->etatInterventions;
    }

    public function addEtatIntervention(EtatIntervention $etatIntervention): static
    {
        if (!$this->etatInterventions->contains($etatIntervention)) {
            $this->etatInterventions->add($etatIntervention);
            $etatIntervention->setArticleEtat($this);
        }

        return $this;
    }

    public function removeEtatIntervention(EtatIntervention $etatIntervention): static
    {
        if ($this->etatInterventions->removeElement($etatIntervention)) {
            // set the owning side to null (unless already changed)
            if ($etatIntervention->getArticleEtat() === $this) {
                $etatIntervention->setArticleEtat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FicheStock>
     */
    public function getFicheStocks(): Collection
    {
        return $this->ficheStocks;
    }

    public function addFicheStock(FicheStock $ficheStock): static
    {
        if (!$this->ficheStocks->contains($ficheStock)) {
            $this->ficheStocks->add($ficheStock);
            $ficheStock->setArticleStock($this);
        }

        return $this;
    }

    public function removeFicheStock(FicheStock $ficheStock): static
    {
        if ($this->ficheStocks->removeElement($ficheStock)) {
            // set the owning side to null (unless already changed)
            if ($ficheStock->getArticleStock() === $this) {
                $ficheStock->setArticleStock(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        // Return the property you want to use as the string representation
        return $this->nom; // For example, if 'nom' is the property to display
    }
}
