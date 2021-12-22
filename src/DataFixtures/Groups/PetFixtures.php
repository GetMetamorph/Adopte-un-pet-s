<?php

namespace App\DataFixtures\Groups;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pet;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class PetFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array {
        return ['foreignKeyAdoptionRequest', static::class];
    }
    
    public function load(ObjectManager $manager): void
    {
        $date = new \DateTime('@'.strtotime('now'));

        //insert pets
        $species = array("Chat", "Chien", "Hamster");
        for ($i=0; $i < count($species); $i++) {  // pour chaque espèce dans l'array species
            for($j=1; $j<11; $j++){ // on fait 10 animaux different
                $pet = new Pet();
                $pet->setName($species[$i]." n°$j"); // ex : Chat n°1
                $pet->setSpecies($species[$i]);
                $pet->setJoinedDate($date);
                $pet->setAge($j);
                $manager->persist($pet); // create Pets
            }
        }

        $manager->flush();
    }
}
