<?php

namespace App\Entity;

use App\Repository\FicheInterventionTechRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheInterventionTechRepository::class)]
class FicheInterventionTech
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    public ?int $code_erreur = null;

    #[ORM\Column(length: 255)]
    private ?string $module = null;

    #[ORM\Column(length: 255)]
    public ?string $description_anomalie = null;

    #[ORM\Column(length: 255)]
    public ?string $etat_intervention = null;

    #[ORM\Column(length: 255)]
    public ?string $agent_technique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(string $module): static
    {
        $this->module = $module;

        return $this;
    }

}
