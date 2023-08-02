<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FicheInterventionTechniqueController extends AbstractController
{
    #[Route('/fiche/intervention/technique', name: 'app_fiche_intervention_technique')]
    public function index(): Response
    {
        return $this->render('fiche_intervention_technique/index.html.twig', [
            'controller_name' => 'FicheInterventionTechniqueController',
        ]);
    }
}
