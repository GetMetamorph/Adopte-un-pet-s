<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\AdoptionRequest;
use App\Repository\PetRepository;
use App\Repository\UserRepository;
use Faker\Factory;

class AdoptionRequestFixtures extends Fixture
{
    public function __construct(PetRepository $reposPet, UserRepository $reposUser)
    {
        $this->reposPet = $reposPet;
        $this->reposUser = $reposUser;
    }

    public function load(ObjectManager $manager): void
    {
        $date = new \DateTime('@'.strtotime('now'));

        // use the factory to create a Faker\Generator instance
        $faker = Factory::create();

        $users = $this->reposUser->findAll();
        $pets = $this->reposPet->findAll(); // récupère toutes les catégories
        $status = array("Pending", "Adopted");
        $i=0;
        foreach($pets as $key=>$pet)
        {
            $adoption = new AdoptionRequest();
            $adoption->setPetId($pet);

            //créer des demandes d'adoption en attente de réponse sauf pour un 1 qui sera adopté
            if ($key != count($pets)){
                $adoption->setStatus($status[0]);
            }
            else{
                $adoption->setStatus($status[1]);
            }

            $adoption->setUsrId($users[$key]);
            $adoption->setDocumentPath("assets/documents/file.pdf");
            $adoption->setDate($date);
            $manager->persist($adoption); 
        }
        $manager->flush();
    }
}
