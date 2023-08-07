<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;

class HomeController extends AbstractController
{
    private $articleRepo;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepo = $articleRepo;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $articles = $this->articleRepo->findAll();

        // Convert the articles to an array with the required data (e.g., name and quantity)
        $articleData = [];
        foreach ($articles as $article) {
            $articleData[] = [
                'x' => $article->getNom(),
                'value' => $article->getQuantite(),
            ];
        }

        return $this->render('home/index.html.twig', [
            'articleData' => json_encode($articleData),
        ]);
    }
}

