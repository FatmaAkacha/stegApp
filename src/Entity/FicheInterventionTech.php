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
    private ?int $code_erreur = null;

    #[ORM\Column(length: 255)]
    private ?string $module = null;

    #[ORM\Column(length: 255)]
    private ?string $description_anomalie = null;

    #[ORM\Column(length: 255)]
    private ?string $etat_intervention = null;

    #[ORM\Column(length: 255)]
    private ?string $agent_technique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeErreur(): ?int
    {
        return $this->code_erreur;
    }

    public function setCodeErreur(int $code_erreur): static
    {
        $this->code_erreur = $code_erreur;

        return $this;
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

    public function getDescriptionAnomalie(): ?string
    {
        return $this->description_anomalie;
    }

    public function setDescriptionAnomalie(string $description_anomalie): static
    {
        $this->description_anomalie = $description_anomalie;

        return $this;
    }

    public function getEtatIntervention(): ?string
    {
        return $this->etat_intervention;
    }

    public function setEtatIntervention(string $etat_intervention): static
    {
        $this->etat_intervention = $etat_intervention;

        return $this;
    }

    public function getAgentTechnique(): ?string
    {
        return $this->agent_technique;
    }

    public function setAgentTechnique(string $agent_technique): static
    {
        $this->agent_technique = $agent_technique;

        return $this;
    }
}
