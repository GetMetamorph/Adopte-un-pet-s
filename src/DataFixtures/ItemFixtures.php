<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Item;

require_once 'vendor/autoload.php'; // pour faker

class ItemFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        for($i=0; $i<20; $i++){
            $item = new Item();
            /*
            $item->setName();
            $item->setPrice();
            $item->setImage();
            $item->setDescription();
            $item->setItemCategory();
            $manager->persist($item); 
            */
        }
        $manager->flush();
    }
}
