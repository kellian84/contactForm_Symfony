<?php

namespace App\Controller;

use App\Entity\MailModel;
use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\CustomerModel;
use App\Entity\MessageModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Finder\Finder;


class ContactController extends AbstractController
{
    public function new(Request $request, MailerInterface $mailer): Response
    {
        // creates a task object and initializes some data for this example
        $customer = new CustomerModel();
        $message = new MessageModel();
        $mail = new MailModel();

        $customer_form = $this->createForm(ContactFormType::class);
        $customer_form->handleRequest($request);

        if ($customer_form->isSubmitted() && $customer_form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $email = $customer_form->get('email')->getData();
            $input_msg = $customer_form->get('message')->getData();

            $repo_customer = $this->getDoctrine()->getRepository(CustomerModel::class);
            $id_customer = $repo_customer->getIdByEmail($email);
            if (empty($id_customer)) {
                $em->persist($mail);
                $mail->setEmail($email);
                $em->flush();
            } else {
                $mail_id = $repo_customer->getIdMailByEmail($email);
                $mail = $this->getDoctrine()->getRepository(MailModel::class);
                $mail = $mail->find($mail_id[0]['id']);
            }
            $em->persist($customer);
            $customer->setFirstname($customer_form->get('firstname')->getData());
            $customer->setMail($mail);
            $customer->setLastname($customer_form->get('lastname')->getData());
            $customer->setIsRead(0);
            $em->flush();
            $message->setCustomer($customer);

            $message->setMessage($input_msg);
            $em->persist($message);
            $em->flush();
            $this->addFlash('success', 'We have received your message, we will get back to you soon');

            $json_value = array(
                'firstname' => $customer_form->get('firstname')->getData(),
                'lastname' => $customer_form->get('lastname')->getData(),
                'email' => $customer_form->get('email')->getData(),
                'message' => $input_msg,
            );

            // encode array to json

            $dirName = (\dirname(__DIR__));
            $dirName = (\dirname($dirName));
            $file_name = $customer_form->get('lastname')->getData() . '_' . date("Y-m-d-H-i-s");
            $json = json_encode($json_value);
            $bytes = file_put_contents($dirName . "/json_contact/" . $file_name . ".json", $json);

            $email = (new Email())
                ->from('contactform.kellianjonville@gmail.com')
                ->to($customer_form->get('email')->getData())
                ->subject('Receipt of confirmation')
                ->text('Receipt of confirmation')
                ->html('<p>We have received your message! We will respond as soon as possible.</p> ');

            $mailer->send($email);

            return $this->redirect($request->getUri());
        }
        return $this->renderForm('contact/index.html.twig', [
            'customer_form' => $customer_form
        ]);
    }
}