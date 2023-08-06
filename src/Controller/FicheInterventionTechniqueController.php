<?php

namespace App\Controller;

use App\Entity\FicheInterventionTech;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FicheInterventionTechRepository;
use Doctrine\ORM\EntityManagerInterface;

class FicheInterventionTechniqueController extends AbstractController
{
    #[Route('/fiche_intervention_technique', name: 'app_fiche_intervention_technique')]
    public function index(FicheInterventionTechRepository $ficheInterventionTechRepository): Response
    {
        
        $fichesInterventionTech = $ficheInterventionTechRepository->findAll();

        return $this->render('fiche_intervention_technique/index.html.twig', [
            'fichesInterventionTech' => $fichesInterventionTech,
        ]);
    }
    #[Route('/fiche_intervention_tech/{id}', name: 'app_fiche_intervention_tech_details')]
    public function show(FicheInterventionTech $ficheInterventionTech): Response
    {
        return $this->render('fiche_intervention_technique/intervention_tech_details.html.twig', [
            'ficheInterventionTech' => $ficheInterventionTech,
        ]);
    }
}

