<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use App\Entity\Pet;

class AppFixtures extends Fixture
{
    /**
    * @var string A "Y-m-d H:i:s" formatted value
    */
    protected $createdAt;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('createdAt', new Assert\DateTime());
    }

    public function load(ObjectManager $manager): void
    {
        $date = new \DateTime('@'.strtotime('now'));
        $species = array("Chat", "Chien", "Hamster");
        for ($i=0; $i < count($species); $i++) {  // pour chaque espèce dans l'array species
            for($j=1; $j<11; $j++){ // on fait 10 animaux different
                $pet = new Pet();
                $pet->setName($species[$i]." n°$j"); // ex : Chat n°1
                $pet->setSpecies($species[$i]);
                $pet->setJoinedDate($date);
                $pet->setAge($j);

                $manager->persist($pet);
            }
        }
        $manager->flush();
    }
}
