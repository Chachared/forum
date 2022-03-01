<?php

namespace App\DataFixtures;

use app\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1 = new Category();
        $category1-> setDesignation('Sciences');
        $this->addReference('category1', $category1);

        $category2 = new Category();
        $category2->setDesignation('Informatique');
        $this->addReference('category2', $category2);
        
        $manager->persist($category1);
        $manager->persist($category2);

        $manager->flush();
    }
}