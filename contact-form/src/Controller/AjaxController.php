<?php

namespace App\Controller;

use App\Controller\Admin\MailModelCrudController;
use App\Entity\CustomerModel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function index(): Response
    {
        return $this->render('ajax/index.html.twig', [
            'controller_name' => 'AjaxController',
        ]);
    }

    /**
     * @Route("/ajax/getMessage/{id}", name="getMessage")
     */
    public function getMessage(Request $request): Response
    {

        $message = $this->getIdMailByEmail($request->get('id'));
        if ($message) {
            return $this->json([
                'code' => 200,
                'message' => $message[0]['message']
            ]);
        }
    }


    public function getIdMailByEmail($customer_id): array
    {
        $entityManager = $this->getDoctrine()->getManager();
        $id_user = array();
        $message = $entityManager->createQuery(
            'SELECT m.message
                    FROM App\Entity\MessageModel m
                    WHERE m.customer =  :customer_id'
        )
            ->setParameter('customer_id', $customer_id);
        return $message->getResult();

    }

    public function generateUrlKln($entity_id)
    {
        $url = $this->adminUrlGenerator
            ->setController(MailModelCrudController::class)
            ->setAction(Action::EDIT)
            ->setEntityId($entity_id)
            ->setRead_message()
            ->generateUrl();

        return $url;
    }

    /**
     * @Route("/ajax/setReadMessage/{id}", name="setReadMessage")
     */

    public function setReadMessage(Request $request)
    {
        $id_customer = $request->get('id');
        $request_value = $request->get('value');
        $em = $this->getDoctrine()->getManager();

        if ($request_value == 1) {
            $value = 0;
        }

        if ($request_value == 0) {
            $value = 1;
        }

        $user = $this->getDoctrine()->getRepository(CustomerModel::class);
        $user = $user->find($id_customer);
        $user->setIsRead($value);
        $em->flush();

        return $this->json([
            'code' => 200,
            'message' => $value
        ]);
    }

}
