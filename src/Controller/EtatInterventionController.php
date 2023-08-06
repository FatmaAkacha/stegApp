<?php

namespace App\Controller;
use App\Entity\EtatIntervention;
use App\Repository\EtatInterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtatInterventionController extends AbstractController
{
    #[Route('/etat_intervention', name: 'app_etat_intervention')]
    public function index(EtatInterventionRepository $etatInterventionRepository): Response
    {
        // Your controller logic here
        $interventions = $etatInterventionRepository->findAll();
        return $this->render('etat_intervention/index.html.twig', [
            'interventions'=> $interventions  ,
        ]);
    }
    #[Route('/etat_intervention/{id}', name: 'app_etat_intervention_details')]
    public function show(EtatIntervention $intervention): Response
    {
        return $this->render('etat_intervention/intervention_details.html.twig', [
            'intervention' => $intervention,
        ]);
    }
}

