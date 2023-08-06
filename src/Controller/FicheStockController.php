<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FicheStockRepository;
use App\Entity\FicheStock;

class FicheStockController extends AbstractController
{
    #[Route('/fiche_stock', name: 'app_fiche_stock')]
    public function index(FicheStockRepository $ficheStockRepository): Response
    {
        // Fetch all fiche stocks from the database
        $fichesStock = $ficheStockRepository->findAll();

        // Render the template and pass the fiche stocks to it
        return $this->render('fiche_stock/index.html.twig', [
            'fichesStock' => $fichesStock,
        ]);
    }
    #[Route('/fiche_stock/{id}', name: 'app_fiche_stock_details')]
    public function show(FicheStock $ficheStock): Response
    {
        return $this->render('fiche_stock/stock_details.html.twig', [
            'ficheStock' => $ficheStock,
        ]);
    }
}
