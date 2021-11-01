<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\CustomerModel;
use App\Entity\MessageModel;
use App\Entity\MailModel;

class DashboardController extends AbstractDashboardController
{
    private $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    /**
     * @Route("/admin", name="admin")
     */

    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(MailModelCrudController::class)
            ->setAction(Action::INDEX)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Contact Form');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToCrud('Customer', 'fas fa-map-marker-alt', CustomerModel::class);
        yield MenuItem::linkToCrud('Messages', 'fas fa-envelope-square', MailModel::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-users', User::class);
    }

}