<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FicheStockController extends AbstractController
{
    #[Route('/fiche/stock', name: 'app_fiche_stock')]
    public function index(): Response
    {
        return $this->render('fiche_stock/index.html.twig', [
            'controller_name' => 'FicheStockController',
        ]);
    }
}
