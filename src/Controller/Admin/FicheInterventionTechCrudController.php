<?php

namespace App\Controller\Admin;

use App\Entity\FicheInterventionTech;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField; 
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField; 

class FicheInterventionTechCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FicheInterventionTech::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('code_erreur'),
            TextField::new('module'),
            TextEditorField::new('description_anomalie'),
            TextField::new('etat_intervention'),
            TextField::new('agent_technique'),
        ];
    }
}
