<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use Symfony\Component\Security\Core\Security; // Import the Security class

class HomeController extends AbstractController
{
    private $articleRepo;
    private $security; // Add a property to hold the Security instance

    public function __construct(ArticleRepository $articleRepo, Security $security)
    {
        $this->articleRepo = $articleRepo;
        $this->security = $security; // Inject the Security instance
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        // Check if the user is not authenticated
        if (!$this->security->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login'); // Redirect to the login page
        }

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
