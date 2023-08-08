<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\PasswordField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('username'),
            TextField::new('password')->hideOnIndex(),
            CollectionField::new('roles')
            ->formatValue(function($value, $entity) {
                // Convert roles to human-readable format
                if ( $value ==2 ) {
                    return 'role_admin';
                } else {
                    return 'role_user';
                }
            }),

        ];
        if (Crud::PAGE_NEW === $pageName) {
            $fields[] = TextField::new('plainPassword', 'Password')
                ->setFormType(PasswordType::class)
                ->onlyOnForms();
        }

        return $fields;
    }
}
