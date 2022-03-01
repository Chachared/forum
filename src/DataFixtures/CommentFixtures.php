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