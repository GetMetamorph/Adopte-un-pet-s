<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cart;

class CartFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        for($i=0; $i<10; $i++)
        {
            $cart = new Cart();
            //$cart->setUsrId($i);
            $manager->persist($cart); 
        }
        $manager->flush();
    }
}
