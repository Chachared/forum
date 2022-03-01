<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    
    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher= $hasher;
    }
    
    public function load(ObjectManager $manager): void
    {
        $userAdmin = new User();
        $userAdmin -> setFirstname('Ad');
        $userAdmin -> setLastname('Ministrateur');
        $userAdmin -> setUsername('admin');
        $userAdmin -> setEmail('admin@youpi.org');
        $userAdmin -> setPassword($this->hasher->hashPassword($userAdmin,'admin123@'));
        $userAdmin -> setRoles(['ROLE_ADMIN']);
        $this->addReference('userAdmin', $userAdmin);
        
        $connectedUser = new User();
        $connectedUser -> setFirstname('Visiteur');
        $connectedUser -> setLastname('Connecté');
        $connectedUser -> setUsername('user');
        $connectedUser -> setEmail('user@youpi.org');
        $connectedUser -> setPassword($this->hasher->hashPassword($connectedUser,'user123@'));
        $connectedUser -> setRoles(['ROLE_USER']);
        $this->addReference('connectedUser', $connectedUser);
        
        $manager->persist($userAdmin);
        $manager->persist($connectedUser);

        $manager->flush();
    }
}