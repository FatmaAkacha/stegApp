<?php

namespace App\Controller\Admin;

use App\Entity\EtatIntervention;
use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class EtatInterventionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EtatIntervention::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date'),
            IntegerField::new('solde_comptable'),
            IntegerField::new('solde_physique'),
            TextEditorField::new('difference'),
            TextEditorField::new('justification'),
            AssociationField::new('article_etat'),
        ];
    }
    
}
