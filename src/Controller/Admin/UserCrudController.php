<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
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
        $isAdmin = in_array('ROLE_ADMIN', $this->getUser()->getRoles());

        $fields = [
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

        if ($pageName === 'new') {
            $fields[] = ChoiceField::new('roles', 'User Roles')
                ->setLabel('User Roles')
                ->setChoices([
                    'Admin' => 'ROLE_ADMIN',
                    'User' => 'ROLE_USER',
                ])
                ->allowMultipleChoices(true)
                ->renderExpanded(true)
                ->renderAsBadges()
                ->formatValue(function ($value) use ($isAdmin) {
                    // If the current user is not an admin, filter out 'Admin' role
                    if (!$isAdmin && in_array('ROLE_ADMIN', $value)) {
                        return array_diff($value, ['ROLE_ADMIN']);
                    }
                    return $value;
                });
        }

        return $fields;
    }
}
