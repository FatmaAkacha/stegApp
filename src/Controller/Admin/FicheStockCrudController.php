<?php

namespace App\Controller\Admin;

use App\Entity\FicheStock;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FicheStockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FicheStock::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date'),
            IntegerField::new('quantite_entree'),
            IntegerField::new('num_bon_entree'),
            IntegerField::new('quantite_sortie'),
            TextField::new('machine_sortie'),
            TextField::new('solde')
                ->formatValue(function ($value, $entity) {
                    return $entity->calculateSolde();
                }),
            AssociationField::new('article_stock'),
        ];
    }
}

