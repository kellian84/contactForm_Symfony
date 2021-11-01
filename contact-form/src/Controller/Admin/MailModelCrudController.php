<?php

namespace App\Controller\Admin;

use App\Entity\MailModel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Asset;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;


class MailModelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MailModel::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('email'),
            CollectionField::new('customerModels')->hideOnIndex()
                ->setTemplatePath('custom_fields/collectionMail.html.twig')
                ->setLabel('Liste des messages')


        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            // adds the CSS and JS assets associated to the given Webpack Encore entry
            ->addJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')
            ->addJsFile('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')
            ->addJsFile(Asset::new('js/admin.js'))
            ->addCssFile(Asset::new('css/admin.css'));
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
                ->setEntityLabelInSingular('Email')
                ->setEntityLabelInPlural('Emails');
    }


}
