<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'required'=>true,
                'label'=>"Prénom",
                'attr'=>['class'=>'form-control']
            ])
            ->add('lastname', TextType::class, [
                'required'=>true,
                'label'=>"Nom",
                'attr'=>['class'=>'form-control']
            ])
            ->add('username', TextType::class, [
                'required'=>true,
                'label'=>"Nom d'utilisateur'",
                'attr'=>['class'=>'form-control']
            ])
            ->add('email', EmailType::class, [
                'required'=>true,
                'label'=>"Adresse mail",
                'attr'=>['class'=>'form-control']
            ])
            ->add('roles')
            ->add('password', PasswordType::class, [
                'required'=>true,
                'label'=>"Mot de passe",
                'attr'=>['class'=>'form-control']
            ])
            ->add('submit', SubmitType::class, [
                'label'=>"Ajouter",
                'attr'=>['class'=>'btn btn-success rounded-pill my-2']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}