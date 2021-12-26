<?php

namespace App\DataFixtures\Groups;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pet;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class PetFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array {
        return ['foreignKeyAdoptionRequest', static::class];
    }
    
    public function load(ObjectManager $manager): void
    {
        $date = new \DateTime('@'.strtotime('now'));

        // use the factory to create a Faker\Generator instance
        $faker = Factory::create();

        //insert pets
        $species = array("Chat", "Chien", "Hamster");
        for ($i=0; $i < count($species); $i++) {  // pour chaque espèce dans l'array species
            for($j=1; $j<11; $j++){ // on fait 10 animaux different
                $pet = new Pet();
                $pet->setName($faker->firstName());
                //$pet->setName($species[$i]." n°$j"); // ex : Chat n°1
                $pet->setSpecies($species[$i]);
                $pet->setJoinedDate($date);
                if($species[$i] == "Chat"){
                    $pet->setImage($faker->imageUrl(360, 360, 'animals', true, 'cats'));
                }
                else if($species[$i] == "Chien")
                {
                    $pet->setImage($faker->imageUrl(360, 360, 'animals', true, 'dogs'));
                }
                else if($species[$i] == "Hamster")
                {
                    $pet->setImage($faker->imageUrl(360, 360, 'animals', true, 'hamsters'));//hamsters n'existe peut être pas
                }
                $pet->setDescription($faker->paragraph());
                $pet->setAge($j);
                $manager->persist($pet); // create Pets
            }
        }
        $manager->flush();
    }
}
