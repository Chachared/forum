<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $article1 = new Article();
        $article1 ->setTitle('Des cellules souches vers les cellules osseuses grâce à des ondes sonores');
        $article1 ->setContent('Les ondes sonores pourraient permettre de transformer des cellules souches en cellules osseuses. Dans une étude publiée dans la revue Small le 13 janvier 2022, des chercheurs de l’institut royal de Melbourne (Australie) ont réussi à activer la différenciation cellulaire de cellules souches en cellules osseuses en utilisant la pression d’ondes sonores. Cette découverte pourrait permettre d’éviter l’utilisation de techniques coûteuses et complexes pour transformer des cellules souches en cellules osseuses dans le cadre de traitements visant à permettre aux os de se reconstruire suite à des maladies dégénératives ou des cancers. Selon les chercheurs, l\'utilisation d’ondes sonores permet d’activer la différenciation des cellules avec un dispositif simple et dont le coût est réduit.');
        $article1 ->setPicture('https://www.sciencesetavenir.fr/assets/img/2022/02/25/cover-r4x3w1000-6218f4a89b159-049-f0219630.jpg');
        $article1->setCategory($this->getReference('category1'));
        $article1->setUser($this->getReference('connectedUser'));
        $this->addReference('article1', $article1);
        $manager->persist($article1);

        $article2 = new Article();
        $article2 ->setTitle('Maths : peut-on diviser par zéro ?');
        $article2 ->setContent('C\'est une question qui chagrine tous les écoliers que nous pose sur notre page Facebook Tabu Ntumba Louis : peut-on diviser par zéro ? C\'est la Question de la semaine sélectionnée par la rédaction de Sciences et Avenir.');
        $article2 ->setPicture('https://fr.cdn.v5.futura-sciences.com/buildsv6/images/wide1920/0/3/c/03cb1e02f9_97024_chiffre-nombre-numero.jpg');
        $article2->setCategory($this->getReference('category1'));
        $article2->setUser($this->getReference('connectedUser'));
        $this->addReference('article2', $article2);
        $manager->persist($article2);

        $article3 = new Article();
        $article3 ->setTitle('Une cyberattaque contre l\'Otan pourrait déclencher la clause de défense collective, dit un responsable');
        $article3 ->setContent('Nous ne spéculerons pas sur la gravité qu\'une telle attaque devrait avoir pour déclencher une réponse collective. Toute réponse pourrait comprendre des sanctions diplomatiques et économiques, des mesures informatiques, voire (le recours à) des forces conventionnelles, selon la nature de l\'attaque", a ajouté le responsable. La question de savoir si une attaque informatique est suffisamment grave pour déclencher l\'article 5 reste "une décision politique que les membres de l\'Otan devront prendre", a encore indiqué le responsable.');
        $article3 ->setPicture('https://www.sciencesetavenir.fr/assets/img/2022/02/28/cover-r4x3w1000-621d456eced9d-une-cyberattaque-contre-l-otan-pourrait-declencher-la.jpg');
        $article3->setCategory($this->getReference('category2'));
        $article3->setUser($this->getReference('connectedUser'));
        $this->addReference('article3', $article3);
        $manager->persist($article3);

        $article4 = new Article();
        $article4 ->setTitle('Jan van Eyck, un peintre flamand au crible de la vision par ordinateur');
        $article4 ->setContent('Un chercheur français a utilisé des algorithmes d\'analyse d\'image pour étudier les points de fuite dans cinq tableaux de l\'artiste flamand. Le résultat trahit une maîtrise scientifique méconnue du rendu des volumes et l\'usage d\'un appareil à perspective.');
        $article4 ->setPicture('https://www.sciencesetavenir.fr/assets/img/2021/09/02/cover-r4x3w1000-6130a5081a3e9-arnolfini3d.jpg');
        $article4->setCategory($this->getReference('category2'));
        $article4->setUser($this->getReference('connectedUser'));
        $this->addReference('article4', $article4);
        $manager->persist($article4);

        
        $manager->flush();
    }
    
    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CategoryFixtures::class
        ];
    }
}