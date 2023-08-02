<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\EtatIntervention; 
use App\Entity\FicheExploitation; 
use App\Entity\FicheInterventionTech; 
use App\Entity\FicheStock; 
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(ArticleCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('StegApp');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Aller sur le site', 'fa fa-undo', 'home');

        yield MenuItem::subMenu('Articles', 'fa fa-newspaper')
            ->setSubItems([
                MenuItem::linkToCrud('Tous les articles', 'fa fa-newspaper', Article::class),
                MenuItem::linkToCrud('Ajouter', 'fa fa-plus', Article::class)->setAction(Crud::PAGE_NEW),
            ]);

        yield MenuItem::linkToCrud('Categories', 'fa fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Etat Intervention', 'fas fa-clipboard-list', EtatIntervention::class);
        yield MenuItem::linkToCrud('Fiche Exploitation', 'fa fa-file-text-o', FicheExploitation::class);
        yield MenuItem::linkToCrud('Fiche Intervention Technique', 'fas fa-wrench', FicheInterventionTech::class);
        yield MenuItem::linkToCrud('Fiche de Stock', 'fas fa-database', FicheStock::class);
    }
}
