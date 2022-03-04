<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $comment1 = new Comment();
        $comment1->setContent('C\'est top');
        $comment1->setUser($this->getReference('connectedUser'));
        $comment1->setArticle($this->getReference('article1'));
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2->setContent('C\'est génial !!!!!');
        $comment2->setUser($this->getReference('connectedUser'));
        $comment2->setArticle($this->getReference('article2'));
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3->setContent('Intéressant !');
        $comment3->setUser($this->getReference('userAdmin'));
        $comment3->setArticle($this->getReference('article3'));
        $manager->persist($comment3);
        
        $comment4 = new Comment();
        $comment4->setContent('mouais...');
        $comment4->setUser($this->getReference('userAdmin'));
        $comment4->setArticle($this->getReference('article4'));
        $manager->persist($comment4);
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            ArticleFixtures::class
        ];
    }
}