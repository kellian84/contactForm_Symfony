<?php

namespace App\Form;

use App\Entity\CustomerModel;
use App\Entity\MessageModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class,
                array(
                    'label' => ' ',
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Firstname',
                    )))
            ->add('lastname', TextType::class,
                array(
                    'label' => ' ',
                    'attr' => array(
                        'class' => 'form-control margin_form',
                        'placeholder' => 'Lastname',
                    )))
            ->add('email', EmailType::class,
                array(
                    'label' => ' ',
                    'attr' => array(
                        'class' => 'form-control margin_form',
                        'placeholder' => 'Email',
                    )))
            ->add('message', TextareaType::class,
                array(
                    'label' => ' ',
                    'attr' => array(
                        'class' => 'form-control margin_form',
                        'placeholder' => 'Whrite your message',
                    )))
            ->add('send', SubmitType::class, array(
                'label' => 'Send Message',
                'attr' => array(
                    'class' => 'btn btn-primary rounded-0 py-2 px-4 margin_form',
                )));

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CustomerModel::class,
        ]);
    }
}
