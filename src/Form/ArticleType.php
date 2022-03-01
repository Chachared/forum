<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'required'=>true,
                'label'=>"Titre",
                'attr'=>['class'=>'form-control']
            ])
            ->add('content', TextType::class, [
                'required'=>true,
                'label'=>"Saisir l'article",
                'attr'=>['class'=>'form-control']
            ])
            ->add('picture', TextType::class, [
                'required'=>false,
                'label'=>"URL de l'image",
                'attr'=>['class'=>'form-control']
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label'=>'designation'
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label'=>'username'
            ])
            ->add('submit', SubmitType::class, [
                'label'=>"Ajouter",
                'attr'=>['class'=>'btn btn-success rounded-pill my-2']
            ])

            //get comments
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}