<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtatInterventionController extends AbstractController
{
    #[Route('/etat/intervention', name: 'app_etat_intervention')]
    public function index(): Response
    {
        return $this->render('etat_intervention/index.html.twig', [
            'controller_name' => 'EtatInterventionController',
        ]);
    }
}
